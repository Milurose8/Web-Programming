<html>
<head>
<title>Student Form</title>
</head>
<body>
<form method =  "POST" action="">

Name :
<input type = "text" name = "txtname" />
<br><br>
Branch :
<input type = "text" name = "txtbranch">
<br><br>
Mark :
<input type ="text" name ="txtmark">
<br><br>

<input type = "submit" name = "insert" value = "Save">
<input type = "Reset" value = "Cancel">

</form>

<?php
if(isset($_POST['insert']))
{
 $conn =mysqli_connect("localhost","20mca049","2737","20mca049");
if($conn)
 {
echo "Mysql connection ok<br>";

$name =$_POST['txtname'];
$branch = $_POST['txtbranch'];
$mark =$_POST['txtmark'];

$sql="INSERT INTO STUDENT(name,branch,mark) VALUES ('$name','$branch','$mark')";

if(mysqli_query($conn, $sql))
{
echo "Data inserted successfully<br>";
}
}
}
if(isset($_POST["search"]))
{
$id=$_POST["search_id"];
$qry="select*from student_name where id='$id'";
$data=mysqli_query($con,$qry);
?>
<h1 style="text-align:center"><u>STUDENT DETAILS</u><h1>
<table align="center" border="1">
<tr>
<th>ID</th>
<th>Name</th>
</tr>
<?php
$res=mysqli_fetch_array($data);
?>
<tr>
<td><?php echo $res['id'];?></td>
<td><?php echo $res['name'];?></td>
<td><a href="sample_upadte.php?id=<?php echo $res['id'];?>">update</a></td>
<td><a href="sample_delete.php>id=<?php echo $res['id'];?>">Delete</a></td>
</tr>
</table>
<?php
}