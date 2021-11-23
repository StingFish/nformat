<?php
$db_connect = new mysqli('localhost','root','','yearbook') or die ("Could not connect to database".mysqli_error($db_connect));
$output = '';
if(isset($_POST["milestone_query"]))
{
	$search = mysqli_real_escape_string($db_connect, $_POST["milestone_query"]);
	$query = "
	SELECT * FROM tab11
	WHERE year LIKE '%".$search."%'
	";
}
else
{
	$query = "
	SELECT * FROM tab11";
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
							<th>Year</th>
							<th>Action</th>
						</tr>
            </thead>
            <tfoot>
              <tr>
                <th>Image</th>
                <th>Year</th>
                <th>Action</th>
              </tr>
            </tfoot>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td><img class="image-official" src="data:image/jpeg;base64,'.base64_encode($row["image1"]).'"/></td>
				<td>'.$row["year"].'</td>
        <td align="center">
                <button class="button2 bGreen" style="border:1px solid;width:30px;">
              <a class="delbtn" style="text-decoration:none; color:white;" href ="RegFunction.php?edit='.$row["id"].'">&#9998;</a>
                </button>
                <button class="button3 bRed" style="border:1px solid;width:30px;">
              <a class="delbtn" style="text-decoration:none; color:white;" href="registarFunction.php?email='.$row["year"].'">&#128465;</a>
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