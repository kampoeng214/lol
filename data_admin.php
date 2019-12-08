<html> 
<head>
<style>
table {
    border-collapse: collapse;
    width: 80%;
}

th, td {
    text-align: center;
    padding: 8px;
}

tr:hover{background-color:#badffb}

th {
    background-color: #0CF;
    color: white;
}
.button {
    background-color: #6e300a;
    border: none;
    border-radius: 10px;
    color: white;
    padding: 4px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block; 
    margin: 50px 500px;
    cursor: pointer;
    float: right;
}

.button1 {font-size: 15px;
}
</style>
</head>
	<table width="100%" border="1" align='center'>
		<tr align='center'>
			<th width="50px"><b>NIK</b></th>
			<th width="100px"><b>Username</b></th>
			<th width="100px"><b>Password</b></th>
			<th width="80px"><b>ACTION</b></th>
		</tr>
<?php
// Mulai sesi web
error_reporting(0);
session_start();
		if($link=mysql_connect("localhost", "root", ""))
		mysql_select_db("db_magnetic");
  // Periksa sesi login
  if (!isset ($_SESSION["logged-in"])
  || $_SESSION["logged-in"]!==true)
  {
  	
	$query="select * from login ";
	$result=mysql_query($query);
  }
?>
<?php 
		while($data=mysql_fetch_array($result)) 
			
{ $no++;
		echo ("<tr [align='center'>
				<td>".$data['nik']."</td>
				<td>".$data['username']."</td>
				<td>".$data['password']."</td>
				<td align='center'>
						
							<a href='edit_data_admin.php?nik=".$data['nik']."'><i class='fa fa-pencil' style='color:#353a40'></i></a>&nbsp;
							<a href='hapus_data_admin.php?nik=".$data['nik']."'><i class='fa fa-trash-o' style='color:#353a40'></i></a>&nbsp;
						</td>
			</tr>");
}
?>
	</table>
	
</html>