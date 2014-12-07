<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rest_model extends MY_Model {

	private $DISTANCE_PARAMETER = 0.5;
	
	public function verify_id_combo($user_fk, $fb_id) {
		return $this->db->where('id', $user_fk)
						->where('fb_id', $fb_id)
						->get('users', 1)
						->row();
	}
	
	public function get_event_type_id($event_type) {
		return $this->db->select('id')
						->where('name', $event_type)
						->get('event_types', 1)
						->row()
						->id;
	}
	
	public function verify_event_fk($event_fk) {
		return $this->db->where('id', $event_fk)->get('events', 1)->row();
	}
	
	public function update_karma($user_fk, $new_karma) {
		$this->db->where('id', $user_fk)
				->update('users', array('karma' => $new_karma));
	}	
	
	public function search_markers($longhitude, $latitude) {
		$this->marker_filters($longhitude, $latitude);
		$coordinates = $this->coordinates_select_string('events');
		return $this->db->select('events.id, 
								organizations.name AS organization,
								events.name AS name,
								organizations.photo_uri AS logo, 
								events.photo_uri AS photo, 
								datetime_start,
								datetime_end,
								venue, '.$coordinates, false)
						->from(array('events', 'organizations'))
						->get()
						->result_array();
	}
	
	public function nearby_organizations($longhitude, $latitude) {
		$this->marker_filters($longhitude, $latitude);
		$coordinates = $this->coordinates_select_string('organizations');
		return $this->db->select('events.id, 
								event_types.name AS type,
								photo_uri AS marker,
								organizations.name AS organization,
								events.name AS name,
								organizations.photo_uri AS logo, 
								events.photo_uri AS photo, 
								datetime_start,
								datetime_end,
								venue, '.$coordinates, false)
						->from(array('events', 'organizations', 'event_types'))
						->where('events.organization_fk=organizations.id', null, false)
						->where('events.event_type_fk=event_types.id', null, false)
						->get()
						->result_array();
	}
	
	private function coordinates_select_string($table) {
		return "CONCAT(
				IF($table.longhitude != '' AND $table.longhitude IS NOT NULL, CONCAT($table.longhitude, ','), ''),
				IFNULL($table.latitude, '')
			) AS coordinates";
	}
	
	private function marker_filters($longhitude, $latitude) {
		$this->db->where('longhitude IS NOT NULL AND longhitude != ""', null, false)
				->where('latitude IS NOT NULL AND latitude != ""', null, false)
				->where('longhitude >= ', $longhitude - $this->DISTANCE_PARAMETER)
				->where('latitude >= ', $latitude - $this->DISTANCE_PARAMETER)
				->where('longhitude <= ', $longhitude + $this->DISTANCE_PARAMETER)
				->where('latitude <= ', $latitude + $this->DISTANCE_PARAMETER);
	}
}