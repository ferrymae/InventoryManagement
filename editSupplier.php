<?php

include('config.php');

if (isset($_POST['submit']))
{
$id=$_POST['id'];
$name=mysqli_real_escape_string($db, $_POST['supplier_name']);
$number=mysqli_real_escape_string($db, $_POST['contact_number']);
$address=mysqli_real_escape_string($db, $_POST['address']);

mysqli_query($db,"UPDATE supplier SET supplier_name='$name', contact_number='$number' ,address='$address' WHERE supplier_id='$id'");

header("Location:supplier.php");
}


if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
{

$id = $_GET['id'];
$result = mysqli_query($db,"SELECT * FROM supplier WHERE supplier_id=".$_GET['id']);

$row = mysqli_fetch_array($result);

if($row)
{

$id = $row['supplier_id_id'];
$name = $row['supplier_name'];
$number = $row['contact_number'];
$address=$row['address'];
}
else
{
echo "No results!";
}
}
?>



<html>
<head>
<title>Edit Item</title>
</head>
<body>



<form action="" method="post" action="edit.php">
<input type="hidden" name="id" value="<?php echo $id; ?>"/>

<table border="1">
<tr>
<td colspan="2"><b><font color='Red'>Edit Records </font></b></td>
</tr>
<tr>
<td width="179"><b><font >Supplier Name<em>*</em></font></b></td>
<td><label>
<input type="text" name="supplier_name" value="<?php echo $name; ?>" />
</label></td>
</tr>

<tr>
<td width="179"><b><font color='#663300'>Contact Number<em>*</em></font></b></td>
<td><label>
<input type="text" name="contact_number" value="<?php echo $number ?>" />
</label></td>
</tr>

<tr>
<td width="179"><b><font color='#663300'>Address<em>*</em></font></b></td>
<td><label>
<input type="text" name="address" value="<?php echo $address;?>" />
</label></td>
</tr>

<tr align="Right">
<td colspan="2"><label>
<input type="submit" name="submit" value="Edit Records">
</label></td>
</tr>
</table>
</form>
</body>
</html>
