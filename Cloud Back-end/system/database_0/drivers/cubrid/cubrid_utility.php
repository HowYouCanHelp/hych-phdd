<?php if(!defined("BASE\x50\x41\x54H"))exit("\x4eo\x20di\x72\x65ct \x73\x63r\x69\x70\x74\x20a\x63c\x65\x73s\x20all\x6f\x77\x65d");class CI_DB_cubrid_utility extends CI_DB_utility{function _list_databases(){if($this->conn_id){return"S\x45LECT \x27".$this->database."\x27";}else{return FALSE;}}function _optimize_table($table){return FALSE;}function _repair_table($table){return FALSE;}function _backup($params=array()){return$this->db->display_error("\x64b_u\x6es\x75p\x6f\x72t\x65d_f\x65\x61\x74\x75re");}}
?>