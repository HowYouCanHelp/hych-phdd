<?php ${"\x47\x4c\x4f\x42ALS"}["\x63\x72\x6ey\x74\x71\x64p\x73\x64"]="ro\x75t\x69n\x67";${"\x47L\x4fB\x41\x4cS"}["o\x79\x6b\x67\x6f\x6av"]="\x76\x61\x6c";${"GLO\x42\x41L\x53"}["\x74\x79\x77j\x73j\x62"]="\x6bey";${"\x47LO\x42ALS"}["g\x73\x63\x6ee\x75\x6bs"]="\x75\x72\x69";${"\x47\x4c\x4f\x42\x41LS"}["wn\x79i\x73\x72p\x6dn\x71\x76"]="seg\x6d\x65n\x74s";${"\x47\x4cOB\x41\x4c\x53"}["\x68\x69\x7aul\x74\x74"]="\x78";${"\x47\x4cOB\x41\x4c\x53"}["\x7afdvmxg"]="\x72out\x65";if(!defined("B\x41SEPATH"))exit("\x4eo\x20\x64i\x72ect\x20\x73\x63ri\x70t ac\x63\x65\x73\x73 \x61\x6clo\x77e\x64");class CI_Router{var$config;var$routes=array();var$error_routes=array();var$class='';var$method='index';var$directory='';var$default_controller;function __construct(){$this->config=&load_class("C\x6fnfi\x67","core");$this->uri=&load_class("\x55R\x49","cor\x65");log_message("\x64e\x62\x75g","Ro\x75\x74er\x20\x43\x6cas\x73 I\x6e\x69\x74\x69\x61\x6c\x69\x7ae\x64");}function _set_routing(){${"G\x4c\x4fB\x41\x4cS"}["\x70\x67\x73\x62\x6a\x69\x64\x7a\x6f\x61\x64"]="\x73\x65\x67\x6d\x65\x6e\x74s";${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x6d\x79\x64\x6fkm\x72\x73\x76"]="\x73\x65g\x6d\x65nt\x73";${${"\x47\x4cO\x42AL\x53"}["\x6d\x79d\x6f\x6b\x6dr\x73\x76"]}=array();if($this->config->item("e\x6e\x61\x62le\x5f\x71\x75\x65\x72\x79_\x73\x74rings")===TRUE AND isset($_GET[$this->config->item("co\x6e\x74\x72o\x6cl\x65\x72_tr\x69\x67g\x65r")])){if(isset($_GET[$this->config->item("\x64ir\x65\x63to\x72y_tr\x69\x67g\x65\x72")])){${"G\x4c\x4f\x42\x41L\x53"}["\x72g\x62\x62\x76p"]="\x73\x65gm\x65\x6e\x74s";$this->set_directory(trim($this->uri->_filter_uri($_GET[$this->config->item("\x64\x69r\x65\x63\x74ory_\x74\x72\x69gg\x65\x72")])));${${"GLO\x42ALS"}["rg\x62b\x76\x70"]}[]=$this->fetch_directory();}if(isset($_GET[$this->config->item("\x63o\x6e\x74r\x6flle\x72_tr\x69g\x67e\x72")])){${"G\x4cO\x42ALS"}["fw\x67o\x6d\x62\x68\x70f\x67w\x79"]="\x73\x65\x67m\x65n\x74\x73";$this->set_class(trim($this->uri->_filter_uri($_GET[$this->config->item("c\x6fn\x74r\x6f\x6cl\x65r\x5ftri\x67\x67e\x72")])));${${"\x47\x4c\x4fBAL\x53"}["f\x77\x67\x6f\x6d\x62\x68\x70\x66\x67\x77\x79"]}[]=$this->fetch_class();}if(isset($_GET[$this->config->item("\x66\x75\x6e\x63\x74\x69on_t\x72\x69\x67g\x65r")])){${"\x47\x4c\x4f\x42\x41\x4c\x53"}["x\x65\x6f\x71h\x6b\x65\x6c\x74\x66\x63d"]="\x73eg\x6de\x6e\x74s";$this->set_method(trim($this->uri->_filter_uri($_GET[$this->config->item("f\x75nct\x69o\x6e\x5f\x74\x72i\x67g\x65\x72")])));${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x78\x65\x6fq\x68\x6b\x65l\x74\x66c\x64"]}[]=$this->fetch_method();}}${"\x47LOB\x41\x4c\x53"}["\x6d\x71\x65\x6c\x77\x79zs\x62h"]="\x72oute";if(defined("ENV\x49\x52ON\x4dEN\x54")AND is_file(APPPATH."co\x6e\x66\x69\x67/".ENVIRONMENT."/\x72\x6fu\x74\x65\x73\x2e\x70h\x70")){include(APPPATH."c\x6fnf\x69g/".ENVIRONMENT."/r\x6f\x75tes\x2eph\x70");}elseif(is_file(APPPATH."\x63o\x6ef\x69\x67/\x72\x6f\x75tes\x2e\x70hp")){include(APPPATH."con\x66\x69\x67/\x72\x6fute\x73\x2ephp");}$this->routes=(!isset(${${"\x47L\x4f\x42\x41\x4cS"}["\x7a\x66\x64\x76mxg"]})OR!is_array(${${"G\x4cO\x42AL\x53"}["z\x66\x64v\x6d\x78\x67"]}))?array():${${"GLOB\x41\x4cS"}["\x6d\x71\x65l\x77\x79\x7as\x62\x68"]};unset(${${"\x47\x4c\x4f\x42AL\x53"}["\x7a\x66d\x76\x6d\x78\x67"]});$this->default_controller=(!isset($this->routes["\x64e\x66a\x75lt\x5f\x63\x6fntr\x6f\x6c\x6cer"])OR$this->routes["de\x66a\x75\x6ct\x5fc\x6f\x6etro\x6c\x6ce\x72"]=="")?FALSE:strtolower($this->routes["\x64\x65\x66\x61ult_\x63\x6fn\x74\x72o\x6cl\x65\x72"]);if(count(${${"\x47L\x4fB\x41\x4c\x53"}["pg\x73\x62j\x69\x64z\x6f\x61\x64"]})>0){${"G\x4cO\x42\x41L\x53"}["\x70\x69o\x6eq\x76\x72\x69\x77w"]="\x73\x65\x67m\x65\x6et\x73";return$this->_validate_request(${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x70\x69\x6f\x6e\x71\x76\x72\x69\x77\x77"]});}$this->uri->_fetch_uri_string();if($this->uri->uri_string==""){return$this->_set_default_controller();}$this->uri->_remove_url_suffix();$this->uri->_explode_segments();$this->_parse_routes();$this->uri->_reindex_segments();}function _set_default_controller(){if($this->default_controller===FALSE){show_error("Un\x61ble\x20\x74o\x20\x64\x65\x74e\x72m\x69\x6ee \x77h\x61\x74 sh\x6f\x75\x6cd\x20be di\x73\x70\x6cayed.\x20\x41 \x64efa\x75l\x74 \x72\x6f\x75\x74e \x68a\x73\x20n\x6ft b\x65en\x20\x73pe\x63\x69\x66i\x65d\x20\x69\x6e\x20t\x68\x65 r\x6f\x75\x74\x69\x6e\x67 \x66il\x65\x2e");}if(strpos($this->default_controller,"/")!==FALSE){${${"\x47LO\x42\x41LS"}["\x68\x69z\x75\x6c\x74\x74"]}=explode("/",$this->default_controller);$this->set_class(${${"\x47\x4c\x4fBA\x4c\x53"}["\x68\x69\x7a\x75\x6c\x74\x74"]}[0]);$this->set_method(${${"\x47\x4c\x4f\x42A\x4cS"}["hi\x7a\x75l\x74\x74"]}[1]);$this->_set_request(${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["h\x69\x7au\x6c\x74\x74"]});}else{$this->set_class($this->default_controller);$this->set_method("\x69\x6ed\x65\x78");$this->_set_request(array($this->default_controller,"ind\x65x"));}$this->uri->_reindex_segments();log_message("d\x65b\x75g","No\x20\x55RI\x20p\x72es\x65n\x74. \x44\x65\x66\x61ul\x74\x20c\x6f\x6et\x72\x6f\x6c\x6ce\x72 s\x65\x74\x2e");}function _set_request($segments=array()){${${"\x47\x4c\x4fB\x41L\x53"}["w\x6e\x79\x69\x73r\x70mn\x71\x76"]}=$this->_validate_request(${${"GLOB\x41LS"}["\x77\x6e\x79\x69\x73\x72\x70\x6d\x6e\x71v"]});if(count(${${"GL\x4fB\x41\x4c\x53"}["\x77\x6e\x79\x69\x73\x72\x70m\x6eq\x76"]})==0){return$this->_set_default_controller();}$this->set_class(${${"G\x4c\x4f\x42AL\x53"}["\x77ny\x69\x73\x72pm\x6eqv"]}[0]);$cyvtjyf="\x73\x65\x67\x6d\x65\x6e\x74\x73";if(isset(${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x77\x6e\x79\x69s\x72p\x6dn\x71\x76"]}[1])){$bimykwc="s\x65\x67m\x65n\x74s";$this->set_method(${$bimykwc}[1]);}else{$rbbyjjx="\x73\x65\x67\x6den\x74\x73";${$rbbyjjx}[1]="i\x6ed\x65x";}$this->uri->rsegments=${$cyvtjyf};}function _validate_request($segments){${"\x47LO\x42\x41\x4c\x53"}["\x62xp\x6a\x67\x64e"]="s\x65\x67\x6d\x65n\x74\x73";${"G\x4cOBAL\x53"}["\x6b\x6dm\x6fl\x68b\x78t"]="\x73\x65\x67m\x65\x6e\x74\x73";if(count(${${"\x47\x4cO\x42\x41\x4c\x53"}["w\x6e\x79\x69\x73r\x70mnqv"]})==0){return${${"\x47L\x4f\x42A\x4c\x53"}["\x77\x6e\x79isr\x70\x6dnq\x76"]};}if(file_exists(APPPATH."c\x6f\x6etr\x6f\x6cl\x65r\x73/".${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x77\x6eyi\x73rpm\x6e\x71\x76"]}[0]."\x2e\x70h\x70")){${"\x47\x4c\x4fBA\x4cS"}["m\x63l\x6dh\x78j\x72\x61"]="\x73egm\x65\x6et\x73";return${${"\x47L\x4fB\x41\x4c\x53"}["m\x63\x6cm\x68x\x6a\x72\x61"]};}if(is_dir(APPPATH."c\x6fn\x74ro\x6cl\x65rs/".${${"\x47\x4c\x4fB\x41\x4c\x53"}["k\x6dmo\x6c\x68bx\x74"]}[0])){$cuhlvendhc="se\x67\x6d\x65\x6et\x73";$wktigftwrog="s\x65\x67\x6d\x65n\x74\x73";$erwgpmfhdsi="s\x65\x67m\x65n\x74s";$cmbvcydojgyl="se\x67men\x74\x73";$this->set_directory(${$cuhlvendhc}[0]);${$erwgpmfhdsi}=array_slice(${$wktigftwrog},1);if(count(${$cmbvcydojgyl})>0){if(!file_exists(APPPATH."co\x6e\x74\x72olle\x72s/".$this->fetch_directory().${${"\x47\x4cO\x42\x41\x4c\x53"}["wn\x79\x69\x73\x72\x70mn\x71v"]}[0].".\x70\x68p")){if(!empty($this->routes["\x34\x30\x34\x5fo\x76e\x72ri\x64\x65"])){${"\x47\x4cOB\x41L\x53"}["\x79t\x68\x63\x76\x6e"]="\x78";${${"G\x4cO\x42\x41\x4c\x53"}["\x68\x69\x7a\x75l\x74\x74"]}=explode("/",$this->routes["4\x30\x34\x5fov\x65\x72r\x69\x64\x65"]);$this->set_directory("");$this->set_class(${${"\x47LOBA\x4c\x53"}["\x68izu\x6ctt"]}[0]);$this->set_method(isset(${${"\x47\x4c\x4f\x42\x41L\x53"}["y\x74\x68\x63vn"]}[1])?${${"\x47\x4c\x4f\x42A\x4c\x53"}["hizul\x74t"]}[1]:"i\x6e\x64\x65\x78");return${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x68\x69\x7a\x75lt\x74"]};}else{${"\x47\x4c\x4fBA\x4c\x53"}["\x6d\x79r\x76\x67\x71\x63\x6c\x6a\x6c"]="\x73eg\x6d\x65\x6e\x74\x73";show_404($this->fetch_directory().${${"G\x4c\x4f\x42\x41\x4c\x53"}["my\x72v\x67\x71\x63l\x6al"]}[0]);}}}else{if(strpos($this->default_controller,"/")!==FALSE){${"G\x4cOBA\x4c\x53"}["\x77\x6a\x70\x61\x77\x6ex\x6b\x6d"]="x";${${"\x47LO\x42\x41\x4cS"}["\x77\x6ap\x61\x77n\x78\x6bm"]}=explode("/",$this->default_controller);$this->set_class(${${"\x47L\x4fBA\x4c\x53"}["\x68i\x7a\x75l\x74\x74"]}[0]);$this->set_method(${${"\x47L\x4f\x42\x41\x4c\x53"}["\x68\x69\x7a\x75\x6c\x74t"]}[1]);}else{$this->set_class($this->default_controller);$this->set_method("inde\x78");}if(!file_exists(APPPATH."\x63\x6fnt\x72o\x6cl\x65rs/".$this->fetch_directory().$this->default_controller.".\x70hp")){$this->directory="";return array();}}return${${"\x47LO\x42A\x4cS"}["\x77\x6e\x79\x69\x73\x72p\x6d\x6e\x71v"]};}if(!empty($this->routes["404_o\x76\x65rr\x69\x64\x65"])){${"G\x4cO\x42\x41\x4cS"}["l\x79\x6b\x79\x75\x78c\x6e\x6d"]="\x78";${"\x47\x4c\x4f\x42\x41\x4c\x53"}["h\x73i\x70\x72\x6bi\x6b"]="x";${"\x47\x4c\x4fB\x41L\x53"}["v\x64\x72\x66b\x77\x71\x73\x64\x63\x6bm"]="x";${"G\x4c\x4f\x42\x41\x4c\x53"}["\x79h\x72vn\x73t\x73"]="x";${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x6c\x79\x6b\x79\x75x\x63n\x6d"]}=explode("/",$this->routes["\x34\x30\x34\x5f\x6f\x76erri\x64e"]);$this->set_class(${${"\x47\x4cOB\x41\x4c\x53"}["\x76\x64\x72\x66b\x77q\x73d\x63k\x6d"]}[0]);$this->set_method(isset(${${"GL\x4f\x42AL\x53"}["h\x73i\x70\x72k\x69\x6b"]}[1])?${${"\x47L\x4f\x42\x41LS"}["\x68\x69\x7au\x6ctt"]}[1]:"i\x6e\x64\x65x");return${${"\x47L\x4f\x42\x41\x4c\x53"}["\x79\x68\x72\x76n\x73\x74\x73"]};}show_404(${${"\x47\x4cOB\x41\x4c\x53"}["\x62x\x70jg\x64\x65"]}[0]);}function _parse_routes(){${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x67s\x63\x6e\x65\x75k\x73"]}=implode("/",$this->uri->segments);${"G\x4cO\x42\x41LS"}["p\x6e\x61v\x69eg\x78\x6c"]="\x76\x61\x6c";if(isset($this->routes[${${"G\x4c\x4fB\x41LS"}["\x67scne\x75\x6bs"]}])){return$this->_set_request(explode("/",$this->routes[${${"G\x4c\x4f\x42\x41\x4c\x53"}["\x67\x73\x63n\x65\x75\x6b\x73"]}]));}foreach($this->routes as${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x74\x79w\x6a\x73j\x62"]}=>${${"\x47\x4c\x4f\x42\x41L\x53"}["pnavie\x67\x78\x6c"]}){${"\x47L\x4f\x42A\x4c\x53"}["si\x74\x68\x6a\x78\x67f\x70\x73\x79u"]="ke\x79";$lbbxqtjumsq="\x6b\x65\x79";${"GLOB\x41\x4c\x53"}["l\x62lw\x68\x74\x74"]="k\x65\x79";${${"\x47L\x4f\x42A\x4c\x53"}["\x73\x69\x74h\x6a\x78g\x66\x70\x73\x79\x75"]}=str_replace(":\x61n\x79","\x2e+",str_replace(":n\x75m","[0-9]+",${$lbbxqtjumsq}));if(preg_match("\x23^".${${"\x47\x4cO\x42\x41L\x53"}["\x6c\x62\x6c\x77\x68\x74\x74"]}."\$#",${${"\x47\x4cO\x42AL\x53"}["\x67s\x63\x6ee\x75k\x73"]})){$lnjurvbxkk="\x6b\x65\x79";$vyujpktrucf="\x76al";if(strpos(${${"GLO\x42\x41L\x53"}["\x6f\x79k\x67\x6fj\x76"]},"\$")!==FALSE AND strpos(${$lnjurvbxkk},"(")!==FALSE){${"\x47\x4cO\x42\x41L\x53"}["w\x6a\x6d\x71\x63\x64\x64\x7a\x68\x6e\x64\x68"]="\x76a\x6c";$gppkjylv="\x76\x61\x6c";$itutob="\x75\x72i";$cewyrl="\x6b\x65\x79";${$gppkjylv}=preg_replace("\x23^".${$cewyrl}."\$#",${${"\x47\x4cOBA\x4c\x53"}["w\x6a\x6d\x71\x63\x64dzh\x6e\x64h"]},${$itutob});}return$this->_set_request(explode("/",${$vyujpktrucf}));}}$this->_set_request($this->uri->segments);}function set_class($class){${"\x47LOBA\x4c\x53"}["\x6eu\x6d\x6e\x64\x72\x70\x62c"]="c\x6ca\x73\x73";$this->class=str_replace(array("/","\x2e"),"",${${"\x47\x4c\x4fBAL\x53"}["n\x75m\x6e\x64\x72\x70b\x63"]});}function fetch_class(){return$this->class;}function set_method($method){${"G\x4cO\x42ALS"}["\x65lx\x71\x78\x73\x74"]="\x6d\x65\x74hod";$this->method=${${"\x47\x4cO\x42A\x4c\x53"}["el\x78q\x78\x73t"]};}function fetch_method(){if($this->method==$this->fetch_class()){return"\x69\x6e\x64e\x78";}return$this->method;}function set_directory($dir){${"G\x4cO\x42AL\x53"}["\x71oequ\x70\x77j\x6d"]="\x64ir";$this->directory=str_replace(array("/","\x2e"),"",${${"\x47L\x4f\x42\x41\x4c\x53"}["\x71\x6f\x65\x71u\x70w\x6a\x6d"]})."/";}function fetch_directory(){return$this->directory;}function _set_overrides($routing){${"\x47\x4c\x4f\x42A\x4c\x53"}["cuger\x66x"]="\x72\x6f\x75ti\x6e\x67";${"\x47\x4c\x4f\x42\x41\x4cS"}["\x72z\x77\x76\x74\x72n\x75\x66"]="r\x6f\x75\x74i\x6e\x67";if(!is_array(${${"\x47LOB\x41\x4cS"}["cug\x65\x72f\x78"]})){return;}if(isset(${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["\x72\x7aw\x76\x74\x72n\x75\x66"]}["d\x69re\x63t\x6f\x72y"])){$fwkeyiz="\x72\x6fu\x74i\x6e\x67";$this->set_directory(${$fwkeyiz}["direc\x74\x6fry"]);}if(isset(${${"\x47\x4cOB\x41\x4c\x53"}["c\x72\x6e\x79\x74\x71dpsd"]}["c\x6f\x6e\x74roll\x65r"])AND${${"\x47\x4c\x4fB\x41\x4c\x53"}["cr\x6eytqd\x70\x73\x64"]}["\x63\x6f\x6etrol\x6c\x65r"]!=""){${"\x47\x4cO\x42A\x4c\x53"}["\x65lhlx\x69\x74x"]="\x72\x6f\x75\x74i\x6e\x67";$this->set_class(${${"\x47\x4c\x4f\x42A\x4cS"}["\x65\x6c\x68\x6c\x78i\x74x"]}["\x63\x6fn\x74\x72oll\x65r"]);}if(isset(${${"\x47LO\x42\x41\x4c\x53"}["\x63\x72n\x79\x74q\x64p\x73\x64"]}["fu\x6e\x63\x74io\x6e"])){${${"GL\x4f\x42\x41LS"}["\x63r\x6e\x79t\x71\x64\x70sd"]}["\x66u\x6ecti\x6f\x6e"]=(${${"\x47\x4c\x4fBA\x4c\x53"}["cr\x6ey\x74q\x64\x70sd"]}["\x66un\x63ti\x6fn"]=="")?"\x69nd\x65x":${${"G\x4c\x4f\x42\x41LS"}["c\x72\x6ey\x74\x71\x64ps\x64"]}["f\x75\x6ectio\x6e"];${"\x47\x4c\x4f\x42AL\x53"}["\x6c\x67\x61f\x64\x73h"]="\x72out\x69ng";$this->set_method(${${"\x47LO\x42\x41\x4c\x53"}["\x6c\x67\x61f\x64\x73\x68"]}["f\x75\x6ect\x69\x6fn"]);}}}
?>