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

    if(!isset($_SESSION['User2']))
    {
      echo "<script>alert('You must login first.');window.location='../../landpage.php';</script>";
    }
    isset($_SESSION['User2']);
?>
<?php
$db_connect = new mysqli('localhost','root','','tests') or die ("Could not connect to database".mysqli_error($db_connect));
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
          <div class ="wrappers" style="overflow-x:scroll;overflow-y:auto;">
					<table id="wrapper"> 
					<thead>
						<tr>
							<th style="width:100px;">Image</th>
							<th style="width:100px;">Last Name</th>
							<th style="width:100px;">First Name</th>
							<th style="width:100px;">Middle Name</th>
							<th style="width:300px;">Email</th>
							<th style="width:250px;">Password</th>
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
							<th style="width:250px;">Password</th>
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
				<td data-label="Image"><img class="image-official" src="../../DB/'.$row["profile_image"].'"/></td>
				<td data-label="First Name">'.$row["lname"].'</td>
        <td data-label="First Name">'.$row["fname"].'</td>
				<td data-label="Middle/tInitial">'.$row["mname"].'</td>
				<td data-label="Email"style="text-overflow:ellipsis; white-space:nowrap;
  overflow:hidden;">'.$row["email"].'</td>
				<td data-label="Password"  style="word-wrap: break-word">'.$row["password"].'</td>
				<td data-label="Address">'.$row["address"].'</td>
				<td data-label="Contact No.">'.$row["mobile"].'</td>
				<td data-label="Landline">'.$row["landline"].'</td>
				<td data-label="Account Type">'.$row["atype"].'</td>
				<td data-label="Date Created">'.$row["year_created"].'</td>
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
					<table id="wrapper" style="overflow-x:scroll;overflow-y:auto">
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
