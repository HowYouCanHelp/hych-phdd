<?php
class Search extends CI_Model {

	public $stopwords = array();
	function __construct() {
        // Call the Model constructor
        parent::__construct();
		$this->stopwords = array("a" => 1, "about" => 1, "across" => 1, "all" => 1, "almost" => 1, "along" => 1, "also" => 1,"although" => 1,"am" => 1,"among" => 1, "amongst" => 1, "amoungst" => 1, "an" => 1, "and" => 1, "another" => 1, "any" => 1,"anyhow" => 1,"anyone" => 1,"anything" => 1,"anyway" => 1, "anywhere" => 1, "are" => 1, "as" => 1, "at" => 1, "back" => 1,"be" => 1,"became" => 1, "because" => 1,"become" => 1,"becomes" => 1, "becoming" => 1, "been" => 1, "before" => 1, "beforehand" => 1, "behind" => 1, "being" => 1, "below" => 1, "beside" => 1, "besides" => 1, "between" => 1, "both" => 1, "bottom" => 1,"but" => 1, "by" => 1, "can" => 1, "cannot" => 1, "cant" => 1, "co" => 1, "con" => 1, "could" => 1, "couldnt" => 1, "cry" => 1, "de" => 1, "describe" => 1, "detail" => 1, "do" => 1, "done" => 1, "down" => 1, "due" => 1, "during" => 1, "each" => 1, "eg" => 1, "either" => 1, "else" => 1, "elsewhere" => 1, "empty" => 1, "enough" => 1, "etc" => 1, "even" => 1, "ever" => 1, "every" => 1, "everyone" => 1, "everything" => 1, "everywhere" => 1, "except" => 1, "few" => 1, "fill" => 1, "first" => 1, "five" => 1, "for" => 1, "formerly" => 1, "from" => 1, "further" => 1, "get" => 1, "give" => 1, "go" => 1, "had" => 1, "has" => 1, "hasnt" => 1, "have" => 1, "he" => 1, "hence" => 1, "her" => 1, "here" => 1, "hereafter" => 1, "hereby" => 1, "herein" => 1, "hereupon" => 1, "hers" => 1, "herself" => 1, "him" => 1, "himself" => 1, "his" => 1, "how" => 1, "however" => 1, "ie" => 1, "if" => 1, "in" => 1, "inc" => 1, "indeed" => 1, "into" => 1, "is" => 1, "it" => 1, "its" => 1, "itself" => 1, "keep" => 1, "last" => 1, "latter" => 1, "latterly" => 1, "least" => 1, "less" => 1, "ltd" => 1, "made" => 1, "many" => 1, "may" => 1, "me" => 1, "meanwhile" => 1, "might" => 1, "mill" => 1, "mine" => 1, "more" => 1, "moreover" => 1, "most" => 1, "mostly" => 1, "move" => 1, "much" => 1, "must" => 1, "my" => 1, "myself" => 1, "name" => 1, "namely" => 1, "neither" => 1, "nevertheless" => 1, "next" => 1, "no" => 1, "none" => 1, "noone" => 1, "nor" => 1, "not" => 1, "nothing" => 1, "now" => 1, "of" => 1, "off" => 1, "often" => 1, "on" => 1, "once" => 1, "only" => 1, "onto" => 1, "or" => 1, "other" => 1, "others" => 1, "otherwise" => 1, "our" => 1, "ours" => 1, "ourselves" => 1, "out" => 1, "over" => 1, "own" => 1,"part" => 1, "per" => 1, "perhaps" => 1, "please" => 1, "put" => 1, "rather" => 1, "re" => 1, "same" => 1, "see" => 1, "seem" => 1, "seemed" => 1, "seeming" => 1, "seems" => 1, "several" => 1, "she" => 1, "should" => 1, "show" => 1, "side" => 1, "since" => 1, "sincere" => 1, "six" => 1, "sixty" => 1, "so" => 1, "some" => 1, "somehow" => 1, "someone" => 1, "something" => 1, "sometime" => 1, "sometimes" => 1, "somewhere" => 1, "such" => 1,  "than" => 1, "that" => 1, "the" => 1, "their" => 1, "them" => 1, "themselves" => 1, "then" => 1, "thence" => 1, "there" => 1, "thereafter" => 1, "thereby" => 1, "therefore" => 1, "therein" => 1, "thereupon" => 1, "these" => 1, "they" => 1, "thickv" => 1, "thin" => 1, "third" => 1, "this" => 1, "those" => 1, "though" => 1, "three" => 1, "through" => 1, "throughout" => 1, "thru" => 1, "thus" => 1, "to" => 1, "together" => 1, "too" => 1, "un" => 1, "under" => 1, "until" => 1, "up" => 1, "upon" => 1, "us" => 1, "very" => 1, "was" => 1, "we" => 1, "well" => 1, "were" => 1, "what" => 1, "whatever" => 1, "when" => 1, "whence" => 1, "whenever" => 1, "where" => 1, "whereafter" => 1, "whereas" => 1, "whereby" => 1, "wherein" => 1, "whereupon" => 1, "wherever" => 1, "whether" => 1, "which" => 1, "while" => 1, "whither" => 1, "who" => 1, "whoever" => 1, "whole" => 1, "whom" => 1, "whose" => 1, "why" => 1, "will" => 1, "with" => 1, "within" => 1, "without" => 1, "would" => 1, "yet" => 1, "you" => 1, "your" => 1, "yours" => 1, "yourself" => 1, "yourselves" => 1, "the" => 1);
    }
	
