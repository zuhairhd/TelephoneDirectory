<?php
  if (isset($_POST["submit"])) {
       $name = $_POST["name"];
       $getdata = 1;
  }
  else {
       $getdata = 0;
  }

  require_once("dbconnection.php");
 ?>
<html>
<head>
 <meta http-equiv="content-type" content="text/html; charset=UTF-8">
 <title>Telephone Directory </title>
 <style type="text/css" title="currentStyle" media="screen">
 	@import "design.css";
 </style>
</head>
<body>
<div id="container">
	<div id="intro">
		<div id="pageHeader">
			<h1><span>Contact IP phones</span></h1>
		</div>
		<div id="quickSummary">
			<p class="p1">Enter any part of the Name, Department or Ext</p>
			<form id="form1" method="post" action="index.php" name="myform">
			  <p>Search string <input name="name" type="text" size="60" value=""  />
				               <input type="submit" name="submit" value="submit" />
			  </p>
		    </form>
   	<table width="795" border="1">
              <tr>
                <th width="398" scope="col">NAME</th>
                <th width="116" scope="col">EXT</th>
                <th width="259" scope="col">DEP.</th>
              </tr>

<?php
  if ($getdata) {
    // 3 Perform database query
	$pos = strpos($name, "%");
	if ($pos === false) {
		$name="%".$name."%";
	}
    $sql = "select name,ext,dept from contact where";
	$sql .= " name like '".$name."'";
	$sql .= "or dept like '".$name."'";
	$sql .= "or ext like '".$name."'";
    $sql .= " order by name";
    $result = mysql_query($sql,$connection);
    if (!$result) {
       die("Database selection failed: ".mysql_error());
    }

    // 4 Use Returned data
    while ($row = mysql_fetch_array($result)) {
     echo "<tr> <td> ".$row["name"]."</td> <td>".$row["ext"]."</td><td>".$row["dept"]."</td> </tr>"; 
    }
  }
?>

        </table>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>

		</div>
	</div>
</div>
<!-- extraDiv2 used for buttom image -->
<div id="leftimg">
</div>
<div id="extraDiv2">
</div>
</body>
</html>
<?php
  // 5 Close connection 
  mysql_close($connection);
?>
