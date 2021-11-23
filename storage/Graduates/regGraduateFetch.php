<?php
$db_connect = new mysqli('localhost','root','','yearbook') or die ("Could not connect to database".mysqli_error($db_connect));
$output = '';
if(isset($_POST["graduates_query"]))
{
	$search = mysqli_real_escape_string($db_connect, $_POST["graduates_query"]);
	$query = "
	SELECT * FROM shs
	WHERE fname LIKE '%".$search."%'
	";
}
else
{
	$query = "
	SELECT * FROM shs";
}
$result = mysqli_query($db_connect, $query);

if(mysqli_num_rows($result) > 0)
{
	$output .= '
          <div>
					<table class="table">
          <thead>
						<tr>
							<th>Image</th>
							<th>First Name</th>
							<th>Middle Name</th>
							<th>Last Name</th>
							<th>Quotes</th>
							<th>Year</th>
              <th>Action</th>
						</tr>
						</thead>
						<tfoot>
						<tr>
						<th>Image</th>
						<th>First Name</th>
						<th>Middle Name</th>
						<th>Last Name</th>
						<th>Quotes</th>
						<th>Year</th>
						<th>Action</th>
						</tr>
					</tfoot>
					';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr class="main">
				<td data-label="Image"><img class="image-official" src="data:image/jpeg;base64,'.base64_encode($row["image"]).'"/></td>
				<td data-label="First Name">'.$row["fname"].'</td>
				<td data-label="Middle/tInitial">'.$row["mname"].'</td>
        <td data-label="Last Name">'.$row["lname"].'</td>
				<td data-label="Qoutes">'.$row["quotes"].'</td>
				<td data-label="Year">'.$row["year"].'</td>
        <td align="center">
                <button class="button2 bGreen" style="border:1px solid;width:30px;">
              <a class="delbtn" style="text-decoration:none; color:white;" href ="RegFunction.php?edit3='.$row["id"].'">&#9998;</a>
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
	echo 'Data Not Found';
}
?>
