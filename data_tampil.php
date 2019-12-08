<?php
$url=$_SERVER['REQUEST_URI'];
header("Refresh: 5; URL=$url");  // Refresh the webpage every 5 seconds
include 'koneksi.php';
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
			<!--<th width="100px"><b>ID</b></th>-->
			<th width="50px"><b>RFID</b></th>
			<th width="50px"><b>NIK</b></th>
			<th width="80px"><b>FOTO </b></th>
			<th width="100px"><b>NAMA </b></th>
			<th width="100px"><b>KEHADIRAN</b></th>
		</tr>
<?php
// Mulai sesi web
error_reporting(0);
session_start();
		if($link=mysql_connect("localhost", "root", ""))
		mysql_select_db("dbcarousel");
  // Periksa sesi login
  if (!isset ($_SESSION["logged-in"])
  || $_SESSION["logged-in"]!==true)
  {
		$sql = "SELECT
					a.rfid,
					a.nama,
					a.nik,
					a.images,
					a.id_dosen,
					b.status
				FROM mahasiswa a 
				INNER JOIN tbkehadiran b ON a.rfid = b.rfid 
				ORDER BY b.id ASC";	
	
	$data1 = mysql_query($sql);
	$no = 1;
	while($data = mysql_fetch_array($data1)){
		if ($data['status'] == 1){
			$stat = "Masuk";
		} else if ($data['status'] == 2){
			$stat = "Keluar";
		}
		echo ("<tr [align='center'>
				<td>".$data['rfid']."</td>
				<td>".$data['nik']."</td>
				<td>".$data['images']."</td>
				<td>".$data['nama']."</td>
				<td>".$stat."</td>
			</tr>");
  }}
?>
	</table>
	
	</html>