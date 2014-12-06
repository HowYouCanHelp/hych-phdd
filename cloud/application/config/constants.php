<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

/*
|--------------------------------------------------------------------------
| Some helpful constants
|--------------------------------------------------------------------------
|
| Abstractions of constants that can be used in different parts of the program 
| so you don't have to memorize it
|
*/

define('MYSQL_DATE_FORMAT',				'Y-n-j');
define('MYSQL_DATETIME_FORMAT',			'Y-n-j H:i:s');
define('HUMAN_DATE_FORMAT',				'F d, Y');
define('HUMAN_DATETIME_FORMAT',			'F d, Y h:i:s A');
define('UPLOAD_PATH',					'./uploads/');

/*
|--------------------------------------------------------------------------
| Amcharts constants
|--------------------------------------------------------------------------
|
| This is used to set the which barangay this instance belongs to. Set to 0 if City-mode.
|
*/

define('AMCHARTS_IMG_PATH',				'public_html/amcharts/images');
define('SVG_IMG_PATH',				'public_html/bootstrap3-flat/images/icons/svg/');
define('PNG_IMG_PATH',				'public_html/img/PNG32/');


/*
|--------------------------------------------------------------------------
| Constants from E2G2
|--------------------------------------------------------------------------
|
| This is used to set the which barangay this instance belongs to. Set to 0 if City-mode.
|
*/

define('BARANGAY_ID', 							0);
define('TEST_MODE', 							FALSE);
define('TEXTFIELD_REQUIRED_DEFAULT',			FALSE);

/* End of file constants.php */
/* Location: ./application/config/constants.php */