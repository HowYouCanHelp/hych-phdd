<?php ${"\x47\x4c\x4fB\x41\x4cS"}["\x74\x71\x78\x6d\x6c\x77\x73\x71c"]="\x43\x49";${"GLOB\x41L\x53"}["\x68\x74\x70r\x6cd\x76cd\x77\x73"]="\x70\x72\x65fs";${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x66\x7a\x64\x6fo\x7al\x6euf"]="t\x61b";${"\x47\x4c\x4f\x42\x41\x4cS"}["dc\x76\x76sl"]="x\x6d\x6c";${"GL\x4f\x42\x41\x4c\x53"}["c\x6bj\x72\x6f\x7a\x72\x68\x65\x6b\x67"]="va\x6c";${"GLO\x42\x41\x4c\x53"}["\x71\x6fpwwt\x76\x66\x7a\x65"]="pa\x72ams";${"GLOBA\x4c\x53"}["q\x75l\x71\x70\x69\x6e\x76\x65\x70\x77"]="k\x65\x79";${"\x47LO\x42A\x4cS"}["\x74\x62\x72\x74\x79\x77mpumi"]="d\x65\x6ci\x6d";${"\x47L\x4f\x42\x41\x4c\x53"}["\x63\x78\x70\x79\x64f"]="n\x65wl\x69\x6e\x65";${"\x47\x4c\x4f\x42\x41L\x53"}["a\x74\x71\x6f\x6ee\x70pp"]="e\x6e\x63l\x6f\x73u\x72e";${"G\x4c\x4f\x42A\x4c\x53"}["\x6d\x6ekmh\x70p\x65g\x79\x69p"]="n\x61me";${"G\x4c\x4f\x42A\x4c\x53"}["\x65\x6e\x6f\x6a\x66\x6abj\x68hg"]="\x6fu\x74";${"\x47\x4c\x4fBA\x4c\x53"}["\x77\x63\x67\x6c\x77\x78d"]="\x6bey\x73";${"\x47L\x4fBA\x4cS"}["\x6ff\x79m\x64\x64\x70h\x79fx\x6d"]="qu\x65\x72\x79";${"\x47\x4cOB\x41LS"}["qb\x6ap\x6ekzt\x6b"]="r\x65\x73u\x6c\x74";${"\x47\x4cO\x42\x41\x4c\x53"}["i\x67q\x69\x74q\x72\x74\x78j"]="\x72\x65s";${"\x47\x4c\x4f\x42A\x4c\x53"}["m\x62\x71\x77\x66f\x65\x63\x78\x75"]="\x73\x71\x6c";${"\x47\x4c\x4f\x42\x41\x4c\x53"}["g\x69h\x73\x68\x6b\x79sq\x6d\x71"]="\x74a\x62\x6c\x65\x5f\x6eame";${"\x47\x4c\x4f\x42A\x4c\x53"}["\x6b\x68l\x6c\x68r\x78"]="\x64at\x61\x62\x61s\x65_nam\x65";${"\x47\x4c\x4fBALS"}["\x62\x6ev\x67\x76xemy"]="\x64\x62s";${"\x47\x4c\x4f\x42\x41L\x53"}["m\x66j\x61\x70kiw"]="\x72ow";if(!defined("BASE\x50A\x54\x48"))exit("\x4eo \x64ir\x65c\x74\x20\x73cri\x70\x74\x20\x61\x63c\x65ss\x20\x61ll\x6f\x77\x65\x64");class CI_DB_utility extends CI_DB_forge{var$db;var$data_cache=array();function __construct(){$wolgxgir="\x43\x49";${$wolgxgir}=&get_instance();$this->db=&$CI->db;log_message("debu\x67","\x44a\x74abase\x20\x55\x74\x69lit\x79\x20Cla\x73\x73\x20\x49\x6e\x69\x74\x69ali\x7aed");}function list_databases(){$pobsriwkvpg="q\x75\x65\x72y";$mdocfqq="\x64bs";${"GLO\x42\x41L\x53"}["b\x71\x62\x76\x73i\x72"]="\x64b\x73";if(isset($this->data_cache["\x64\x62\x5fn\x61\x6des"])){return$this->data_cache["d\x62_\x6eam\x65\x73"];}${$pobsriwkvpg}=$this->db->query($this->_list_databases());${${"\x47\x4c\x4f\x42\x41LS"}["\x62\x71bv\x73\x69\x72"]}=array();if($query->num_rows()>0){foreach($query->result_array()as${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x6d\x66j\x61p\x6b\x69\x77"]}){${${"\x47LOBA\x4c\x53"}["bnv\x67vxe\x6dy"]}[]=current(${${"G\x4cO\x42AL\x53"}["\x6d\x66\x6a\x61p\x6biw"]});}}$this->data_cache["\x64b\x5f\x6e\x61mes"]=${$mdocfqq};return$this->data_cache["db\x5fn\x61m\x65\x73"];}function database_exists($database_name){if(method_exists($this,"\x5f\x64\x61t\x61b\x61se\x5f\x65xi\x73\x74s")){$pwlmtvsednw="\x64\x61ta\x62\x61s\x65_n\x61me";return$this->_database_exists(${$pwlmtvsednw});}else{return(!in_array(${${"GL\x4f\x42\x41\x4c\x53"}["\x6b\x68\x6c\x6c\x68r\x78"]},$this->list_databases()))?FALSE:TRUE;}}function optimize_table($table_name){$lclittypoik="s\x71l";$fmroxo="\x73ql";${$lclittypoik}=$this->_optimize_table(${${"\x47\x4c\x4f\x42A\x4c\x53"}["\x67i\x68\x73hk\x79sq\x6d\x71"]});${"\x47\x4c\x4fB\x41LS"}["\x7a\x72\x68dx\x79wq\x72"]="\x71\x75e\x72\x79";if(is_bool(${$fmroxo})){show_error("\x64\x62_mu\x73t_u\x73\x65\x5fs\x65t");}${${"GL\x4fB\x41\x4c\x53"}["\x7a\x72hd\x78y\x77q\x72"]}=$this->db->query(${${"GL\x4f\x42\x41\x4cS"}["mb\x71\x77ffec\x78u"]});${${"\x47\x4c\x4f\x42A\x4cS"}["\x69\x67\x71\x69t\x71\x72\x74\x78\x6a"]}=$query->result_array();return current(${${"G\x4c\x4f\x42ALS"}["\x69\x67q\x69t\x71rt\x78\x6a"]});}function optimize_database(){$uyehbaxpm="\x74\x61b\x6c\x65\x5f\x6e\x61\x6d\x65";${${"G\x4c\x4f\x42\x41L\x53"}["\x71\x62j\x70\x6e\x6bz\x74\x6b"]}=array();foreach($this->db->list_tables()as${$uyehbaxpm}){$vtgofbji="s\x71\x6c";$ykacrr="\x72\x65\x73";${$vtgofbji}=$this->_optimize_table(${${"\x47\x4cOB\x41\x4cS"}["\x67ih\x73h\x6b\x79s\x71\x6dq"]});if(is_bool(${${"\x47\x4cOB\x41\x4cS"}["m\x62\x71\x77\x66\x66\x65c\x78u"]})){return${${"GL\x4f\x42\x41\x4cS"}["m\x62\x71\x77f\x66\x65\x63x\x75"]};}${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x6ff\x79m\x64\x64p\x68yf\x78\x6d"]}=$this->db->query(${${"G\x4cO\x42\x41\x4cS"}["m\x62\x71w\x66fe\x63\x78\x75"]});${${"G\x4c\x4f\x42\x41LS"}["i\x67q\x69t\x71\x72\x74x\x6a"]}=$query->result_array();${"\x47\x4cO\x42\x41L\x53"}["\x6f\x65\x76\x70n\x6a\x64q\x64z"]="\x72es";${"\x47LOB\x41\x4c\x53"}["ad\x6ahv\x6d\x6a\x62\x6a\x71"]="k\x65\x79";$wthynxq="r\x65\x73";${${"\x47\x4c\x4f\x42\x41\x4cS"}["\x6fe\x76p\x6e\x6a\x64\x71dz"]}=current(${${"G\x4c\x4fB\x41L\x53"}["\x69gq\x69\x74qr\x74x\x6a"]});${${"\x47\x4cO\x42\x41\x4cS"}["a\x64\x6ah\x76\x6d\x6abjq"]}=str_replace($this->db->database.".","",current(${$wthynxq}));${"\x47LOB\x41\x4c\x53"}["sx\x76i\x78\x69\x79h\x6as"]="\x6b\x65\x79\x73";${${"\x47\x4cOB\x41\x4cS"}["\x77\x63g\x6cwx\x64"]}=array_keys(${${"G\x4c\x4f\x42\x41\x4c\x53"}["i\x67\x71i\x74\x71\x72\x74x\x6a"]});${"\x47LO\x42\x41\x4cS"}["n\x6ewqy\x61\x7atbg"]="\x6b\x65y";unset(${${"\x47LOBAL\x53"}["\x69\x67\x71itq\x72\x74\x78\x6a"]}[${${"GL\x4f\x42ALS"}["\x73\x78\x76\x69\x78\x69\x79h\x6a\x73"]}[0]]);$ehghjlqeyv="\x72\x65\x73\x75\x6c\x74";${$ehghjlqeyv}[${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["n\x6e\x77qy\x61z\x74\x62\x67"]}]=${$ykacrr};}return${${"\x47\x4cO\x42AL\x53"}["qbj\x70\x6e\x6b\x7a\x74\x6b"]};}function repair_table($table_name){$gdjldgadzbsu="\x74a\x62\x6c\x65\x5fna\x6d\x65";$teycnpqwk="\x71ue\x72\x79";${"\x47L\x4f\x42AL\x53"}["xq\x76\x77\x65\x6d\x72\x69\x67\x62m\x79"]="sq\x6c";${${"\x47L\x4f\x42\x41\x4c\x53"}["m\x62q\x77\x66\x66e\x63\x78u"]}=$this->_repair_table(${$gdjldgadzbsu});${"\x47\x4c\x4fB\x41\x4c\x53"}["v\x77\x64\x73\x66jv\x68\x72"]="s\x71l";if(is_bool(${${"G\x4cOBA\x4cS"}["xq\x76wem\x72i\x67\x62m\x79"]})){return${${"\x47L\x4fB\x41L\x53"}["\x6d\x62\x71w\x66f\x65c\x78\x75"]};}${$teycnpqwk}=$this->db->query(${${"\x47\x4cOB\x41\x4cS"}["\x76\x77ds\x66\x6av\x68\x72"]});${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x79\x68\x6dn\x75uz\x78\x71g\x67"]="\x72es";${${"\x47\x4cO\x42\x41\x4cS"}["\x79hm\x6e\x75u\x7ax\x71g\x67"]}=$query->result_array();return current(${${"\x47\x4cOBALS"}["i\x67q\x69\x74q\x72\x74\x78\x6a"]});}function csv_from_result($query,$delim=",",$newline="\n",$enclosure='"'){$iffmbchd="\x71\x75\x65\x72y";${"\x47\x4c\x4f\x42\x41\x4c\x53"}["s\x76\x63\x6b\x64s\x6d"]="\x71\x75\x65\x72y";${"G\x4c\x4fB\x41L\x53"}["\x63\x65\x65l\x66et\x6d\x79"]="o\x75\x74";if(!is_object(${$iffmbchd})OR!method_exists(${${"G\x4cO\x42A\x4cS"}["\x73\x76c\x6b\x64s\x6d"]},"li\x73t_\x66iel\x64s")){show_error("\x59\x6f\x75 must s\x75b\x6d\x69\x74 a v\x61l\x69\x64 \x72\x65s\x75lt o\x62j\x65ct");}$srwdgrsgl="\x6f\x75\x74";$nalovyp="\x6f\x75t";${${"GL\x4f\x42\x41L\x53"}["\x65n\x6fj\x66\x6a\x62\x6ahh\x67"]}="";foreach($query->list_fields()as${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x6dnk\x6dh\x70\x70\x65\x67\x79\x69p"]}){$cnliwreqn="n\x61\x6de";${"G\x4c\x4f\x42\x41\x4c\x53"}["l\x77wvpf\x6e"]="\x65\x6e\x63l\x6f\x73u\x72\x65";${"G\x4c\x4f\x42\x41\x4c\x53"}["\x78l\x6cfg\x6ck\x61j\x6c\x61\x63"]="d\x65l\x69m";$lgnubgwthkyc="\x65\x6e\x63\x6c\x6f\x73\x75r\x65";${${"G\x4c\x4f\x42\x41L\x53"}["\x65\x6e\x6f\x6af\x6a\x62j\x68\x68\x67"]}.=${$lgnubgwthkyc}.str_replace(${${"\x47L\x4fBALS"}["\x61t\x71\x6fne\x70\x70p"]},${${"G\x4c\x4f\x42\x41\x4cS"}["l\x77w\x76pf\x6e"]}.${${"G\x4c\x4f\x42\x41\x4cS"}["\x61\x74\x71\x6fne\x70\x70\x70"]},${$cnliwreqn}).${${"\x47\x4cO\x42A\x4cS"}["a\x74qon\x65p\x70\x70"]}.${${"\x47\x4c\x4fB\x41LS"}["xl\x6c\x66\x67\x6ck\x61\x6ala\x63"]};}${$nalovyp}=rtrim(${${"G\x4cOBAL\x53"}["\x65n\x6fjf\x6a\x62jhh\x67"]});${${"G\x4cOBAL\x53"}["\x63ee\x6c\x66\x65\x74m\x79"]}.=${${"\x47\x4c\x4f\x42A\x4c\x53"}["\x63\x78\x70y\x64f"]};$lyotrtfek="\x72\x6f\x77";foreach($query->result_array()as${$lyotrtfek}){$kmlqursfuxr="\x69te\x6d";foreach(${${"G\x4c\x4fB\x41\x4c\x53"}["\x6df\x6a\x61\x70\x6b\x69\x77"]} as${$kmlqursfuxr}){$aedjiuwyi="item";$izfcmdhpbt="\x65\x6e\x63\x6co\x73\x75r\x65";${${"\x47\x4c\x4f\x42\x41L\x53"}["\x65no\x6af\x6ab\x6a\x68hg"]}.=${$izfcmdhpbt}.str_replace(${${"G\x4c\x4fBA\x4c\x53"}["a\x74\x71\x6f\x6e\x65p\x70\x70"]},${${"GLOB\x41\x4c\x53"}["\x61tq\x6f\x6ee\x70\x70\x70"]}.${${"\x47\x4c\x4f\x42AL\x53"}["a\x74\x71o\x6e\x65\x70p\x70"]},${$aedjiuwyi}).${${"\x47LOB\x41L\x53"}["a\x74\x71\x6fnepp\x70"]}.${${"\x47\x4cO\x42AL\x53"}["\x74br\x74\x79w\x6d\x70\x75\x6di"]};}${${"\x47\x4c\x4fB\x41L\x53"}["\x65n\x6f\x6af\x6ab\x6a\x68\x68\x67"]}=rtrim(${${"GL\x4f\x42\x41\x4cS"}["e\x6e\x6f\x6a\x66jb\x6ah\x68\x67"]});${"\x47L\x4f\x42\x41\x4c\x53"}["\x67n\x70\x6e\x79\x6e\x6e\x6b"]="\x6e\x65wl\x69\x6e\x65";${${"\x47L\x4fBA\x4c\x53"}["eno\x6a\x66jbjh\x68g"]}.=${${"\x47L\x4f\x42\x41\x4c\x53"}["\x67n\x70n\x79n\x6e\x6b"]};}return${$srwdgrsgl};}function xml_from_result($query,$params=array()){$xkxgpnf="\x71u\x65\x72y";${"\x47\x4c\x4f\x42\x41\x4c\x53"}["j\x68\x75\x63\x76dt\x77\x63\x79\x75"]="\x76a\x6c";$ibcixhe="\x6e\x65\x77\x6c\x69n\x65";$odkknzxmbb="\x78\x6dl";${"\x47L\x4f\x42\x41\x4cS"}["o\x7a\x70\x66\x6a\x75b\x67\x6f"]="CI";${"\x47L\x4f\x42ALS"}["\x65\x6b\x76\x7a\x69wu\x6cp\x7a\x64f"]="\x78\x6dl";if(!is_object(${$xkxgpnf})OR!method_exists(${${"\x47\x4cO\x42AL\x53"}["\x6ff\x79\x6d\x64\x64\x70\x68y\x66x\x6d"]},"\x6c\x69\x73t\x5f\x66i\x65\x6c\x64s")){show_error("\x59\x6f\x75 \x6dus\x74 \x73\x75b\x6d\x69t\x20\x61\x20valid re\x73u\x6c\x74\x20obje\x63\x74");}foreach(array("\x72\x6fot"=>"r\x6fo\x74","\x65lemen\x74"=>"e\x6c\x65m\x65nt","new\x6ci\x6ee"=>"\n","t\x61\x62"=>"\t")as${${"\x47\x4c\x4fB\x41L\x53"}["q\x75\x6c\x71\x70\x69\x6ev\x65\x70\x77"]}=>${${"\x47\x4cO\x42\x41\x4cS"}["\x6ah\x75\x63\x76\x64t\x77cy\x75"]}){${"\x47L\x4f\x42\x41\x4cS"}["v\x70b\x69\x72\x79\x7as"]="k\x65\x79";if(!isset(${${"\x47LO\x42A\x4c\x53"}["q\x6fp\x77wt\x76\x66\x7a\x65"]}[${${"G\x4cO\x42A\x4c\x53"}["vp\x62ir\x79zs"]}])){${${"\x47\x4cOB\x41\x4c\x53"}["\x71op\x77w\x74\x76\x66z\x65"]}[${${"\x47L\x4f\x42\x41\x4cS"}["\x71u\x6c\x71\x70inv\x65\x70\x77"]}]=${${"\x47\x4c\x4f\x42AL\x53"}["c\x6b\x6a\x72o\x7a\x72\x68ek\x67"]};}}extract(${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["qop\x77\x77\x74\x76\x66\x7a\x65"]});${${"\x47L\x4fBA\x4c\x53"}["\x6f\x7apf\x6au\x62\x67\x6f"]}=&get_instance();${"G\x4c\x4fB\x41LS"}["t\x62\x66\x73y\x74"]="\x6eewli\x6e\x65";$CI->load->helper("xm\x6c");${${"\x47L\x4f\x42A\x4c\x53"}["\x65k\x76\x7a\x69wu\x6cpz\x64\x66"]}="\x3c{$root}\x3e".${$ibcixhe};foreach($query->result_array()as${${"G\x4cO\x42A\x4c\x53"}["\x6dfj\x61\x70k\x69\x77"]}){$ygggqkpmhb="\x74\x61\x62";${"\x47L\x4f\x42\x41\x4c\x53"}["xiqs\x62\x6cj"]="tab";${"GLO\x42\x41\x4c\x53"}["\x7a\x76u\x6a\x64g\x68\x77"]="\x78m\x6c";${${"\x47LO\x42\x41\x4cS"}["d\x63v\x76s\x6c"]}.=${${"GLO\x42\x41L\x53"}["\x78\x69qs\x62lj"]}."<{$element}>".${${"\x47LO\x42A\x4c\x53"}["\x63\x78\x70\x79d\x66"]};foreach(${${"GLO\x42A\x4cS"}["\x6dfj\x61pkiw"]} as${${"\x47\x4c\x4fBA\x4c\x53"}["q\x75lq\x70\x69\x6e\x76ep\x77"]}=>${${"G\x4c\x4f\x42\x41LS"}["\x63k\x6a\x72o\x7a\x72he\x6bg"]}){${${"\x47L\x4f\x42\x41\x4cS"}["\x64\x63v\x76\x73\x6c"]}.=${${"\x47\x4c\x4f\x42A\x4c\x53"}["f\x7a\x64\x6f\x6f\x7a\x6cnu\x66"]}.${${"GLO\x42\x41L\x53"}["\x66zd\x6f\x6f\x7aln\x75\x66"]}."\x3c{$key}\x3e".xml_convert(${${"GL\x4f\x42AL\x53"}["c\x6b\x6ar\x6f\x7a\x72\x68\x65\x6bg"]})."\x3c/{$key}>".${${"G\x4c\x4fB\x41\x4cS"}["\x63xp\x79d\x66"]};}${${"G\x4c\x4f\x42ALS"}["\x7a\x76ujd\x67h\x77"]}.=${$ygggqkpmhb}."\x3c/{$element}\x3e".${${"\x47L\x4fB\x41\x4c\x53"}["cxp\x79\x64f"]};}${$odkknzxmbb}.="\x3c/$root>".${${"GL\x4f\x42\x41L\x53"}["t\x62\x66\x73\x79\x74"]};return${${"\x47\x4c\x4fB\x41L\x53"}["\x64\x63vvs\x6c"]};}function backup($params=array()){$xpfosyma="\x70r\x65f\x73";$lmyjcwe="p\x61\x72\x61m\x73";if(is_string(${$lmyjcwe})){${${"\x47\x4c\x4fBA\x4c\x53"}["qo\x70\x77wtvf\x7a\x65"]}=array("ta\x62l\x65s"=>${${"\x47\x4c\x4f\x42\x41\x4cS"}["\x71opw\x77\x74\x76\x66z\x65"]});}${$xpfosyma}=array("t\x61bles"=>array(),"i\x67no\x72\x65"=>array(),"f\x69len\x61\x6de"=>"","f\x6frmat"=>"\x67\x7a\x69p","a\x64d\x5fdro\x70"=>TRUE,"ad\x64\x5f\x69nse\x72\x74"=>TRUE,"newli\x6e\x65"=>"\n");$xpmiub="prefs";${"\x47\x4cOB\x41\x4c\x53"}["bi\x71ln\x6b\x76\x6c"]="pr\x65\x66\x73";if(count(${${"GL\x4f\x42A\x4cS"}["qo\x70w\x77\x74\x76f\x7a\x65"]})>0){${"\x47\x4c\x4f\x42A\x4c\x53"}["nj\x64\x6fm\x6c\x6b\x68\x6as"]="k\x65\x79";foreach(${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x68\x74\x70r\x6c\x64vc\x64\x77s"]} as${${"\x47L\x4f\x42\x41\x4c\x53"}["\x6ej\x64\x6f\x6d\x6c\x6b\x68\x6a\x73"]}=>${${"\x47L\x4fBA\x4c\x53"}["c\x6b\x6ar\x6f\x7a\x72he\x6bg"]}){$rlpoyfmyes="\x70\x61r\x61ms";if(isset(${$rlpoyfmyes}[${${"G\x4c\x4fBA\x4c\x53"}["\x71\x75\x6c\x71\x70in\x76\x65p\x77"]}])){$ofysgsvlm="p\x72e\x66\x73";${"\x47LOB\x41L\x53"}["g\x68w\x64vjo\x70\x77"]="\x6bey";${$ofysgsvlm}[${${"\x47\x4cO\x42\x41L\x53"}["\x71\x75lq\x70\x69\x6eve\x70w"]}]=${${"G\x4c\x4f\x42\x41\x4cS"}["q\x6f\x70\x77wtv\x66z\x65"]}[${${"\x47\x4c\x4fB\x41L\x53"}["\x67\x68\x77\x64v\x6a\x6f\x70\x77"]}];}}}if(count(${${"\x47\x4cO\x42A\x4c\x53"}["\x68t\x70\x72\x6c\x64vc\x64\x77s"]}["\x74able\x73"])==0){${${"GL\x4fBALS"}["h\x74\x70r\x6c\x64\x76cd\x77\x73"]}["t\x61\x62le\x73"]=$this->db->list_tables();}if(!in_array(${${"\x47LOB\x41\x4cS"}["h\x74\x70rl\x64\x76\x63\x64w\x73"]}["\x66or\x6d\x61t"],array("\x67zi\x70","z\x69p","t\x78t"),TRUE)){${${"G\x4c\x4f\x42A\x4cS"}["\x68\x74\x70r\x6c\x64v\x63\x64\x77s"]}["\x66or\x6dat"]="t\x78\x74";}${"\x47\x4c\x4f\x42A\x4c\x53"}["\x67\x63k\x78\x7aj"]="prefs";${"\x47\x4c\x4f\x42\x41\x4cS"}["\x67\x64nf\x69\x6f\x62qc"]="\x70r\x65\x66\x73";if((${${"G\x4c\x4f\x42A\x4c\x53"}["\x62\x69q\x6cn\x6b\x76\x6c"]}["fo\x72\x6d\x61t"]=="gzip"AND!@function_exists("\x67z\x65\x6ec\x6f\x64e"))OR(${$xpmiub}["\x66\x6f\x72ma\x74"]=="\x7aip"AND!@function_exists("\x67zc\x6f\x6d\x70r\x65\x73\x73"))){${"\x47\x4cO\x42ALS"}["\x6c\x6a\x71c\x71\x63\x75\x6fv\x6c\x6c"]="\x70\x72ef\x73";if($this->db->db_debug){return$this->db->display_error("db_u\x6e\x73u\x70or\x74\x65d\x5f\x63o\x6dp\x72\x65\x73\x73\x69\x6f\x6e");}${${"\x47\x4c\x4f\x42\x41\x4cS"}["l\x6a\x71\x63qc\x75\x6f\x76\x6c\x6c"]}["\x66o\x72\x6da\x74"]="\x74xt";}if(${${"\x47\x4cO\x42A\x4c\x53"}["h\x74\x70\x72l\x64\x76cdw\x73"]}["\x66i\x6c\x65nam\x65"]==""AND${${"\x47LO\x42\x41LS"}["ht\x70rl\x64\x76\x63\x64\x77\x73"]}["forma\x74"]=="zi\x70"){$qkdtpmruprf="pr\x65\x66\x73";${"\x47\x4cO\x42\x41\x4cS"}["\x6bm\x63\x75b\x6f\x79\x70\x71\x68w\x6f"]="\x70r\x65\x66\x73";${"GL\x4f\x42\x41\x4cS"}["o\x71\x62\x69\x67\x72\x68\x67k"]="\x70\x72\x65f\x73";${${"\x47\x4cOBAL\x53"}["km\x63\x75\x62o\x79p\x71\x68wo"]}["fil\x65\x6e\x61\x6de"]=(count(${$qkdtpmruprf}["ta\x62les"])==1)?${${"\x47\x4c\x4f\x42\x41\x4cS"}["o\x71b\x69g\x72hg\x6b"]}["\x74a\x62les"]:$this->db->database;${${"\x47LO\x42\x41L\x53"}["\x68\x74prldvc\x64\x77s"]}["\x66\x69\x6c\x65nam\x65"].="\x5f".date("Y-m-\x64_\x48-\x69",time());}$zdeeromizyz="\x70\x72\x65\x66s";if(${${"\x47\x4c\x4fB\x41L\x53"}["\x67\x63\x6b\x78\x7aj"]}["fo\x72m\x61\x74"]=="gzi\x70"){return gzencode($this->_backup(${${"\x47L\x4f\x42\x41\x4c\x53"}["h\x74\x70\x72\x6c\x64\x76c\x64ws"]}));}if(${${"\x47\x4c\x4f\x42AL\x53"}["gdn\x66i\x6f\x62\x71c"]}["\x66o\x72\x6da\x74"]=="\x74x\x74"){${"GL\x4fB\x41\x4cS"}["v\x69\x7a\x66\x70ef\x79\x63\x66"]="\x70\x72\x65\x66\x73";return$this->_backup(${${"G\x4cOB\x41\x4cS"}["\x76izfp\x65\x66y\x63\x66"]});}if(${$zdeeromizyz}["for\x6d\x61t"]=="zi\x70"){$xjyfdic="\x70\x72\x65\x66\x73";${"\x47L\x4f\x42\x41\x4c\x53"}["\x6a\x66\x62\x6ef\x6c\x76\x7a\x67"]="p\x72\x65f\x73";if(preg_match("|.+?\\\x2e\x7ai\x70\$|",${$xjyfdic}["\x66\x69\x6cen\x61me"])){${"\x47L\x4f\x42AL\x53"}["\x6f\x70\x6e\x6c\x67f"]="\x70\x72\x65\x66\x73";${"\x47L\x4fBA\x4c\x53"}["kn\x68\x6a\x61x\x62\x62\x74\x6c"]="p\x72ef\x73";${${"GL\x4fBA\x4cS"}["\x6fpn\x6cg\x66"]}["f\x69len\x61\x6de"]=str_replace(".\x7a\x69p","",${${"GL\x4fB\x41\x4cS"}["\x6bnhj\x61\x78\x62\x62t\x6c"]}["f\x69l\x65\x6e\x61me"]);}$ymdkiq="\x70\x72e\x66s";if(!preg_match("|.+?\\\x2esql\$|",${${"G\x4c\x4f\x42\x41L\x53"}["\x6afb\x6e\x66\x6c\x76\x7a\x67"]}["f\x69\x6cena\x6de"])){$tdoqdbxvysb="\x70\x72e\x66s";${$tdoqdbxvysb}["file\x6e\x61\x6de"].=".\x73q\x6c";}${${"\x47\x4cOBA\x4c\x53"}["\x74q\x78\x6d\x6c\x77\x73qc"]}=&get_instance();$CI->load->library("\x7a\x69p");$CI->zip->add_data(${$ymdkiq}["\x66i\x6c\x65n\x61me"],$this->_backup(${${"\x47L\x4fB\x41\x4c\x53"}["\x68\x74\x70rl\x64v\x63d\x77\x73"]}));return$CI->zip->get_zip();}}}
?>