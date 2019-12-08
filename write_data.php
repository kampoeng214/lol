<?php

    // Prepare variables for database connection
   
    $dbusername = "root";  // enter database username, I used "arduino" in step 2.2
    $dbpassword = "";  // enter database password, I used "arduinotest" in step 2.2
    $server = "localhost"; // IMPORTANT: if you are using XAMPP enter "localhost", but if you have an online website enter its address, ie."www.yourwebsite.com"

    // Connect to your database

    $dbconnect = mysql_pconnect($server, $dbusername, $dbpassword);
    $dbselect = mysql_select_db("db_magnetic",$dbconnect);

    // Prepare the SQL statement
    $ID=$_GET["rfid"];
    $data = "SELECT * FROM mahasiswa";

    foreach($data as $i){
    	if($ID===$i["ID"]){
    		echo"yes";
    	}
    	else{
    		echo"no";
    	}
    }

	$sql = "SELECT * FROM tbkehadiran WHERE rfid = '{$_GET['rfid']}' ORDER BY id DESC LIMIT 1";
	$res = mysql_query($sql);
	$absen = mysql_fetch_assoc($res);
	$jumlah = mysql_num_rows($res);
	$rfid = $absen['absen'];
	$status = $absen['status'];
	
	if($jumlah == '0'){
		$tambah = "INSERT INTO tbkehadiran (rfid, status) VALUES ('{$_GET['rfid']}', '1')";    
	}
	else{
		if($status == '2'){
			$tambah = "INSERT INTO tbkehadiran (rfid, status) VALUES ('{$_GET['rfid']}', '1')";    
		}else{
			$tambah = "UPDATE tbkehadiran SET jampulang = CURRENT_TIME(), status = '2' WHERE rfid = '$rfid' AND status = '1';";    
		}
	}
		mysql_query($tambah);

    // Execute SQL statement


?>