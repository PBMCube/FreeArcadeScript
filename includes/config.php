<?php
$dbhost = 'localhost'; // Database host usually localhost
$dbuser = 'database_user'; // Database user
$dbpass = 'database_password'; // Database password
$dbname = 'database_name'; // Database name
$dbpre = 0;
// ////////////////////////////////////////////////////////////////////////////////////////////////////
// You MUST edit the variable $cachepath below to your own hosting info. If you do not, you will get errors
// At the very least you will need to replace "hostingaccountname" with your own account user name.
// On some accounts you might need to edit the rest of the path. 
//
// Directory of the cache folder must exist, and must be chmod 777
//
// If you have questions, please ask for support
// from either your hosting company or the Free Arcade Script staff.
// ////////////////////////////////////////////////////////////////////////////////////////////////////
// 
// The folowing is more secure, but not everybody can use it. It still needs to be edited though.
// $cachepath='/home/hostingaccountname/cache/';   
// This one is one almost everybody can use, but is less secure.
$cachepath='/home/hostingaccountname/public_html/cache/';   
$cachelife = '900' ;  // Number of seconds to keep cache alive. 900 seconds equals 15 minutes. Too long and pages do not update frequently, too short and CPU resource usage goes up.

?>