<?php ${"G\x4cO\x42\x41\x4c\x53"}["\x66o\x67\x76\x6e\x65"]="\x6d\x61\x74\x63\x68";${"G\x4c\x4f\x42\x41\x4c\x53"}["f\x6fr\x70\x72\x64\x71\x70\x6btt"]="\x61\x74\x74\x72\x69\x62\x73";${"\x47L\x4f\x42\x41\x4c\x53"}["\x6a\x62\x75\x72\x62j\x68g\x74\x6e"]="\x6da\x74\x63\x68\x65s";${"\x47\x4cOBAL\x53"}["\x6a\x6f\x62\x75if\x64\x6a\x6f"]="\x65\x76i\x6c_a\x74\x74\x72\x69bute\x73";${"\x47LOB\x41\x4cS"}["\x6b\x6fyht\x68\x62vg"]="\x62\x61\x64";${"G\x4c\x4f\x42A\x4cS"}["\x6bbe\x65mx"]="\x72e\x6c\x61\x74\x69\x76\x65\x5fp\x61\x74\x68";${"GL\x4fB\x41\x4c\x53"}["\x65u\x73\x73\x6e\x77\x78\x6d\x73"]="i\x73_i\x6d\x61\x67\x65";${"\x47\x4cO\x42\x41L\x53"}["\x74\x6b\x6e\x6f\x76\x69\x68g"]="\x6f\x72\x69g\x69na\x6c";${"\x47\x4cO\x42A\x4c\x53"}["\x72s\x78\x76\x66nd\x62\x6d\x71"]="\x74\x65\x6dp";${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x76\x65d\x71mw\x73"]="\x69";${"\x47\x4c\x4f\x42\x41LS"}["\x74\x76s\x6b\x72\x66s\x62\x68"]="\x77\x6f\x72\x64";${"G\x4c\x4fB\x41\x4cS"}["\x73\x62\x61\x70\x62vk\x73"]="\x63o\x6e\x76e\x72\x74\x65d\x5fstr\x69ng";${"\x47\x4cO\x42\x41\x4c\x53"}["s\x6ad\x6b\x71\x66\x70e\x68\x67l"]="st\x72";${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x7aa\x69x\x6ft\x6e"]="s\x65\x63\x75\x72\x65\x5f\x63oo\x6b\x69\x65";${"\x47L\x4f\x42A\x4c\x53"}["\x76\x62\x71vrb"]="v\x61\x6c";${"\x47\x4cO\x42\x41\x4cS"}["\x77\x6c\x65cd\x70bk\x75"]="\x6be\x79";if(!defined("BA\x53E\x50ATH"))exit("\x4eo \x64\x69\x72\x65c\x74\x20scr\x69\x70\x74\x20ac\x63e\x73\x73 al\x6c\x6f\x77e\x64");class CI_Security{protected$_xss_hash='';protected$_csrf_hash='';protected$_csrf_expire=7200;protected$_csrf_token_name='ci_csrf_token';protected$_csrf_cookie_name='ci_csrf_token';protected$_never_allowed_str=array('document.cookie'=>'[removed]','document.write'=>'[removed]','.parentNode'=>'[removed]','.innerHTML'=>'[removed]','window.location'=>'[removed]','-moz-binding'=>'[removed]','<!--'=>'&lt;!--','-->'=>'--&gt;','<![CDATA['=>'&lt;![CDATA[','<comment>'=>'&lt;comment&gt;');protected$_never_allowed_regex=array('javascript\s*:','expression\s*(\(|&\#40;)','vbscript\s*:','Redirect\s+302',"([\"'])?data\s*:[^\\1]*?base64[^\\1]*?,[^\\1]*?\\1?");public function __construct(){if(config_item("\x63\x73r\x66\x5fprot\x65ctio\x6e")===TRUE){foreach(array("c\x73rf\x5f\x65xp\x69\x72e","csr\x66_to\x6be\x6e_name","\x63sr\x66_\x63\x6fo\x6bi\x65\x5fna\x6d\x65")as${${"\x47L\x4f\x42\x41\x4cS"}["\x77\x6cecdp\x62\x6b\x75"]}){${"G\x4cOB\x41\x4c\x53"}["\x68\x67\x6d\x65\x70\x6dr\x6fum\x72\x6e"]="\x76\x61\x6c";if(FALSE!==(${${"\x47\x4c\x4f\x42A\x4c\x53"}["hgm\x65\x70\x6dr\x6f\x75\x6dr\x6e"]}=config_item(${${"\x47\x4c\x4f\x42\x41LS"}["w\x6ce\x63\x64\x70\x62ku"]}))){$this->{"\x5f".${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x77\x6c\x65\x63\x64\x70\x62k\x75"]}}=${${"\x47\x4c\x4fB\x41\x4c\x53"}["\x76bq\x76r\x62"]};}}if(config_item("c\x6fokie_\x70r\x65fix")){$this->_csrf_cookie_name=config_item("\x63\x6f\x6f\x6b\x69\x65\x5fp\x72e\x66\x69\x78").$this->_csrf_cookie_name;}$this->_csrf_set_hash();}log_message("\x64ebug","S\x65c\x75ri\x74\x79 Cla\x73s\x20I\x6ei\x74\x69\x61\x6cized");}public function csrf_verify(){if(strtoupper($_SERVER["RE\x51U\x45\x53\x54_M\x45\x54H\x4f\x44"])!=="PO\x53T"){return$this->csrf_set_cookie();}if(!isset($_POST[$this->_csrf_token_name],$_COOKIE[$this->_csrf_cookie_name])){$this->csrf_show_error();}if($_POST[$this->_csrf_token_name]!=$_COOKIE[$this->_csrf_cookie_name]){$this->csrf_show_error();}unset($_POST[$this->_csrf_token_name]);unset($_COOKIE[$this->_csrf_cookie_name]);$this->_csrf_set_hash();$this->csrf_set_cookie();log_message("\x64\x65\x62ug","CS\x52\x46 token \x76erif\x69\x65\x64");return$this;}public function csrf_set_cookie(){${"\x47L\x4f\x42\x41\x4c\x53"}["\x64\x6d\x75n\x66yu"]="\x73e\x63\x75\x72e_\x63\x6fo\x6b\x69\x65";$yogmwl="\x65x\x70i\x72\x65";${$yogmwl}=time()+$this->_csrf_expire;$vrntlt="e\x78\x70\x69\x72e";${${"\x47\x4cO\x42\x41L\x53"}["z\x61\x69\x78\x6ftn"]}=(config_item("\x63\x6f\x6fk\x69e_se\x63u\x72e")===TRUE)?1:0;if(${${"\x47L\x4f\x42\x41L\x53"}["\x64m\x75\x6e\x66\x79\x75"]}&&(empty($_SERVER["H\x54TP\x53"])OR strtolower($_SERVER["\x48\x54\x54P\x53"])==="of\x66")){return FALSE;}setcookie($this->_csrf_cookie_name,$this->_csrf_hash,${$vrntlt},config_item("\x63ookie_path"),config_item("\x63\x6fo\x6b\x69e_d\x6fma\x69n"),${${"\x47L\x4f\x42ALS"}["z\x61\x69\x78\x6f\x74\x6e"]});log_message("deb\x75g","C\x52\x53F\x20\x63\x6fo\x6bie\x20S\x65\x74");return$this;}public function csrf_show_error(){show_error("Th\x65\x20\x61cti\x6f\x6e y\x6fu hav\x65 \x72\x65\x71\x75\x65s\x74\x65d\x20is\x20\x6eo\x74 al\x6cowe\x64.");}public function get_csrf_hash(){return$this->_csrf_hash;}public function get_csrf_token_name(){return$this->_csrf_token_name;}public function xss_clean($str,$is_image=FALSE){$ioyetpgcdnj="\x73t\x72";$hpargbqfeu="s\x74\x72";${"G\x4c\x4fB\x41LS"}["w\x77\x6e\x71\x71\x68\x71\x63"]="\x73\x74\x72";$zyknqoxgks="\x73\x74r";$bwrclygjn="\x73\x74r";$zrbpsvtqmaq="\x73\x74r";${"\x47\x4cO\x42\x41\x4c\x53"}["\x66t\x6a\x79\x74\x74\x78\x6d\x71"]="s\x74r";if(is_array(${$zrbpsvtqmaq})){while(list(${${"\x47\x4c\x4fBAL\x53"}["\x77\x6c\x65c\x64\x70\x62k\x75"]})=each(${${"\x47\x4c\x4fB\x41\x4cS"}["sj\x64\x6b\x71fp\x65h\x67\x6c"]})){$eunxsnshwxu="k\x65\x79";${"G\x4c\x4fBA\x4c\x53"}["\x61\x78lu\x6d\x71\x65\x6e"]="\x6b\x65y";${${"\x47\x4c\x4f\x42\x41LS"}["s\x6a\x64\x6b\x71f\x70ehg\x6c"]}[${$eunxsnshwxu}]=$this->xss_clean(${${"\x47\x4c\x4fB\x41L\x53"}["s\x6a\x64k\x71\x66\x70\x65h\x67l"]}[${${"\x47\x4c\x4fB\x41\x4c\x53"}["\x61\x78l\x75\x6d\x71en"]}]);}$ronhtqmdgd="s\x74r";return${$ronhtqmdgd};}$wjgxhuyoigm="s\x74\x72";${"\x47\x4c\x4f\x42A\x4cS"}["\x78\x72\x66\x68\x72\x70\x62"]="n\x61\x75g\x68\x74y";$xuhukxesnjrf="\x69s_\x69\x6d\x61\x67\x65";${${"\x47L\x4fB\x41L\x53"}["\x73\x6a\x64k\x71\x66pe\x68\x67l"]}=remove_invisible_characters(${${"G\x4cO\x42AL\x53"}["s\x6a\x64k\x71fp\x65\x68gl"]});${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x65\x6a\x74\x73d\x6e\x78k\x7a"]="\x6e\x61\x75\x67\x68\x74\x79";${"G\x4c\x4f\x42A\x4cS"}["\x79tl\x6eit\x73\x75"]="str";${$ioyetpgcdnj}=$this->_validate_entities(${${"\x47L\x4f\x42A\x4c\x53"}["\x73j\x64\x6b\x71\x66pe\x68\x67\x6c"]});${"G\x4c\x4f\x42A\x4c\x53"}["kemwr\x65\x6c\x77p\x64"]="\x77\x6fr\x64\x73";$wolyudlbjbeu="\x73\x74\x72";${"G\x4c\x4fB\x41\x4c\x53"}["\x6dy\x78\x70\x6dft\x62\x6embd"]="st\x72";${"\x47\x4c\x4f\x42\x41\x4cS"}["\x71\x63\x6dr\x77\x71lc\x66"]="\x73\x74r";${$bwrclygjn}=rawurldecode(${$wjgxhuyoigm});${"\x47L\x4f\x42\x41\x4cS"}["\x67\x68lp\x7a\x63\x6d\x6d\x67"]="\x73\x74r";${"G\x4c\x4f\x42A\x4c\x53"}["\x68j\x67\x63lb\x61\x70\x68\x6e\x6b"]="\x73\x74\x72";$iubvlujfb="\x77or\x64s";${${"\x47L\x4f\x42A\x4c\x53"}["\x73jd\x6b\x71\x66\x70\x65\x68\x67\x6c"]}=preg_replace_callback("/[\x61-z]+=([\\\x27\x22]).*?\x5c1/si",array($this,"\x5f\x63o\x6e\x76e\x72\x74\x5fa\x74tri\x62\x75te"),${${"G\x4cO\x42\x41\x4c\x53"}["\x73\x6a\x64\x6b\x71\x66\x70e\x68\x67\x6c"]});${"G\x4c\x4f\x42A\x4c\x53"}["g\x6b\x76\x76\x63\x78\x6df\x78\x65\x7a"]="i\x73\x5fimage";${${"\x47\x4cOB\x41L\x53"}["sjd\x6bqf\x70\x65\x68\x67l"]}=preg_replace_callback("/<\\w+.*?(?=\x3e|\x3c|\$)/si",array($this,"\x5f\x64eco\x64\x65_ent\x69t\x79"),${${"\x47\x4cO\x42\x41LS"}["\x68\x6agc\x6c\x62\x61p\x68n\x6b"]});${${"G\x4c\x4f\x42\x41\x4cS"}["\x73\x6a\x64\x6b\x71\x66p\x65h\x67\x6c"]}=remove_invisible_characters(${${"\x47\x4c\x4fB\x41\x4cS"}["\x66\x74j\x79\x74\x74\x78\x6d\x71"]});$eixckop="\x73\x74\x72";if(strpos(${${"\x47LO\x42\x41\x4c\x53"}["\x73\x6adk\x71fp\x65hg\x6c"]},"\t")!==FALSE){$oxngsaisbs="\x73t\x72";${${"G\x4cOB\x41\x4cS"}["\x73\x6a\x64k\x71\x66\x70\x65\x68g\x6c"]}=str_replace("\t","\x20",${$oxngsaisbs});}${${"\x47L\x4f\x42\x41\x4cS"}["sba\x70\x62vk\x73"]}=${$zyknqoxgks};${${"G\x4c\x4fBA\x4cS"}["\x6dy\x78\x70m\x66t\x62\x6e\x6dbd"]}=$this->_do_never_allowed(${${"\x47\x4c\x4f\x42A\x4cS"}["yt\x6c\x6e\x69tsu"]});$jrtkymrhqc="s\x74\x72";if(${$xuhukxesnjrf}===TRUE){${${"\x47L\x4f\x42ALS"}["\x73\x6adk\x71\x66pe\x68\x67\x6c"]}=preg_replace("/<\x5c?(\x70\x68p)/\x69","&l\x74\x3b?\x5c\x31",${${"GL\x4f\x42\x41\x4c\x53"}["\x73\x6ad\x6b\x71fp\x65\x68\x67\x6c"]});}else{${"\x47\x4cO\x42ALS"}["\x72l\x71z\x70\x63ce\x69\x72"]="s\x74\x72";${"GL\x4f\x42\x41\x4c\x53"}["\x6f\x79n\x77n\x73\x63"]="\x73tr";${${"\x47\x4c\x4fB\x41\x4cS"}["rl\x71zp\x63ce\x69r"]}=str_replace(array("<?","?"."\x3e"),array("&\x6ct;?","?&\x67\x74;"),${${"\x47LO\x42\x41\x4c\x53"}["\x6f\x79\x6ew\x6e\x73c"]});}${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x6be\x6d\x77re\x6cw\x70d"]}=array("\x6aa\x76as\x63r\x69\x70\x74","\x65\x78\x70re\x73sio\x6e","vbsc\x72\x69\x70\x74","\x73c\x72\x69p\x74","\x62\x61se6\x34","\x61p\x70\x6c\x65\x74","a\x6ce\x72\x74","\x64o\x63\x75\x6dent","\x77rit\x65","c\x6fo\x6b\x69\x65","wi\x6e\x64o\x77");${"\x47L\x4f\x42\x41\x4cS"}["\x67pi\x63\x6a\x71y"]="str";foreach(${$iubvlujfb} as${${"G\x4c\x4f\x42\x41\x4c\x53"}["\x74\x76\x73k\x72\x66s\x62h"]}){$kxskkhj="\x77\x6f\x72\x64l\x65\x6e";${"G\x4c\x4fB\x41\x4cS"}["\x78h\x68k\x74\x64o"]="s\x74\x72";${"\x47\x4cOB\x41L\x53"}["\x68\x68\x6ct\x74\x69"]="\x77\x6f\x72\x64\x6ce\x6e";$mytqbrki="\x74e\x6d\x70";$fhpwqlvnh="\x74\x65m\x70";${"\x47\x4c\x4f\x42AL\x53"}["\x79\x79yk\x77\x69p"]="\x69";${$mytqbrki}="";$xxfrupv="s\x74r";for(${${"G\x4c\x4fBA\x4cS"}["y\x79yk\x77\x69p"]}=0,${$kxskkhj}=strlen(${${"G\x4c\x4f\x42\x41\x4cS"}["tvs\x6b\x72\x66\x73\x62\x68"]});${${"G\x4c\x4f\x42\x41\x4c\x53"}["\x76e\x64\x71\x6d\x77s"]}<${${"\x47\x4c\x4fB\x41\x4c\x53"}["\x68\x68\x6ctt\x69"]};${${"\x47\x4c\x4fBA\x4c\x53"}["ved\x71\x6dws"]}++){${"GL\x4f\x42A\x4c\x53"}["\x79r\x79\x6a\x68\x76u\x74\x70\x64"]="\x77\x6f\x72d";${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x78xt\x6a\x6bpiz\x67"]="\x69";${${"\x47\x4c\x4f\x42\x41\x4cS"}["\x72\x73\x78v\x66\x6e\x64\x62\x6d\x71"]}.=substr(${${"\x47\x4c\x4f\x42\x41L\x53"}["yr\x79\x6a\x68\x76\x75\x74\x70d"]},${${"\x47\x4cO\x42\x41\x4cS"}["x\x78t\x6a\x6bp\x69\x7a\x67"]},1)."\x5cs*";}${$xxfrupv}=preg_replace_callback("\x23(".substr(${$fhpwqlvnh},0,-3).")(\x5c\x57)\x23is",array($this,"\x5fc\x6f\x6dpa\x63\x74_\x65xp\x6c\x6fde\x64\x5fw\x6f\x72d\x73"),${${"GLO\x42AL\x53"}["xhh\x6btd\x6f"]});}do{${"\x47\x4cO\x42\x41\x4c\x53"}["\x63k\x69j\x77\x72\x69\x73\x64rl"]="\x6f\x72\x69g\x69nal";$zroyuwsixnj="\x73\x74r";$eboqbykb="s\x74\x72";${"\x47L\x4f\x42\x41L\x53"}["st\x72\x65s\x76\x72\x63\x66\x63\x68"]="s\x74\x72";${${"\x47L\x4f\x42\x41\x4c\x53"}["c\x6bijwri\x73\x64r\x6c"]}=${$zroyuwsixnj};if(preg_match("/<\x61/i",${${"\x47LO\x42ALS"}["s\x6ad\x6b\x71f\x70\x65hgl"]})){${"G\x4c\x4f\x42\x41\x4c\x53"}["\x6fr\x69\x6c\x6be\x78\x71\x6c"]="st\x72";${${"\x47\x4c\x4f\x42\x41\x4cS"}["\x6f\x72il\x6b\x65x\x71\x6c"]}=preg_replace_callback("\x23<\x61\x5cs+([^\x3e]*?)(>|\$)\x23\x73i",array($this,"\x5f\x6as_l\x69\x6e\x6b_\x72em\x6f\x76a\x6c"),${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x73\x6a\x64k\x71\x66\x70\x65hg\x6c"]});}if(preg_match("/<img/i",${${"\x47\x4c\x4f\x42\x41L\x53"}["stre\x73v\x72\x63\x66\x63\x68"]})){$bqxsiwbrc="s\x74\x72";${$bqxsiwbrc}=preg_replace_callback("\x23\x3ci\x6dg\\s+([^>]*?)(\\\x73?/?\x3e|\$)\x23si",array($this,"_js_i\x6d\x67_re\x6d\x6fval"),${${"\x47L\x4f\x42A\x4cS"}["\x73\x6ad\x6b\x71\x66\x70\x65\x68\x67\x6c"]});}if(preg_match("/\x73\x63r\x69p\x74/\x69",${$eboqbykb})OR preg_match("/x\x73s/i",${${"G\x4cO\x42\x41\x4cS"}["s\x6a\x64\x6bqf\x70\x65\x68\x67\x6c"]})){${"\x47\x4cO\x42\x41\x4cS"}["\x70\x78j\x66\x68\x79\x6d\x75\x77\x6b"]="\x73\x74\x72";${${"G\x4cO\x42A\x4c\x53"}["\x70\x78\x6a\x66\x68\x79mu\x77k"]}=preg_replace("#\x3c(/*)(sc\x72\x69\x70t|x\x73s)(\x2e*?)\\>#\x73i","[\x72\x65\x6do\x76\x65d]",${${"G\x4c\x4fB\x41\x4c\x53"}["s\x6ad\x6bq\x66p\x65\x68g\x6c"]});}}while(${${"\x47\x4c\x4f\x42ALS"}["\x74k\x6e\x6f\x76i\x68g"]}!=${${"\x47\x4c\x4fBAL\x53"}["\x71\x63mr\x77ql\x63f"]});unset(${${"G\x4c\x4f\x42\x41L\x53"}["\x74k\x6e\x6f\x76i\x68\x67"]});${${"\x47\x4c\x4f\x42A\x4c\x53"}["ww\x6e\x71\x71\x68\x71\x63"]}=$this->_remove_evil_attributes(${${"\x47L\x4fB\x41\x4cS"}["\x73\x6adk\x71\x66p\x65\x68\x67l"]},${${"\x47\x4c\x4f\x42\x41\x4cS"}["\x67\x6bvvc\x78\x6d\x66\x78ez"]});${${"G\x4cO\x42\x41L\x53"}["\x78\x72\x66h\x72p\x62"]}="al\x65\x72\x74|appl\x65t|a\x75\x64io|\x62\x61\x73\x65f\x6f\x6et|\x62\x61\x73\x65|b\x65hav\x69or|b\x67so\x75nd|\x62l\x69\x6ek|b\x6f\x64\x79|\x65\x6db\x65\x64|\x65\x78p\x72\x65ssion|\x66o\x72\x6d|fr\x61\x6des\x65t|\x66\x72\x61\x6de|h\x65\x61d|htm\x6c|i\x6c\x61yer|i\x66\x72a\x6de|inp\x75\x74|\x69\x73\x69\x6ede\x78|\x6c\x61\x79er|\x6ci\x6ek|m\x65ta|\x6f\x62jec\x74|\x70laintex\x74|sty\x6c\x65|scr\x69\x70t|\x74ext\x61rea|t\x69\x74\x6ce|v\x69de\x6f|xm\x6c|x\x73\x73";${$eixckop}=preg_replace_callback("#\x3c(/*\\\x73*)(".${${"G\x4c\x4f\x42A\x4c\x53"}["\x65\x6a\x74s\x64\x6exk\x7a"]}.")([^><]*)([><]*)\x23is",array($this,"\x5fsan\x69t\x69ze_\x6ea\x75g\x68\x74y\x5f\x68\x74\x6dl"),${$wolyudlbjbeu});${$jrtkymrhqc}=preg_replace("\x23(alert|cmd|p\x61s\x73t\x68ru|ev\x61l|exec|\x65\x78pr\x65\x73\x73\x69\x6fn|\x73\x79s\x74\x65\x6d|f\x6f\x70\x65n|fs\x6fc\x6b\x6f\x70en|fi\x6ce|f\x69l\x65_\x67\x65\x74_\x63on\x74\x65\x6e\x74\x73|r\x65adfile|unl\x69n\x6b)(\x5cs*)\\((.*?)\\)#si","\x5c\x31\\\x32\x26\x234\x30\x3b\x5c3&#\x34\x31;",${${"\x47L\x4f\x42AL\x53"}["\x67\x70\x69c\x6a\x71\x79"]});${$hpargbqfeu}=$this->_do_never_allowed(${${"G\x4cO\x42\x41\x4c\x53"}["\x67hl\x70z\x63mm\x67"]});if(${${"\x47L\x4fBA\x4cS"}["eu\x73\x73\x6e\x77x\x6d\x73"]}===TRUE){${"\x47\x4c\x4f\x42\x41L\x53"}["\x66\x6e\x64\x62\x68\x69\x72\x66"]="\x63\x6f\x6eve\x72\x74\x65\x64\x5f\x73\x74ri\x6e\x67";return(${${"\x47\x4c\x4fB\x41\x4c\x53"}["\x73\x6a\x64\x6b\x71\x66p\x65\x68gl"]}==${${"G\x4c\x4f\x42\x41LS"}["\x66n\x64\x62\x68\x69\x72f"]})?TRUE:FALSE;}log_message("d\x65\x62\x75\x67","X\x53\x53 Fi\x6cterin\x67\x20com\x70l\x65t\x65\x64");return${${"\x47\x4cOBA\x4c\x53"}["\x73\x6a\x64\x6b\x71f\x70\x65\x68\x67l"]};}public function xss_hash(){if($this->_xss_hash==""){mt_srand();$this->_xss_hash=md5(time()+mt_rand(0,1999999999));}return$this->_xss_hash;}public function entity_decode($str,$charset='UTF-8'){$zgcigmbnuigg="str";${"\x47\x4c\x4f\x42A\x4c\x53"}["\x74s\x64\x66\x7aq\x65\x62\x70"]="\x63\x68a\x72\x73\x65\x74";if(stristr(${${"\x47\x4c\x4fBALS"}["sj\x64\x6b\x71f\x70\x65hgl"]},"&")===FALSE){return${${"\x47L\x4f\x42\x41\x4cS"}["s\x6a\x64k\x71fp\x65\x68\x67\x6c"]};}$pevddjuu="\x73\x74r";${$zgcigmbnuigg}=html_entity_decode(${${"\x47L\x4fBA\x4c\x53"}["\x73j\x64\x6b\x71f\x70\x65\x68g\x6c"]},ENT_COMPAT,${${"\x47\x4c\x4fB\x41\x4c\x53"}["t\x73\x64\x66zq\x65\x62\x70"]});${$pevddjuu}=preg_replace("~\x26#x(0*[0-9a-\x66]{2,\x35})\x7ee\x69","\x63\x68\x72(he\x78\x64\x65c(\x22\x5c1\"))",${${"\x47\x4c\x4f\x42AL\x53"}["s\x6a\x64kq\x66\x70\x65\x68\x67l"]});${"GL\x4f\x42\x41LS"}["\x62p\x77bn\x63\x79\x6c\x79\x62\x6f"]="s\x74\x72";return preg_replace("~&\x23([0-\x39]{\x32,4})\x7e\x65","\x63\x68\x72(\\1)",${${"\x47LO\x42AL\x53"}["\x62p\x77\x62n\x63\x79\x6c\x79b\x6f"]});}public function sanitize_filename($str,$relative_path=FALSE){${"\x47\x4cO\x42A\x4cS"}["dryv\x72\x67f\x79\x6c\x70\x6c\x70"]="\x62\x61\x64";$ytznkrxynk="\x73t\x72";$oimjzddix="\x62a\x64";${${"G\x4cO\x42A\x4c\x53"}["dry\x76\x72\x67\x66y\x6c\x70lp"]}=array("../","\x3c\x21--","-->","\x3c","\x3e","\x27","\"","\x26","\$","\x23","{","}","[","]","\x3d",";","?","%\x32\x30","\x25\x322","%3\x63","\x25253c","%3\x65","%0\x65","%2\x38","\x25\x32\x39","\x25\x32\x35\x328","%\x32\x36","%\x324","%\x33\x66","%\x33b","%\x33d");if(!${${"\x47L\x4fBAL\x53"}["\x6bbe\x65\x6d\x78"]}){${"GL\x4f\x42A\x4cS"}["osh\x6dk\x6a\x69\x70"]="\x62ad";${${"\x47\x4c\x4fBA\x4cS"}["\x6b\x6f\x79h\x74hb\x76g"]}[]="\x2e/";${${"\x47L\x4fBAL\x53"}["\x6fs\x68\x6dk\x6a\x69\x70"]}[]="/";}${$ytznkrxynk}=remove_invisible_characters(${${"\x47\x4c\x4f\x42A\x4c\x53"}["\x73\x6a\x64\x6bq\x66\x70e\x68\x67\x6c"]},FALSE);return stripslashes(str_replace(${$oimjzddix},"",${${"\x47\x4c\x4f\x42AL\x53"}["\x73j\x64\x6bq\x66\x70e\x68\x67\x6c"]}));}protected function _compact_exploded_words($matches){$eqgbtkmop="mat\x63\x68\x65\x73";$dsnpbwsrbpq="\x6d\x61\x74\x63h\x65\x73";return preg_replace("/\x5c\x73+/\x73","",${$eqgbtkmop}[1]).${$dsnpbwsrbpq}[2];}protected function _remove_evil_attributes($str,$is_image){${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x6ao\x62\x75ifdjo"]}=array("\x6f\x6e\\\x77*","s\x74\x79l\x65","\x78\x6dln\x73","f\x6frm\x61\x63t\x69\x6f\x6e");$ywtblboix="\x69\x73_\x69\x6dag\x65";$kuxvfrdkdbi="\x63\x6f\x75\x6e\x74";if(${$ywtblboix}===TRUE){${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x63\x74\x64\x6d\x6d\x6er"]="\x65\x76\x69l\x5fa\x74t\x72i\x62u\x74e\x73";unset(${${"\x47\x4c\x4f\x42A\x4c\x53"}["\x63\x74dm\x6d\x6e\x72"]}[array_search("x\x6d\x6cns",${${"\x47\x4cO\x42\x41\x4c\x53"}["\x6a\x6f\x62\x75\x69\x66d\x6a\x6f"]})]);}${"G\x4cO\x42\x41\x4cS"}["\x70\x6bfdhkc\x63"]="\x73\x74r";do{$oecrme="\x61t\x74\x72ib\x73";${"\x47\x4c\x4f\x42\x41\x4c\x53"}["p\x79\x66\x64whzg\x76x\x66"]="\x6da\x74c\x68\x65s";$mpkgluehnh="c\x6f\x75n\x74";$djicljzix="\x73t\x72";$ychmnsmuch="a\x74\x74r";${$mpkgluehnh}=0;$gmnmjgemrkcl="\x61t\x74r\x69bs";${"\x47\x4c\x4f\x42\x41\x4cS"}["n\x75\x76\x70\x63\x74"]="a\x74t\x72";$nhwvdjsykxrg="\x65vil\x5fa\x74\x74\x72\x69\x62u\x74\x65s";${$gmnmjgemrkcl}=array();preg_match_all("/(".implode("|",${$nhwvdjsykxrg}).")\\\x73*\x3d\x5c\x73*([^\\s\x3e]*)/is",${${"GLOB\x41\x4cS"}["\x73j\x64\x6b\x71\x66pe\x68gl"]},${${"G\x4c\x4f\x42\x41L\x53"}["\x70y\x66dwh\x7a\x67\x76\x78\x66"]},PREG_SET_ORDER);foreach(${${"GL\x4f\x42\x41\x4cS"}["\x6a\x62\x75r\x62\x6ah\x67t\x6e"]} as${${"\x47\x4cO\x42\x41\x4cS"}["\x6eu\x76\x70\x63\x74"]}){${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x72\x70l\x73g\x65\x79"]="\x61t\x74\x72";${${"\x47L\x4f\x42\x41\x4c\x53"}["\x66o\x72p\x72\x64\x71\x70kt\x74"]}[]=preg_quote(${${"\x47L\x4f\x42\x41L\x53"}["\x72\x70\x6c\x73\x67\x65\x79"]}[0],"/");}preg_match_all("/(".implode("|",${${"\x47\x4c\x4fB\x41L\x53"}["j\x6fb\x75i\x66\x64jo"]}).")\\\x73*\x3d\\s*(\042|\047)([^\\2]*?)(\\2)/\x69s",${$djicljzix},${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["j\x62u\x72\x62\x6ah\x67\x74\x6e"]},PREG_SET_ORDER);foreach(${${"G\x4c\x4fBA\x4cS"}["\x6ab\x75\x72b\x6a\x68\x67\x74\x6e"]} as${$ychmnsmuch}){${"\x47LO\x42A\x4c\x53"}["\x67\x73\x78jt\x75\x76\x70"]="\x61\x74tr";${${"\x47\x4c\x4fB\x41LS"}["forp\x72d\x71\x70k\x74\x74"]}[]=preg_quote(${${"GL\x4f\x42\x41\x4c\x53"}["\x67\x73\x78\x6a\x74\x75vp"]}[0],"/");}if(count(${$oecrme})>0){${"\x47\x4c\x4f\x42\x41L\x53"}["\x76\x78\x6ett\x63"]="\x73\x74\x72";$fsmdkdtoxm="\x73t\x72";${"\x47\x4c\x4f\x42AL\x53"}["i\x65\x7atyr\x65tl\x72\x65"]="c\x6f\x75\x6et";${${"\x47L\x4f\x42A\x4c\x53"}["\x76xn\x74t\x63"]}=preg_replace("/<(\\/?[^\x3e<]+?)([^\x41-\x5a\x61-z<>\x5c-])(.*?)(".implode("|",${${"GLO\x42\x41L\x53"}["\x66orp\x72d\x71\x70\x6bt\x74"]}).")(\x2e*?)([\x5cs\x3e\x3c])([><]*)/\x69","<\$\x31 \$3\$5\$6\$7",${$fsmdkdtoxm},-1,${${"G\x4c\x4f\x42\x41\x4c\x53"}["\x69\x65\x7a\x74\x79\x72e\x74l\x72\x65"]});}}while(${$kuxvfrdkdbi});return${${"G\x4c\x4f\x42\x41L\x53"}["\x70\x6b\x66d\x68k\x63c"]};}protected function _sanitize_naughty_html($matches){${"G\x4c\x4f\x42A\x4c\x53"}["n\x62\x72\x79wg\x74\x63e\x6bln"]="m\x61\x74\x63\x68es";${"G\x4c\x4f\x42\x41\x4c\x53"}["ml\x66\x69\x74\x72\x71\x6a\x6el\x68o"]="\x6d\x61t\x63h\x65\x73";${${"\x47\x4c\x4f\x42A\x4c\x53"}["\x73jdk\x71\x66\x70\x65\x68gl"]}="&\x6c\x74;".${${"\x47\x4c\x4f\x42AL\x53"}["\x6a\x62\x75\x72\x62jh\x67\x74n"]}[1].${${"\x47\x4cOBAL\x53"}["\x6dl\x66\x69\x74\x72\x71j\x6e\x6cho"]}[2].${${"\x47\x4c\x4f\x42\x41\x4cS"}["\x6eb\x72yw\x67t\x63\x65\x6bl\x6e"]}[3];${"GL\x4f\x42\x41L\x53"}["\x70\x75\x69\x63\x72\x7a"]="\x73tr";$cwdbniwqog="\x73\x74r";${$cwdbniwqog}.=str_replace(array("\x3e","<"),array("&g\x74;","&lt;"),${${"\x47\x4c\x4fB\x41\x4cS"}["j\x62\x75\x72b\x6a\x68\x67\x74n"]}[4]);return${${"\x47\x4c\x4fBA\x4cS"}["p\x75\x69\x63r\x7a"]};}protected function _js_link_removal($match){${"\x47\x4cOB\x41\x4c\x53"}["j\x64\x6c\x61ur\x61\x6auf\x6e\x70"]="\x6d\x61t\x63\x68";${"\x47LOBAL\x53"}["\x79a\x69\x64\x73\x63\x73"]="\x6d\x61\x74c\x68";return str_replace(${${"G\x4cOBAL\x53"}["y\x61\x69ds\x63s"]}[1],preg_replace("\x23h\x72ef\x3d\x2e*?(ale\x72\x74\x5c(|a\x6cert\x26\\#4\x30;|\x6a\x61\x76a\x73c\x72\x69\x70t\x5c:|\x6civ\x65\x73\x63ript\\:|\x6d\x6f\x63h\x61\\:|\x63h\x61r\x73et\x5c\x3d|w\x69\x6e\x64\x6f\x77\x5c\x2e|doc\x75m\x65\x6e\x74\x5c\x2e|\x5c\x2ec\x6fo\x6bi\x65|<\x73\x63\x72\x69p\x74|<\x78s\x73|data\x5cs*:)\x23\x73\x69","",$this->_filter_attributes(str_replace(array("\x3c","\x3e"),"",${${"\x47L\x4fB\x41L\x53"}["f\x6f\x67\x76ne"]}[1]))),${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x6a\x64\x6ca\x75\x72\x61j\x75f\x6ep"]}[0]);}protected function _js_img_removal($match){return str_replace(${${"\x47L\x4f\x42\x41L\x53"}["\x66\x6f\x67vn\x65"]}[1],preg_replace("#\x73\x72c\x3d\x2e*?(a\x6ce\x72t\\(|\x61le\x72\x74&\x5c\x23\x34\x30\x3b|j\x61\x76\x61s\x63ript\\:|liv\x65\x73cr\x69pt\\:|moc\x68a\\:|ch\x61r\x73\x65t\\\x3d|win\x64\x6f\x77\\\x2e|do\x63\x75\x6de\x6e\x74\\.|\x5c.\x63\x6fo\x6b\x69e|\x3cs\x63r\x69\x70\x74|\x3cx\x73s|\x62\x61s\x6564\x5c\x73*,)#\x73i","",$this->_filter_attributes(str_replace(array("<","\x3e"),"",${${"\x47\x4c\x4fB\x41\x4cS"}["fo\x67\x76\x6e\x65"]}[1]))),${${"\x47L\x4f\x42A\x4c\x53"}["\x66\x6f\x67\x76\x6e\x65"]}[0]);}protected function _convert_attribute($match){${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x64\x67zr\x74\x6a\x70\x6e\x62"]="m\x61\x74c\x68";return str_replace(array(">","\x3c","\\"),array("&gt\x3b","&l\x74;","\x5c\\"),${${"\x47\x4c\x4f\x42\x41\x4cS"}["\x64\x67z\x72\x74j\x70\x6e\x62"]}[0]);}protected function _filter_attributes($str){${"\x47L\x4f\x42\x41\x4c\x53"}["\x68\x77o\x6b\x61u\x70\x66"]="\x6f\x75\x74";${"G\x4c\x4f\x42\x41\x4c\x53"}["pq\x67\x66v\x77\x73cn\x66e\x6c"]="o\x75t";$ntejizwfuug="st\x72";${${"G\x4c\x4fBA\x4c\x53"}["p\x71\x67\x66v\x77s\x63\x6e\x66\x65l"]}="";if(preg_match_all("\x23\\s*[a-\x7a\x5c-]+\\s*\x3d\\\x73*(\\04\x32|\x5c0\x347)([^\x5c1]*?)\x5c\x31#i\x73",${$ntejizwfuug},${${"\x47L\x4fBA\x4c\x53"}["\x6a\x62u\x72\x62jh\x67\x74n"]})){$bibdjtjkjuov="mat\x63\x68";foreach(${${"\x47L\x4f\x42\x41\x4c\x53"}["jburb\x6a\x68\x67\x74n"]}[0]as${$bibdjtjkjuov}){${"\x47\x4cO\x42\x41LS"}["\x6e\x69o\x6cz\x74\x6d\x69d\x69"]="m\x61\x74\x63\x68";$bcrpvk="\x6fu\x74";${$bcrpvk}.=preg_replace("#/\x5c*.*?\\*/#s","",${${"G\x4cO\x42\x41L\x53"}["\x6e\x69o\x6c\x7a\x74\x6d\x69\x64i"]});}}return${${"\x47LO\x42A\x4cS"}["\x68\x77o\x6ba\x75pf"]};}protected function _decode_entity($match){return$this->entity_decode(${${"G\x4cOBA\x4c\x53"}["\x66\x6f\x67\x76\x6e\x65"]}[0],strtoupper(config_item("c\x68\x61rset")));}protected function _validate_entities($str){${"G\x4cO\x42\x41\x4c\x53"}["\x69je\x75\x66\x67"]="\x73t\x72";${${"\x47\x4c\x4fB\x41\x4c\x53"}["s\x6a\x64\x6b\x71fp\x65\x68gl"]}=preg_replace("|\x5c&([a-\x7a\x5c\x5f\x30-9\x5c-]+)\x5c=([a-z\\\x5f\x30-9\x5c-]+)|\x69",$this->xss_hash()."\\\x31=\x5c2",${${"\x47\x4cO\x42\x41\x4c\x53"}["s\x6adk\x71\x66p\x65\x68\x67l"]});${${"GL\x4f\x42ALS"}["sjd\x6b\x71\x66\x70e\x68g\x6c"]}=preg_replace("\x23(\x26\x5c\x23?[\x30-\x39a-z]{2,})([".'\\x00'."-".'\\x20'."])*;?\x23i","\\1;\x5c2",${${"\x47\x4c\x4f\x42A\x4cS"}["\x73\x6a\x64\x6bq\x66p\x65\x68\x67\x6c"]});${${"\x47\x4c\x4f\x42\x41\x4cS"}["\x69\x6ae\x75\x66\x67"]}=preg_replace("#(&\\#\x78?)([\x30-\x39A-F]+);?\x23i","\x5c\x31\x5c\x32\x3b",${${"GLO\x42\x41\x4c\x53"}["sj\x64\x6bq\x66p\x65\x68\x67l"]});${${"G\x4cOB\x41\x4c\x53"}["\x73\x6a\x64k\x71\x66\x70e\x68\x67\x6c"]}=str_replace($this->xss_hash(),"&",${${"GL\x4f\x42\x41L\x53"}["\x73j\x64kqfp\x65\x68\x67l"]});return${${"G\x4c\x4f\x42AL\x53"}["\x73\x6ad\x6bq\x66\x70e\x68\x67\x6c"]};}protected function _do_never_allowed($str){${"G\x4cO\x42\x41\x4c\x53"}["\x76\x6f\x72ou\x67\x64\x79oazy"]="\x72e\x67\x65\x78";${${"\x47\x4cO\x42\x41\x4c\x53"}["sjd\x6bq\x66pe\x68g\x6c"]}=str_replace(array_keys($this->_never_allowed_str),$this->_never_allowed_str,${${"\x47\x4c\x4f\x42ALS"}["\x73\x6a\x64k\x71f\x70eh\x67l"]});foreach($this->_never_allowed_regex as${${"GL\x4f\x42\x41L\x53"}["\x76o\x72\x6fug\x64\x79oa\x7ay"]}){${"G\x4c\x4f\x42A\x4c\x53"}["o\x6b\x79\x78n\x6b\x7a\x66"]="s\x74r";${"G\x4c\x4fB\x41\x4c\x53"}["\x73c\x69\x6bqv\x72"]="\x73\x74\x72";${"\x47LOB\x41LS"}["\x71\x73\x74\x79\x75\x63\x74u\x6a"]="r\x65\x67e\x78";${${"\x47LO\x42A\x4c\x53"}["\x6f\x6b\x79xn\x6b\x7af"]}=preg_replace("#".${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x71\x73t\x79u\x63\x74uj"]}."\x23\x69\x73","[\x72\x65mov\x65d]",${${"GLOBAL\x53"}["sc\x69\x6b\x71\x76\x72"]});}return${${"\x47\x4c\x4f\x42\x41L\x53"}["\x73\x6a\x64k\x71f\x70\x65\x68gl"]};}protected function _csrf_set_hash(){if($this->_csrf_hash==""){if(isset($_COOKIE[$this->_csrf_cookie_name])&&preg_match("#^[0-9\x61-\x66]{32}\$\x23\x69\x53",$_COOKIE[$this->_csrf_cookie_name])===1){return$this->_csrf_hash=$_COOKIE[$this->_csrf_cookie_name];}return$this->_csrf_hash=md5(uniqid(rand(),TRUE));}return$this->_csrf_hash;}}
?>