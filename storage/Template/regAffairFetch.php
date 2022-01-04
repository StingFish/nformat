<?php
$db_connect = new mysqli('localhost','root','','yearbook') or die ("Could not connect to database".mysqli_error($db_connect));
$output = '';
if(isset($_POST["affair_query"]))
{
	$search = mysqli_real_escape_string($db_connect, $_POST["affair_query"]);
	$query = "
	SELECT * FROM tbltheme
	";
}
else
{
	$query = "
	SELECT * FROM tbltheme";
}
$result = mysqli_query($db_connect, $query);

if(mysqli_num_rows($result) > 0)
{
	$output .= '
          <div>
					<table id="wrapper">
					<thead>
						<tr>
							<th>Year</th>
							<th>Front Color</th>
							<th>Mission Color</th>
							<th>Vision Color</th>
							<th>Message Color</th>
							<th>AO Color</th>
							<th>AA Color</th>
							<th>TG Color</th>
							<th>M%A Color</th>
							<th>Action</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
						<th>Year</th>
							<th>Front Color</th>
							<th>Mission Color</th>
							<th>Vision Color</th>
							<th>Message Color</th>
							<th>AO Color</th>
							<th>AA Color</th>
							<th>TG Color</th>
							<th>M%A Color</th>
							<th>Action</th>
						</tr>
					</tfoot>
					';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td data-label="Year">'.$row["year"].'</td>
				<td data-label="Front Color"><input type ="color" value ="'.$row["color1"].'" disabled></td>
        <td data-label="Mission Color"><input type ="color" value ="'.$row["color2"].'" ></td>
        <td data-label="Vision Color"><input type ="color" value ="'.$row["color3"].'" disabled></td>
        <td data-label="Message Color"><input type ="color" value ="'.$row["color4"].'" disabled></td>
        <td data-label="AO Color"><input type ="color" value ="'.$row["color5"].'" disabled></td>
        <td data-label="AA Color"><input type ="color" value ="'.$row["color6"].'" disabled></td>
        <td data-label="TG Color"><input type ="color" value ="'.$row["color7"].'" disabled></td>
        <td data-label="M%A Color"><input type ="color" value ="'.$row["color8"].'" disabled></td>
        
        <td align="center">
                <button class="button2 bGreen" style="border:1px solid;width:30px;">
              <a class="delbtn" style="text-decoration:none; color:white;" href ="RegFunction.php?edit='.$row['year'].'">&#9998;</a>
                </button>
                <button class="button3 bRed" style="border:1px solid;width:30px;">
              <a class="delbtn" style="text-decoration:none; color:white;" href="registarFunction.php?email=">&#128465;</a>
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
