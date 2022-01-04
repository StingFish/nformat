<!DOCTYPE html>
<html>
<head>
	<style>
		.contentss{
  visibility: visible;
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

    if(!isset($_SESSION['User2']))
    {
      echo "<script>alert('You must login first.');window.location='logout.php';</script>";
    }
    isset($_SESSION['User2']);
?>
<?php
$db_connect = new mysqli('localhost','root','','yearbook_test') or die ("Could not connect to database".mysqli_error($db_connect));
$output = '';
if(isset($_POST["affair_query"]))
{
	
	$search = mysqli_real_escape_string($db_connect, $_POST["affair_query"]);
	$query = " SELECT * FROM tbl_accounts WHERE fname LIKE '%".$search."%'";
}
else
{
	$query = "
	SELECT * FROM tbl_accounts";
}
$result = mysqli_query($db_connect, $query);

if(mysqli_num_rows($result) > 0)
{
	$output .= '
          <div style="overflow-x:scroll;overflow-y:scroll;">
					<table id="wrapper"> 
					<thead>
						<tr>
							<th style="width:100px;">Image</th>
							<th style="width:100px;">Last Name</th>
							<th style="width:100px;">First Name</th>
							<th style="width:100px;">Middle Name</th>
							<th style="width:300px;">Email</th>
							<th style="width:350px;">Password</th>
							<th style="width:300px;">Address</th>
							<th style="width:130px;">Contact No.</th>
							<th style="width:100px;">Landline</th>
							<th style="width:100px;">Account Type</th>
							<th style="width:100px;">Date Created</th>
							<th style="width:100px;">Disabled?</th>
							<th style="width:100px;">Action</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th style="width:100px;">Image</th>
							<th style="width:100px;">Last Name</th>
							<th style="width:100px;">First Name</th>
							<th style="width:100px;">Middle Name</th>
							<th style="width:300px;">Email</th>
							<th style="width:350px;">Password</th>
							<th style="width:300px;">Address</th>
							<th style="width:130px;">Contact No.</th>
							<th style="width:100px;">Landline</th>
							<th style="width:100px;">Account Type</th>
							<th style="width:100px;">Date Created</th>
							<th style="width:100px;">Disabled?</th>
							<th style="width:100px;">Action</th>
						</tr>
					</tfoot>
					';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td data-label="Image"><img class="image-official" src="data:image/jpeg;base64,'.base64_encode($row["profile_image"]).'"/></td>
				<td data-label="First Name"><h6 class="contentss">Last name</h6>'.$row["lname"].'</td>
        <td data-label="First Name"><h6 class="contentss">First name</h6>'.$row["fname"].'</td>
				<td data-label="Middle/tInitial"><h6 class="contentss">Middle Name</h6>'.$row["mname"].'</td>
				<td data-label="Email"style="text-overflow:ellipsis; white-space:nowrap;
  overflow:hidden;"><h6 class="contentss">Email</h6>'.$row["email"].'</td>
				<td data-label="Password" style="text-overflow:ellipsis; white-space:nowrap;
  overflow:hidden;"><h6 class="contentss">Password</h6>'.$row["password"].'</td>
				<td data-label="Address"><h6 class="contentss">Address</h6>'.$row["address"].'</td>
				<td data-label="Contact No."><h6 class="contentss">contact No.</h6>'.$row["mobile"].'</td>
				<td data-label="Landline"><h6 class="contentss">Landline</h6>'.$row["landline"].'</td>
				<td data-label="Account Type">'.$row["atype"].'</td>
				<td data-label="Date Created">'.$row["year"].'</td>
				<td data-label="Is Disabled">'.$row["is_disabled"].'</td>
        <td align="center">
                <button class="button3 bGreen" style="border:1px solid;width:30px;">
              <a class="delbtn" style="text-decoration:none; color:white;" href ="RegFunction.php?edit='.$row["email"].'">&#9998;</a>
                </button>
                <button class="button3 bRed" style="border:1px solid;width:30px;">
              <a class="delbtn" style="text-decoration:none; color:white;" href="registarFunction.php?email='.$row["fname"].'">&#128465;</a>
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
							<th style="width:100px;">Image</th>
							<th style="width:100px;">Last Name</th>
							<th style="width:100px;">First Name</th>
							<th style="width:100px;">Middle Name</th>
							<th style="width:300px;">Email</th>
							<th style="width:350px;">Password</th>
							<th style="width:100px;">Address</th>
							<th style="width:130px;">Contact No.</th>
							<th style="width:100px;">Landline</th>
							<th style="width:100px;">Account Type</th>
							<th style="width:100px;">Date Created</th>
							<th style="width:100px;">Disabled?</th>
							<th style="width:100px;">Action</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th style="width:100px;">Image</th>
							<th style="width:100px;">Last Name</th>
							<th style="width:100px;">First Name</th>
							<th style="width:100px;">Middle Name</th>
							<th style="width:300px;">Email</th>
							<th style="width:350px;">Password</th>
							<th style="width:100px;">Address</th>
							<th style="width:130px;">Contact No.</th>
							<th style="width:100px;">Landline</th>
							<th style="width:100px;">Account Type</th>
							<th style="width:100px;">Date Created</th>
							<th style="width:100px;">Disabled?</th>
							<th style="width:100px;">Action</th>
						</tr>
					</tfoot>
					';
		$output .= '
			<tr>
				<td data-label="Result" colspan="7">Data not Found</td>
			</tr>
		';
	
	echo $output;
}
?>
