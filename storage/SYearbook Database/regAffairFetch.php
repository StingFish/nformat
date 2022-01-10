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
      echo "<script>alert('You must login first.');window.location='LC.php';</script>";
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
	$query = " SELECT tbl_accounts.profile_image, tbl_sybook.slname, tbl_students.sid, tbl_sybook.sfname, tbl_sybook.smname, tbl_sybook.quotes, tbl_students.course, tbl_sybook.school_year FROM tbl_sybook JOIN tbl_students ON tbl_students.sid=tbl_sybook.sid JOIN tbl_accounts ON tbl_accounts.email=tbl_students.email WHERE school_year = '$Yee' AND slname LIKE '%".$search."%' ORDER BY slname ASC";
}
else
{
	$query = "
	SELECT tbl_accounts.profile_image, tbl_sybook.slname, tbl_students.sid, tbl_sybook.sfname, tbl_sybook.smname, tbl_sybook.quotes, tbl_students.course, tbl_sybook.school_year FROM tbl_sybook JOIN tbl_students ON tbl_students.sid=tbl_sybook.sid JOIN tbl_accounts ON tbl_accounts.email=tbl_students.email WHERE school_year = '$Yee' ORDER BY slname ASC";
}
$result = mysqli_query($db_connect, $query);

if(mysqli_num_rows($result) > 0)
{
	$output .= '
          <div class ="wrappers" style="overflow-x:scroll;overflow-y:scroll;">
					<table id="wrapper">
					<thead>
						<tr>
							<th style="width:150px;">Image</th>
							<th style="width:150px;">Last Name</th>
							<th style="width:150px;">First Name</th>
							<th style="width:150px;">Middle Name</th>
							<th style="width:150px;">Course</th>
							<th style="width:150px;">Quotes</th>
							<th style="width:150px;">School Year</th>
							<th style="width:150px;">Action</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
						<th style="width:150px;">Image</th>
							<th style="width:150px;">Last Name</th>
							<th style="width:150px;">First Name</th>
							<th style="width:150px;">Middle Name</th>
							<th style="width:150px;">Course</th>
							<th style="width:150px;">Quotes</th>
							<th style="width:150px;">School Year</th>
							<th style="width:150px;">Action</th>
						</tr>
					</tfoot>
					';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td data-label="Image"><img class="image-official" src="data:image/jpeg;base64,'.base64_encode($row["profile_image"]).'"/></td>
				<td data-label="Last Name">'.$row["slname"].'</td>
        		<td data-label="First Name">'.$row["sfname"].'</td>
				<td data-label="Middle/tInitial">'.$row["smname"].'</td>
				<td data-label="Course">'.$row["course"].'</td>
				<td data-label="Quotes">'.$row["quotes"].'</td>
				<td data-label="School Year">'.$row["school_year"].'</td>
        		<td align="center">
                <a style="text-decoration:none; color:white;" href ="regFunction.php?editan='.$row["sid"].'"><button class="button button2" style="width:90%;height:60px;">
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
          <div class ="wrappers" style="overflow-x:scroll;overflow-y:scroll;">
					<table id="wrapper">
					<thead>
						<tr>
							<th style="width:150px;">Image</th>
							<th style="width:150px;">Last Name</th>
							<th style="width:150px;">First Name</th>
							<th style="width:150px;">Middle Name</th>
							<th style="width:150px;">Course</th>
							<th style="width:150px;">Quotes</th>
							<th style="width:150px;">School Year</th>
							<th style="width:150px;">Action</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
						<th style="width:150px;">Image</th>
							<th style="width:150px;">Last Name</th>
							<th style="width:150px;">First Name</th>
							<th style="width:150px;">Middle Name</th>
							<th style="width:150px;">Course</th>
							<th style="width:150px;">Quotes</th>
							<th style="width:150px;">School Year</th>
							<th style="width:150px;">Action</th>
						</tr>
					</tfoot>
					';
		$output .= '
			<tr>
				<td data-label="Result" colspan="8">Data not Found</td>
			</tr>
		';
	
	echo $output;
}
?>