	//currently using back and next pagination only - extend later to enable switching to exact page (must know the number of results)
	public function keywords($keywords, $table, $search_columns, $page = 1, $query_modifiers = array()) {
		$limit = isset_default($query_modifiers, 'limit', 10);
		$offset = ($page - 1) * $limit;
		
		//remove non-alphanumeric characters
		$sanitized = preg_replace("/[^A-Za-z0-9 ]/", '', trim($keywords));
		
		//split keywords
		$words = explode(' ', $sanitized);
		
		//remove duplicate words and stopwords
		$passed = array();
		foreach($words as $w) {
			if(!in_array($w, $passed) && !in_array($w, $this->stopwords)) {
				$passed[] = $w;
			}
		}
		
		//search with full string first
		$like = array();
		foreach($search_columns as $sc) {
			$like[$sc] = $keywords;
		}
		$this->enter_query_modifiers($query_modifiers);
		$results = $this->db->like($like)
							->from($table)
							->limit($limit)
							->offset($offset)
							->get();
		if($results->num_rows() > 0) {
			return $results->result_array();
		}
		
		//ready the full-blown query shit
		$this->enter_query_modifiers($query_modifiers);
		//construct the MEGA WHERE
		$mega_where = '';
		foreach($words as $w) {
			if(strlen($mega_where) > 0) {
				$mega_where .= ' AND ';
			}
			$segment = '(';
			foreach($search_columns as $sc) {
				if(strlen($segment) > 1) {
					$segment .= ' OR ';
				}
				$segment .= $sc.' LIKE "%'.$w.'%" ';
			}
			$segment .= ')';
			$mega_where .= $segment;
		}
		$results = $this->db->where($mega_where, null, false)
							->from($table)
							->limit($limit)
							->offset($offset)
							->get();
		
		return $results->result_array();
	}
	
	//enters the select, where, order_by, group_by, etc.
	public function enter_query_modifiers($query_modifiers) {
		$select = isset_default($query_modifiers, 'select', null);
		$where = isset_default($query_modifiers, 'where', null);
		$join = isset_default($query_modifiers, 'join', null); //join should be an array with ff. keys: table, on, type (left, right, inner, outer)
		$order_by = isset_default($query_modifiers, 'order_by', null);
		$group_by = isset_default($query_modifiers, 'group_by', null);
		$order_by_order = isset_default($query_modifiers, 'order_by_order', 'desc');
		if((is_array($select) && sizeof($select)) || strlen($select) > 0) {
			$this->db->select($select, false);
		}
		if(is_array($join) && sizeof($join)) {
			$this->db->join($join['table'], $join['on'], $join['type']);
		}
		if((is_array($where) && sizeof($where)) || strlen($where) > 0) {
			$this->db->where($where, false);
		}
		if(strlen($order_by) > 0) {
			$this->db->order_by($order_by, $order_by_order);
		}
		if(strlen($group_by) > 0) {
			$this->db->group_by($group_by);
		}
	}
}
?>