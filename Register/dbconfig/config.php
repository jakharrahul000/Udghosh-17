<?php

 // this will avoid mysql_connect() deprecation error.
 error_reporting( ~E_DEPRECATED & ~E_NOTICE );
 // but I strongly suggest you to use PDO or MySQLi.
 
 define('DBHOST', '199.79.62.21:3306');
 define('DBUSER', 'udghogvc_subhamg');
 define('DBPASS', 'udghosh17');
 define('DBNAME', 'udghogvc_cc_login');
 
 $con = mysql_connect(DBHOST,DBUSER,DBPASS) or die("Connection failed: " . mysql_error()); 
 $dbcon = mysql_select_db(DBNAME) or die("Database Connection failed: " . mysql_error()); 
 ?>