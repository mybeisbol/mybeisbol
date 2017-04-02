<?php // if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
 * Suggestion for size constants
 */
const KB = 1024;
const MB = 1048576;


/**
 *   Constants defined with status code
 *   @Constants HTTP_STATUS_CODE
 */
define('HTTP_CODE_CONTINUE', 100);
define('HTTP_CODE_SWITCHING_PROTOCOLS', 101);
define('HTTP_CODE_PROCESSING', 102);
define('HTTP_CODE_OK', 200);
define('HTTP_CODE_CREATED', 201);
define('HTTP_CODE_ACCEPTED', 202);
define('HTTP_CODE_NON_AUTHORITATIVE_INFO', 203);
define('HTTP_CODE_NO_CONTENT', 204);
define('HTTP_CODE_RESET_CONTENT', 205);
define('HTTP_CODE_PARTIAL_CONTENT', 206);
define('HTTP_CODE_MULTI_STATUS', 207);
define('HTTP_CODE_ALREADY_REPORTED', 208);
define('HTTP_CODE_IM_USED', 226);
define('HTTP_CODE_MULTIPLE_CHOICES', 300);
define('HTTP_CODE_MOVED_PERMANENTLY', 301);
define('HTTP_CODE_FOUND', 302);
define('HTTP_CODE_SEE_OTHER', 303);
define('HTTP_CODE_NOT_MODIFIED', 304);
define('HTTP_CODE_USE_PROXY', 305);
define('HTTP_CODE_SWITCH_PROXY', 306);
define('HTTP_CODE_TEMPORARY_REDIRECT', 307);
define('HTTP_CODE_PERMANENT_REDIRECT', 308);
define('HTTP_CODE_BAD_REQUEST', 400);
define('HTTP_CODE_UNAUTHORIZED', 401);
define('HTTP_CODE_PAYMENT_REQUIRED', 402);
define('HTTP_CODE_FORBIDDEN', 403);
define('HTTP_CODE_NOT_FOUND', 404);
define('HTTP_CODE_METHOD_NOT_ALLOWED', 405);
define('HTTP_CODE_NOT_ACCESSIBLE', 406);
define('HTTP_CODE_PROXY_AUTH_REQUIRED', 407);
define('HTTP_CODE_REQUEST_TIMEOUT', 408);
define('HTTP_CODE_CONFLICT', 409);
define('HTTP_CODE_GONE', 410);
define('HTTP_CODE_LENGTH_REQUIRED', 411);
define('HTTP_CODE_PRECONDITION_FAILED', 412);
define('HTTP_CODE_REQUEST_ENTITY_TOO_LARGE', 413);
define('HTTP_CODE_REQUEST_URI_TOO_LONG', 414);
define('HTTP_CODE_UNSUPPORTED_MEDIA_TYPE', 415);
define('HTTP_CODE_REQUESTED_RANGE_NOT_SATISFIABLE', 416);
define('HTTP_CODE_EXPECTATION_FAILED', 417);
define('HTTP_CODE_AUTH_TIMEOUT', 419);
define('HTTP_CODE_ENHANCE_YOUR_CALM', 420);
define('HTTP_CODE_UNPROCESSABLE_ENTITY', 422);
define('HTTP_CODE_LOCKED', 423);
define('HTTP_CODE_FAILED_DEPENDANCY', 424);
define('HTTP_CODE_UPGRADE_REQUIRED', 426);
define('HTTP_CODE_PRECONDITION_REQUIRED', 428);
define('HTTP_CODE_TOO_MANY_REQUESTS', 429);
define('HTTP_CODE_REQUEST_HEADER_TOO_LARGE', 431);
define('HTTP_CODE_INTERNAL_SERVER_ERROR', 500);
define('HTTP_CODE_NOT_IMPLEMENTED', 501);
define('HTTP_CODE_BAD_GATEWAY', 502);
define('HTTP_CODE_SERVICE_UNAVAILABLE', 503);
define('HTTP_CODE_GATEWAY_TIMEOUT', 504);
define('HTTP_CODE_HTTP_VERSION_NOT_SUPPORTED', 505);
define('HTTP_CODE_VARIANT_ALSO_NEGOTIATES', 506);
define('HTTP_CODE_INSUFFICIENT_STORAGE', 507);
define('HTTP_CODE_LOOP_DETECTED', 508);
define('HTTP_CODE_BANDWIDTH_LIMIT_EXCEEDED', 509);
define('HTTP_CODE_NOT_EXTENDED', 510);
define('HTTP_CODE_NETWORK_AUTH_REQUIRED', 511);
define('HTTP_CODE_NETWORK_READ_TIMEOUT_ERROR', 598);
define('HTTP_CODE_NETWORK_CONNECT_TIMEOUT_ERROR', 599);


/**
 *  PRIVILEGES
 */

define('ADMIN_PRIVILEGE_VIEW_ENTRADAS', 1);
define('ADMIN_PRIVILEGE_EDIT_ENTRADAS', 2);
define('ADMIN_PRIVILEGE_ADD_ENTRADAS', 3);
define('ADMIN_PRIVILEGE_MANAGE_CATEGORIES', 4);
define('ADMIN_PRIVILEGE_MANAGE_PAGES', 5);
define('ADMIN_PRIVILEGE_VIEW_POLLS', 6);
define('ADMIN_PRIVILEGE_ADD_POLL', 7);
define('ADMIN_PRIVILEGE_MANAGE_ADMIN', 8);
define('ADMIN_PRIVILEGE_MANAGE_USER', 9);
define('ADMIN_PRIVILEGE_SETTING_GENERAL', 10);
define('ADMIN_PRIVILEGE_SETTING_WRITE', 11);
define('ADMIN_PRIVILEGE_SETTING_READ', 12);
define('ADMIN_PRIVILEGE_SETTING_COMMENTS', 13);


?>