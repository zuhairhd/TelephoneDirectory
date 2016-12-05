<?php
//  require_once("dbconnection.php");
 ?>

<html>
<body>

<form action="update.php" method="post">
Name: <input type="text" name="name"><br>
Dept: <input type="text" name="dept"><br>
ext.: <input type="text" name="ext"><br>
<input type="submit">
</form>

</body>
</html>

<?php
  // 5 Close connection 
  //mysql_close($connection);
?>