<?php ${"G\x4cOB\x41\x4c\x53"}["nbt\x63dd\x71"]="\x69";if(!defined("\x42\x41SE\x50\x41T\x48"))exit("\x4eo dir\x65ct\x20\x73c\x72\x69\x70t\x20\x61c\x63\x65\x73\x73\x20\x61\x6clo\x77e\x64");class CI_DB_pdo_result extends CI_DB_result{public$num_rows;public function num_rows(){if(is_int($this->num_rows)){return$this->num_rows;}elseif(($this->num_rows=$this->result_id->rowCount())>0){return$this->num_rows;}$this->num_rows=count($this->result_id->fetchAll());$this->result_id->execute();return$this->num_rows;}function num_fields(){return$this->result_id->columnCount();}function list_fields(){if($this->db->db_debug){return$this->db->display_error("d\x62_u\x6e\x73\x75\x70\x6frt\x65d_\x66e\x61\x74u\x72\x65");}return FALSE;}function field_data(){${"\x47\x4c\x4fB\x41\x4c\x53"}["\x75\x69\x68\x79l\x78irod"]="\x64\x61t\x61";${${"\x47\x4c\x4f\x42\x41L\x53"}["u\x69h\x79\x6cxir\x6f\x64"]}=array();try{$esiqxutc="d\x61ta";for(${${"\x47L\x4f\x42\x41L\x53"}["\x6e\x62t\x63dd\x71"]}=0;${${"\x47LO\x42\x41\x4c\x53"}["\x6e\x62\x74c\x64d\x71"]}<$this->num_fields();${${"\x47LO\x42AL\x53"}["nb\x74cdd\x71"]}++){$escyeivmfcl="i";$ilyqoyfoulj="\x64\x61\x74\x61";${$ilyqoyfoulj}[]=$this->result_id->getColumnMeta(${$escyeivmfcl});}return${$esiqxutc};}catch(Exception$e){if($this->db->db_debug){return$this->db->display_error("\x64\x62_\x75n\x73up\x6f\x72ted_\x66\x65a\x74ure");}return FALSE;}}function free_result(){if(is_object($this->result_id)){$this->result_id=FALSE;}}function _data_seek($n=0){return FALSE;}function _fetch_assoc(){return$this->result_id->fetch(PDO::FETCH_ASSOC);}function _fetch_object(){return$this->result_id->fetchObject();}}
?>