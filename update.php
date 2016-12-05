<?php
 $name = $_POST["name"];
 $dept = $_POST["dept"];
 $ext = $_POST["ext"];
/*
echo " update done ";

echo $name;
echo $dept;
echo $ext;

INSERT INTO table_name (column1,column2,column3,...)
VALUES (value1,value2,value3,...);
*/
require_once("dbconnection.php");
$sql = "INSERT INTO contact (ext,name,dept) VALUES ('".$ext."','".$name."','".$dept."')";
echo $sql;
$result = mysql_query($sql,$connection);
    if (!$result) {
       die("Database update failed: ".mysql_error());
    }
mysql_close($connection);
?>