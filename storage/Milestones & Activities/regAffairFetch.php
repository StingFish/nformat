<!DOCTYPE html>
<html>
<head>
	<style>
		.contentss{
  visibility: visible;
    }
    .wrappers{
    	max-height: 450px;
    }
@media (min-width:320px)  {.contentss{visibility: hidden;}}
@media (min-width:481px)  {.contentss{visibility: hidden;}}
@media (min-width:641px)  {.contentss{visibility: hidden;}}
@media (min-width:641px)  {.contentss{visibility: visible;}}
@media (min-width:961px)  {.contentss{visibility: visible;}}
@media (min-width:1025px) {.contentss{visibility: visible;}}
@media (min-width:1281px) {.contentss{visibility: visible;}}
    
}
	</style>
</head>
<body>

</body>
</html>
<?php
    session_start();

    if(!isset($_SESSION['User']))
    {
      echo "<script>alert('You must login first.');window.location='../../landpage.php';</script>";
    }
    isset($_SESSION['Use']);
    isset($_SESSION['User']);
?>
<?php

$db_connect = new mysqli('localhost','root','','tests') or die ("Could not connect to database".mysqli_error($db_connect));
$output = '';
$Yee = $_SESSION['Use'];
if(isset($_POST["affair_query"]))
{
	
	$search = mysqli_real_escape_string($db_connect, $_POST["affair_query"]);
	$query = " SELECT * FROM tbl_academic WHERE academic_year = '$Yee' AND academic_year LIKE '%".$search."%' ORDER BY academic_year ASC";
}
else
{
	$query = "
	SELECT * FROM tbl_academic WHERE academic_year = '$Yee' ORDER BY academic_year ASC";
}
$result = mysqli_query($db_connect, $query);

if(mysqli_num_rows($result) > 0)
{
	$output .= '
          <div class ="wrappers" style="overflow-y:auto;">
					<table id="wrapper">
					<thead>
						<tr>
							<th style="width:250px;">Image</th>
							<th style="width:150px;">Description</th>
							<th style="width:150px;">Action</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th style="width:250px;">Image</th>
							<th style="width:150px;">Description</th>
							<th style="width:150px;">Action</th>
						</tr>
					</tfoot>
					';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td data-label="Image"><img style="max-width:50%;max-height:50%" src="uploads/'.$row["academic_image"].'"/></td>
				<td data-label="Last Name">'.$row["academic_description"].'</td>
        		<td align="center">
                <a style="text-decoration:none; color:white;" href ="regFunction.php?editan='.$row["academic_entry_id"].'"><button class="button button2" style="width:90%;height:60px;">
              Delete entry</button></a>
                
              </td>
			</tr>
		';
	}
	echo $output;
}
else
{
	$output .= '
          <div class ="wrappers" style="overflow-y:auto;">
					<table id="wrapper">
					<thead>
						<tr>
							<th style="width:250px;">Image</th>
							<th style="width:150px;">Description</th>
							<th style="width:150px;">Action</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th style="width:250px;">Image</th>
							<th style="width:150px;">Description</th>
							<th style="width:150px;">Action</th>
						</tr>
					</tfoot>
					';
		$output .= '
			<tr>
				<td data-label="Result" colspan="3">Data not Found</td>
			</tr>
		';
	
	echo $output;
}
?>
