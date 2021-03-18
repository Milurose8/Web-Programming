<html>
<body>
<?php
$con=mysqli_connect("localhost","20mca036","2605","20mca036");
$id=$_GET["id"];
if($con)
{
$query1="delete from STUDENT where id='9'";
if(mysqli_query($con, $query1))
{
echo "Data Removed !<br>";
} 
}
?>
</body>
</html>