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
      echo "<script>alert('You must login first.');window.location='../../landpage.php;</script>";
    }
    isset($_SESSION['User']);
    isset($_SESSION['Use']);
?>
<?php
$db_connect = new mysqli('localhost','root','','tests') or die ("Could not connect to database".mysqli_error($db_connect));
$output = '';
if(isset($_POST["affair_query"]))
{
	
	$search = mysqli_real_escape_string($db_connect, $_POST["affair_query"]);
	$query = " SELECT * FROM tbl_addons WHERE addon_year LIKE '%".$search."%'";
}
else
{
	$query = "
	SELECT * FROM tbl_addons";
}
$result = mysqli_query($db_connect, $query);

if(mysqli_num_rows($result) > 0)
{
	$output .= '
          <div>
					<table id="wrapper">
					<thead>
						<tr>
							<th>Title</th>
							<th>Message</th>
							<th>Color Theme</th>
							<th>Year</th>
							<th>Action</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>Title</th>
							<th>Message</th>
							<th>Color Theme</th>
							<th>Year</th>
							<th>Action</th>
						</tr>
					</tfoot>
					';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td data-label="First Name">'.$row["front_title"].'</td>
				<td data-label="Image"><img class="image-official" src="uploads/'.$row["messages"].'"/>
				</td>
        <td data-label="Last Name"><input type="color" value='.$row["color_scheme"].' disabled></td>
				<td data-label="Year">'.$row["addon_year"].'</td>
        <td align="center">
                <button class="button3 bGreen" style="border:1px solid;width:30px;">
              <a class="delbtn" style="text-decoration:none; color:white;" href ="RegFunction.php?edit='.$row["addon_year"].'">&#9998;</a>
                </button>
                <button class="button3 bRed" style="border:1px solid;width:30px;">
              <a class="delbtn" style="text-decoration:none; color:white;" href="regFunction.php?email='.$row["messages"].'">&#128465;</a>
                </button>
              </td>
			</tr>
		';
	}
	echo $output;
}
else
{
	$output .= '
          <div>
					<table id="wrapper">
					<thead>
						<tr>
							<th>Title</th>
							<th>Message</th>
							<th>Color Theme</th>
							<th>Year</th>
							<th>Action</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>Title</th>
							<th>Message</th>
							<th>Color Theme</th>
							<th>Year</th>
							<th>Action</th>
						</tr>
					</tfoot>
					';
		$output .= '
			<tr>
				<td data-label="Result" colspan="5">Data not Found</td>
			</tr>
		';
	
	echo $output;
}
?>
