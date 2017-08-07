<?php 
 
require'dbconfig/config.php';
 
$result = mysql_query("SELECT * FROM WebsiteUsers") or die('Could not query');
$data = array();
for ($x = 0; $x < mysql_num_rows($result); $x++) {
    $data[] = mysql_fetch_assoc($result);
}

 echo json_encode($data);

mysql_close($server);
 
?>