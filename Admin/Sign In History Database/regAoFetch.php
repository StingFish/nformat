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
	$query = " SELECT * FROM userlog WHERE loginTime LIKE '%".$search."%'";
}
else
{
	$query = "
	SELECT * FROM userlog";
}
$result = mysqli_query($db_connect, $query);

if(mysqli_num_rows($result) > 0)
{
	$output .= '
          <div>
					<table id="wrapper">
					<thead>
						<tr>
							<th>Email</th>
							<th>User Type</th>
							<th>Date & Time</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>Email</th>
							<th>User Type</th>
							<th>Date & Time</th>
						</tr>
					</tfoot>
					';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td data-label="Email">'.$row["email"].'</td>
        <td data-label="User Type">'.$row["usertype"].'</td>
				<td data-label="Date & Time">'.$row["loginTime"].'</td>
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
							<th>Email</th>
							<th>User Type</th>
							<th>Date & Time</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>Email</th>
							<th>User Type</th>
							<th>Date & Time</th>
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
