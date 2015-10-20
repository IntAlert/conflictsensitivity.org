<?php
$test Connection = mysql_connect('localhost', 'root', '');
if (!$test Connection) {
die('Error: ' . mysql_error());
}
echo 'Database connection working!';
mysql_close($test Connection);
?>
