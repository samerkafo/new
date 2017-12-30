<?php
$servername = "172.19.0.3"; $username = "root"; $password = "netlab"; $dbname= "restaurant";
 $connect = mysqli_connect($servername,$username,$password,$dbname);
 if (!$connect)  {
  die("Connection error: " . mysqli_connect_errno());   }
?>
<html>
 <head>
  </head>
   <body>
 <?php
   	 //Insert into DB
//if (isset($_POST['Submit'])) {
$meal = $_GET['meal'];
$price = "0$";
if ($meal == "Burger") {
$price ="10$";

}
else if ($meal == "Chicken") {
$price ="13$";
}
else if ($meal == "Rise") {
$price ="5$";
}
else if ($meal == "Beef") {
$price ="9$";
}

else if ($meal == "Full Burger") {
$price ="15$";
}

else if ($meal == "Pizza") {
$price ="14$";
}


		//$HostName=$_POST['HostName'];
		$RemoteIP= $_SERVER['REMOTE_ADDR'];
		$id=gethostname();
                 $query="insert into meals (orderNumber,mealName,price,orderTime,deleveryTime,clientName,clientAdress)values( NULL ,'". $meal ."','". $price ."',FROM_UNIXTIME(1299762201428),'15 minuts','". $id ."' , '" .  $RemoteIP ."' )";
       $result= mysqli_query($connect,$query);
		// echo $_SERVER['REMOTE_ADDR'];

                 if ( !$result )
		    echo 'Error  in Insert Data';


 ?>

      <?php
      include ("printTable.php");
      ?>
</body>


</body>
 </html>
<?php
 mysqli_close($connect);
?>


