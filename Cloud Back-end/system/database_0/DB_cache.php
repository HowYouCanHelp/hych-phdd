<?php ${"\x47\x4c\x4fB\x41\x4c\x53"}["\x70\x71\x6c\x78\x6c\x63\x76\x73\x79r\x71\x63"]="\x66ile\x6ea\x6d\x65";${"\x47\x4cOB\x41\x4c\x53"}["c\x6e\x64\x61\x7a\x64h\x77v"]="d\x69\x72\x5fpat\x68";${"\x47\x4cOB\x41L\x53"}["\x64fq\x66d\x64c\x6d\x67tm"]="\x63\x61\x63\x68\x65\x64\x61\x74\x61";${"\x47L\x4f\x42A\x4cS"}["\x64\x72\x70\x67y\x6c\x67"]="file\x70\x61th";${"\x47\x4c\x4f\x42\x41\x4c\x53"}["q\x64\x70\x65\x74m\x63"]="s\x65\x67men\x74_\x74w\x6f";${"G\x4c\x4f\x42\x41L\x53"}["\x63\x67\x70\x6bu\x74\x66\x69\x67\x75"]="\x73\x65\x67\x6d\x65n\x74_\x6f\x6ee";${"\x47\x4c\x4f\x42\x41L\x53"}["\x75jyjwv\x75\x6e"]="\x70\x61t\x68";${"\x47\x4c\x4f\x42\x41L\x53"}["x\x75\x65\x74f\x69gx\x66g"]="\x64b";if(!defined("B\x41\x53\x45\x50AT\x48"))exit("\x4eo\x20\x64i\x72e\x63t s\x63r\x69\x70t\x20ac\x63ess \x61\x6c\x6co\x77\x65\x64");class CI_DB_Cache{var$CI;var$db;function __construct(&$db){$this->CI=&get_instance();$this->db=&${${"\x47\x4cOB\x41\x4c\x53"}["\x78\x75\x65\x74f\x69\x67x\x66\x67"]};$this->CI->load->helper("fi\x6c\x65");}function check_path($path=''){${"\x47\x4cO\x42\x41L\x53"}["v\x73\x65\x71gtq\x78\x76\x6b\x6a"]="\x70at\x68";if(${${"\x47L\x4f\x42\x41LS"}["u\x6ay\x6a\x77\x76un"]}==""){if($this->db->cachedir==""){return$this->db->cache_off();}${${"\x47\x4c\x4f\x42AL\x53"}["\x75j\x79\x6a\x77v\x75\x6e"]}=$this->db->cachedir;}${"\x47\x4cOB\x41LS"}["\x6bs\x71\x69o\x61\x62ne\x70\x76\x6d"]="p\x61\x74\x68";${${"\x47LO\x42\x41\x4c\x53"}["\x75j\x79\x6aw\x76\x75\x6e"]}=preg_replace("/(\x2e+?)\x5c/*\$/","\x5c\x31/",${${"GLO\x42\x41L\x53"}["\x6bsqi\x6f\x61\x62\x6e\x65\x70\x76m"]});if(!is_dir(${${"G\x4cO\x42A\x4c\x53"}["\x75j\x79\x6a\x77v\x75\x6e"]})OR!is_really_writable(${${"\x47LOBA\x4c\x53"}["\x76\x73e\x71g\x74\x71\x78vk\x6a"]})){return$this->db->cache_off();}$this->db->cachedir=${${"\x47\x4cO\x42\x41\x4cS"}["\x75\x6a\x79j\x77\x76un"]};return TRUE;}function read($sql){$ezbtpsbb="se\x67m\x65nt\x5f\x6fn\x65";$ulhmlmonxlb="\x63\x61\x63\x68\x65da\x74\x61";${"\x47L\x4f\x42\x41\x4c\x53"}["nk\x69r\x78dkrxm"]="s\x65\x67me\x6et\x5f\x74\x77\x6f";if(!$this->check_path()){return$this->db->cache_off();}$iydomukqol="\x73\x71l";$diseqjamcd="\x66\x69\x6ce\x70\x61t\x68";${${"G\x4cOB\x41\x4cS"}["\x63\x67p\x6bu\x74\x66\x69\x67\x75"]}=($this->CI->uri->segment(1)==FALSE)?"d\x65f\x61ul\x74":$this->CI->uri->segment(1);${${"\x47\x4cOB\x41\x4c\x53"}["qd\x70\x65t\x6d\x63"]}=($this->CI->uri->segment(2)==FALSE)?"ind\x65x":$this->CI->uri->segment(2);${${"\x47\x4cOB\x41\x4c\x53"}["\x64\x72\x70g\x79lg"]}=$this->db->cachedir.${$ezbtpsbb}."+".${${"GLO\x42A\x4c\x53"}["\x6ek\x69\x72\x78\x64k\x72\x78\x6d"]}."/".md5(${$iydomukqol});if(FALSE===(${${"\x47\x4cOB\x41\x4cS"}["d\x66q\x66\x64\x64\x63m\x67\x74m"]}=read_file(${$diseqjamcd}))){return FALSE;}return unserialize(${$ulhmlmonxlb});}function write($sql,$object){$nckcpfd="\x73\x65\x67m\x65\x6et\x5f\x74\x77\x6f";$luebyr="\x73egm\x65\x6e\x74\x5f\x6f\x6e\x65";${"\x47LO\x42A\x4c\x53"}["l\x70\x77v\x79v\x6c\x65\x64"]="\x64i\x72_\x70\x61th";${"\x47LOB\x41L\x53"}["f\x76\x6b\x70\x75\x70\x6d\x71"]="s\x65\x67\x6d\x65\x6e\x74_t\x77\x6f";if(!$this->check_path()){return$this->db->cache_off();}$mmiisvhupogn="\x73q\x6c";${$luebyr}=($this->CI->uri->segment(1)==FALSE)?"def\x61\x75lt":$this->CI->uri->segment(1);${${"\x47\x4cOBA\x4cS"}["\x66\x76\x6bp\x75\x70\x6d\x71"]}=($this->CI->uri->segment(2)==FALSE)?"\x69nde\x78":$this->CI->uri->segment(2);${${"\x47\x4c\x4f\x42A\x4c\x53"}["c\x6e\x64\x61z\x64\x68\x77v"]}=$this->db->cachedir.${${"G\x4cOB\x41\x4cS"}["\x63\x67p\x6butf\x69\x67u"]}."+".${$nckcpfd}."/";${${"\x47\x4cO\x42\x41LS"}["\x70\x71\x6c\x78l\x63\x76\x73yr\x71\x63"]}=md5(${$mmiisvhupogn});if(!@is_dir(${${"GL\x4f\x42\x41\x4cS"}["\x63nd\x61\x7ad\x68w\x76"]})){${"\x47LO\x42\x41\x4cS"}["\x70\x69\x6f\x73c\x75\x64\x76\x74f\x78"]="\x64\x69\x72_p\x61\x74h";if(!@mkdir(${${"\x47\x4cO\x42\x41\x4cS"}["\x63\x6e\x64\x61\x7a\x64h\x77v"]},DIR_WRITE_MODE)){return FALSE;}@chmod(${${"\x47\x4c\x4f\x42\x41\x4cS"}["p\x69\x6fs\x63ud\x76t\x66\x78"]},DIR_WRITE_MODE);}${"G\x4c\x4f\x42\x41\x4c\x53"}["\x75w\x61e\x68\x6e\x69y"]="o\x62j\x65c\x74";if(write_file(${${"\x47L\x4f\x42AL\x53"}["\x63\x6eda\x7a\x64h\x77v"]}.${${"\x47\x4c\x4f\x42A\x4c\x53"}["\x70\x71l\x78\x6c\x63v\x73y\x72\x71c"]},serialize(${${"\x47\x4c\x4f\x42\x41LS"}["\x75\x77aehn\x69y"]}))===FALSE){return FALSE;}@chmod(${${"\x47\x4cO\x42\x41L\x53"}["\x6c\x70\x77\x76yv\x6ce\x64"]}.${${"\x47\x4cO\x42\x41\x4c\x53"}["\x70\x71\x6c\x78\x6c\x63\x76s\x79rq\x63"]},FILE_WRITE_MODE);return TRUE;}function delete($segment_one='',$segment_two=''){${"\x47\x4cO\x42\x41\x4c\x53"}["z\x76\x73\x75\x70\x69w\x65a\x72\x72"]="\x73e\x67m\x65n\x74\x5f\x74\x77\x6f";${"\x47\x4cO\x42\x41\x4cS"}["huz\x66\x78dc"]="s\x65\x67\x6d\x65n\x74\x5f\x74wo";if(${${"G\x4c\x4f\x42\x41L\x53"}["\x63\x67\x70k\x75\x74\x66\x69\x67\x75"]}==""){${${"GLO\x42AL\x53"}["\x63\x67\x70kut\x66ig\x75"]}=($this->CI->uri->segment(1)==FALSE)?"\x64\x65faul\x74":$this->CI->uri->segment(1);}if(${${"\x47\x4cO\x42A\x4c\x53"}["h\x75z\x66xdc"]}==""){$gdiklgdx="\x73\x65\x67\x6de\x6e\x74_\x74\x77o";${$gdiklgdx}=($this->CI->uri->segment(2)==FALSE)?"\x69\x6ed\x65x":$this->CI->uri->segment(2);}${"\x47\x4cO\x42\x41\x4c\x53"}["r\x61y\x6e\x64\x73\x69\x68"]="\x73\x65\x67\x6de\x6et\x5f\x6fn\x65";${"G\x4c\x4fBA\x4c\x53"}["jh\x69c\x64\x74"]="d\x69\x72_p\x61\x74h";${${"\x47\x4cO\x42\x41\x4c\x53"}["\x63n\x64\x61\x7adh\x77\x76"]}=$this->db->cachedir.${${"GL\x4f\x42\x41\x4c\x53"}["\x72\x61ynds\x69\x68"]}."+".${${"\x47\x4c\x4fB\x41\x4cS"}["\x7a\x76s\x75\x70i\x77\x65\x61\x72r"]}."/";delete_files(${${"\x47\x4c\x4f\x42\x41L\x53"}["j\x68\x69c\x64\x74"]},TRUE);}function delete_all(){delete_files($this->db->cachedir,TRUE);}}
?>