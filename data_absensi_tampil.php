<?php
$url=$_SERVER['REQUEST_URI'];
header("Refresh: 5; URL=$url");  // Refresh the webpage every 5 seconds
?>
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
			<th width="50px"><b>ID</b></th>
			<th width="100px"><b>RFID</b></th>
			<th width="100px"><b>NAMA DOSEN</b></th>
			<th width="100px"><b>JABATAN</b></th>
            <th width="100px"><b>JAM DATANG</b></th>
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
	  $query="SELECT mahasiswa.rfid, mahasiswa.nama, mahasiswa.jurusan kehadiran.tanggal
FROM mahasiswa, kehadiran
WHERE mahasiswa.rfid=kehadiran.rfid;
	$result=mysql_query($query);
  }
?>
<?php 
		while($data=mysql_fetch_array($result)) 
			
{ 
		echo ("<tr [align='center'>
				<td>".$data['id']."</td>
				<td>".$data['rfid']."</td>
				<td>".$data['nama']."</td>
				<td>".$data['jabatan']."</td>
				<td>".$data['jamdatang']."</td>
				<td align='center'>
						
							
							<a href='hapus_data_absensi.php?rfid=".$data['rfid']."'><i class='fa fa-trash-o' style='color:#353a40'></i></a>&nbsp;
						</td>
			</tr>");
}
?>
	</table>
	
</html>