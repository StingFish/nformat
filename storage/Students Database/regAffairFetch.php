<?php
    session_start();

    if(!isset($_SESSION['User']))
    {
      echo "<script>alert('You must login first.');window.location='LC.php';</script>";
    }
    isset($_SESSION['User']);
?>
<?php
$db_connect = new mysqli('localhost','root','','tests') or die ("Could not connect to database".mysqli_error($db_connect));
$output = '';
if(isset($_POST["affair_query"]))
{
	
	$search = mysqli_real_escape_string($db_connect, $_POST["affair_query"]);
	$query = " SELECT tbl_accounts.email, tbl_accounts.profile_image, tbl_accounts.fname, tbl_accounts.mname, tbl_accounts.lname, tbl_students.sid FROM tbl_students INNER JOIN tbl_accounts ON tbl_accounts.email = tbl_students.email WHERE lname LIKE '%".$search."%' ORDER BY tbl_accounts.lname ASC";
}
else
{
	$query = "
	SELECT tbl_accounts.email, tbl_accounts.profile_image, tbl_accounts.fname, tbl_accounts.mname, tbl_accounts.lname, tbl_students.sid FROM tbl_students INNER JOIN tbl_accounts ON tbl_accounts.email = tbl_students.email ORDER BY tbl_accounts.lname ASC";
}
$result = mysqli_query($db_connect, $query);

if(mysqli_num_rows($result) > 0)
{
	$output .= '
          <div>
					<table id="wrapper">
					<thead>
						<tr>
							<th>Image</th>
							<th>Last Name</th>
							<th>First Name</th>
							<th>Middle Initial</th>
							<th>Action</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
						<th>Image</th>
						<th>Last Name</th>
						<th>First Name</th>
						<th>Middle Initial</th>
						<th>Action</th>
						</tr>
					</tfoot>
					';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td data-label="Image"><img class="image-official" src="data:image/jpeg;base64,'.base64_encode($row["profile_image"]).'"/></td>
				<td data-label="Last Name">'.$row["lname"].'</td>
        <td data-label="First Name">'.$row["fname"].'</td>
				<td data-label="Middle/tInitial">'.$row["mname"].'</td>
        <td align="center">
                <a style="text-decoration:none; color:white;" href ="regFunction.php?edit='.$row["sid"].'"><button class="button button2" style="width:90%;height:60px;">
              Add to Yearbook</button></a>
                
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
						<th>Image</th>
						<th>Last Name</th>
						<th>First Name</th>
						<th>Middle Initial</th>
						<th>Action</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
						<th>Image</th>
						<th>Last Name</th>
						<th>First Name</th>
						<th>Middle Initial</th>
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
