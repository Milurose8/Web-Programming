<html>
<head></head>
<title>Student Registration</title>
<body>
<form method="post" action="stud.php" >
<h1 style="text-align:center"><u>STUDENT REGISTRATION FORM</u></h1>

<table align="center">
<tr>
<td>STUDENT ID</td>
<td>:</td>
<td><input type="text" name="id"></td></tr>
<tr>
<td>NAME</td>
<td>:</td>
<td><input type="text" name="name"></td></tr>
<tr>
<td>BRANCH</td>
<td>:</td>
<td><input type="text" name="branch"></td></tr>
<tr>
<td>MARKS</td>
<td>:</td>
<td><input type="text" name="mark"></td></tr>
<tr>
<td>&nbsp;</td></tr>
<tr>
<td colspan="2" style="text-align:right"><input type="submit" name="insert" value="insert"></td></tr>
</table>
</form>

<div align="center">

<form method="POST" action="stud.php">
<h1 style="text-align:center"><u>UPDATE DATA</u></h1>
<input type="text" name="search_id" >
<input type="submit" name="search" value="SEARCH">
<input type="submit" name="view" value="VIEW">
</form>
</div>
<?php
$con=mysqli_connect("localhost","20mca036","2605","20mca036");
if(isset($_POST['insert']))
{
if($con)
{
$id=$_POST["id"];
$name=$_POST["name"];
$branch=$_POST["branch"];
$mark=$_POST["mark"];

$query="insert into STUDENT(id,Name,Branch,Mark) values('$id','$Name','$Branch','$Mark')";
if(mysqli_query($con,$query))
{
echo "data inserted !";
}
}
}

if(isset($_POST["search"]))
{
$sid=$_POST["search_id"];
$query="select*from STUDENT where id='$sid'";
$data=mysqli_query($con, $query);
?>

<h1 style="text-align:center"><u>STUDENT DETAILS</u></h1>
<table align="center" border="1">
<tr>
<th>SL.NO</th>
<th>STUDENT ID</th>
<th>STUDENT NAME</th>
<th>BRANCH</th>
<th>MARK</th>
</tr>

<?php
$res=mysqli_fetch_array($data);
?>
<tr>
<td><?php echo $res['id'];?></td>
<td><?php echo $res['Name'];?></td>
<td><?php echo $res['Branch'];?></td>
<td><?php echo $res['Mark'];?></td>
<td><a href="stuupdate.php?id=<?php echo $res['id'];?>">UPDATE</a></td>
<td><a href="Delete.php?id=<?php echo $res['id'];?>">DELETE</a></td>
</tr>
</table>

<?php
}

if(isset($_POST["view"]))
{
$query="select*from STUDENT";
$data=mysqli_query($con, $query);
?>
<h1 style="text-align:center"><u>STUDENT DETAILS</u></h1>
<table align="center" border="1">
<tr>

<th>STUDENT ID</th>
<th>STUDENT NAME</th>
<th>BRANCH</th>
<th>MARK</th>
</tr>

<?php
while($res=mysqli_fetch_array($data))
{
?>
<tr>
<td><?php echo $res['id'];?></td>
<td><?php echo $res['Name'];?></td>
<td><?php echo $res['Branch'];?></td>
<td><?php echo $res['Mark'];?></td>
</tr>
<?php
}
}
?>
</table>
</body>
</html>