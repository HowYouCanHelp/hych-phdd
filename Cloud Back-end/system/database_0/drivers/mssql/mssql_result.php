<?php ${"G\x4c\x4fB\x41\x4c\x53"}["sq\x7a\x71\x6a\x76g\x78t\x6c"]="\x46";${"\x47L\x4f\x42\x41L\x53"}["\x77tp\x6ag\x70\x7a\x65w\x6a\x75y"]="\x66\x69\x65l\x64";${"\x47LO\x42\x41\x4cS"}["\x63o\x77w\x71\x70\x76\x7a"]="\x72\x65tv\x61l";${"\x47\x4cO\x42\x41L\x53"}["b\x6a\x66diz\x64e"]="f\x69\x65l\x64\x5f\x6ea\x6d\x65\x73";if(!defined("B\x41\x53EP\x41\x54\x48"))exit("No di\x72\x65c\x74 \x73cri\x70t \x61cc\x65ss\x20al\x6co\x77ed");class CI_DB_mssql_result extends CI_DB_result{function num_rows(){return@mssql_num_rows($this->result_id);}function num_fields(){return@mssql_num_fields($this->result_id);}function list_fields(){$jydkdtkcj="f\x69\x65\x6c\x64";${${"\x47\x4cO\x42\x41LS"}["bjf\x64i\x7a\x64\x65"]}=array();while(${$jydkdtkcj}=mssql_fetch_field($this->result_id)){$jpqffkcfo="f\x69el\x64\x5f\x6e\x61\x6d\x65s";${$jpqffkcfo}[]=$field->name;}return${${"\x47L\x4f\x42\x41\x4c\x53"}["\x62\x6a\x66\x64\x69\x7a\x64\x65"]};}function field_data(){${${"GLO\x42\x41L\x53"}["\x63o\x77\x77\x71\x70\x76z"]}=array();while(${${"\x47\x4cOB\x41LS"}["wt\x70\x6ag\x70\x7a\x65\x77j\x75\x79"]}=mssql_fetch_field($this->result_id)){${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["s\x71\x7aq\x6avg\x78\x74\x6c"]}=new stdClass();${"\x47L\x4f\x42\x41L\x53"}["\x76\x6a\x62\x63f\x6ff\x61fs\x78"]="r\x65t\x76a\x6c";$F->name=$field->name;$F->type=$field->type;$F->max_length=$field->max_length;$F->primary_key=0;$F->default="";${${"\x47LOBA\x4c\x53"}["\x76\x6a\x62c\x66o\x66a\x66sx"]}[]=${${"G\x4cO\x42\x41\x4cS"}["\x73\x71z\x71\x6a\x76\x67\x78\x74\x6c"]};}return${${"G\x4c\x4fBA\x4cS"}["coww\x71\x70\x76z"]};}function free_result(){if(is_resource($this->result_id)){mssql_free_result($this->result_id);$this->result_id=FALSE;}}function _data_seek($n=0){$hctqndxkps="\x6e";return mssql_data_seek($this->result_id,${$hctqndxkps});}function _fetch_assoc(){return mssql_fetch_assoc($this->result_id);}function _fetch_object(){return mssql_fetch_object($this->result_id);}}
?>