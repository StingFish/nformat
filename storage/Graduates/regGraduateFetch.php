<?php
include 'db_connect.php';
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
          <tbody id="table">
						<tr>
							<th>Image</th>
							<th>First Name</th>
							<th>Middle Name</th>
							<th>Last Name</th>
							<th>Year</th>
              <th>Action</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr class="main">
				<td><img class="image-official" src="data:image/jpeg;base64,'.base64_encode($row["image"]).'"/></td>
				<td>'.$row["fname"].'</td>
        <td>'.$row["lname"].'</td>
				<td>'.$row["mname"].'</td>
				<td>'.$row["year"].'</td>
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
