
<!DOCTYPE html>
<html lang="en">
<head>
  <title> Project </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
   <script src="js/script.js"></script>
    <link rel="stylesheet" href="css/sheet.css">
</head>
<body>
<header class="imgb">
        <div class="container">
        <h1> Restaurant </h1>
</div>
</header>
<br><br>
 
<h3> <p align="left"> Information  </p></h3> 

 <?php
$servername = "172.19.0.3";
$username = "root";
$password = "netlab";
$dbname = "restaurant";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql= "SELECT * FROM  meals  order by orderNumber desc LIMIT 1" ;
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
         // output data of each row

      echo "<table border='1' cellpadding='10'>";
      echo "<tr><th>orderNumber</th><th>mealName</th><th>price</th> <th>orderTime </th><th>deleveryTime</th><th>clientName</th> <th>clientAdress </th></tr>";
      while($row = mysqli_fetch_assoc($result))
	{
	$Cvalue= "#" . substr($row["clientName"],6);
	$bgColor = ' style="background-color: ' .$Cvalue . ';" ';
   echo "<tr>";
	echo "<td ".$bgColor .">" . $row["orderNumber"] . "</td>" ;
	echo "<td ".$bgColor .">" . $row["mealName"] . "</td>" ;
	echo "<td ".$bgColor .">" . $row["price"] . "</td>" ;
	echo "<td ".$bgColor .">" . $row["orderTime"] . "</td>" ;
	echo "<td ".$bgColor .">" . $row["deleveryTime"] . "</td>" ;
	echo "<td ".$bgColor .">" . $row["clientName"] . "</td>" ;
	echo "<td ".$bgColor .">" . $row["clientAdress"] . "</td>" ;
    echo "</tr>";
	}
	echo " </table>";

}
 else {
    echo "0 results";
}
mysqli_close($conn);
?>
