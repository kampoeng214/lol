<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Web - Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
  <?php
// Mulai sesi web
error_reporting(0);
session_start();
		if($link=mysql_connect("localhost", "root", ""))
		mysql_select_db("db_magnetic");
  // Periksa sesi login
  if (!isset ($_SESSION["logged-in"])
  || $_SESSION["logged-in"]!==true)
?>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.html" class="logo"><b>SISTEM DOORLOC MAGNETIC LABORATURIUM PRODI INFORMATIKA</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="login.php">Logout</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a><img src="img/uika-ft.png" class="fa-square" width="60"></a></p>
              	  <h5 class="centered">Admin</h5>
				  	
                  <li class="sub-menu">
                      <a class="javascript:;">
                          <i class="fa fa-th"></i>
                          <span>Admin</span>
                      </a>
					  <ul class="sub">
                          <li><a  href="list_admin.php">List Administrator</a></li>
                          <li><a  href="tambah_data_admin.php">Tambah Data Admin</a></li>
                      </ul>
                  </li>
                  
                  <li class="sub-menu">
                      <a class="active" href="javascript:;" >
                          <i class="fa fa-th"></i>
                          <span>Pengguna</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="list_mahasiswa.php">List Pengguna</a></li>
                          <li class="active"><a  href="tambah_data_mahasiswa.php">Tambah Data Pengguna</a></li>
                      </ul>
                  </li>
				  
				   <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-th"></i>
                          <span>Kehadiran</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="list_absensi.php">Data Kehadiran</a></li>
						  <li><a  href="list_laporan.php">Laporan</a></li>
						   <li><a  href="list_tampil.php">Tampil</a></li>
                          <!--<li><a  href="tambah_data_mahasiswa.php">Input Absensi</a></li> -->
                      </ul>
                  </li>
                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i>Tambah Data </i></h3><br><br>
				<div class="row">
                
                <form class="form-horizontal" action="tambah_mahasiswa_selesai.php" method="post" enctype="multipart/form-data">
							<fieldset>
								<!-- Name input-->
								<div class="form-group" style = "margin : 0 !important">
									<label class="col-md-3 control-label" for="id_dosen"> ID </label>
									<div class="col-md-9">
									<input id="id_dosen" name="id_dosen" type="text" placeholder="Masukan ID " class="form-control" required>
									</div>
								</div>
								
								<div class="form-group" style = "margin : 0 !important">
									<label class="col-md-3 control-label" for="Persentase">RFID</label>
									<div class="col-md-9">
									<input id="rfid" name="rfid" type="text" placeholder="Rfid" class="form-control" required>
									</div>
								</div>
								
								<div class="form-group" style = "margin : 0 !important">
									<label class="col-md-3 control-label" for="id_dosen">NIK</label>
									<div class="col-md-9">
									<input id="nik" name="nik" type="text" placeholder="NIK" class="form-control" required>
									</div>
								</div>
								
                <div class="form-group" style = "margin : 0 !important">
                  <label class="col-md-3 control-label" for="images">FOTO</label>
                  <div class="col-md-9">
                  <input id="images" name="images" type="file" class="form-control" required>
                  </div>
                </div>

								<div class="form-group" style = "margin : 0 !important">
								<label class="col-md-3 control-label" for="Luas">NAMA </label>
									<div class="col-md-9">
									<input id="nama" name="nama" type="text" placeholder="Nama " class="form-control" required>
									</div>
								</div>
									
								<div class="form-group" style = "margin : 0 !important">
									<label class="col-md-3 control-label" for="Persentase">JABATAN</label>
									<div class="col-md-9">
									<select type="text" class="form-control" required="required" placeholder="Jabatan" name="jabatan" id="tiga" value="<?php echo isset ($data[2])?$data[2]:'';?>">
								<option value='' selected>--Pilih Jabatan--</option>
								<option value='Kaprodi'>Kaprodi</option>
								<option value='Sekertaris Prodi'>Sekertaris Prodi</option>
								<option value='Kepala Lab NCC'>Kepala Lab NCC</option>
								<option value='Kepala Lab RPL'>Kepala Lab RPL</option>
								<option value='Kepala Lab SI'>Kepala Lab SI</option>
								<option value='Kepala Lab GI'>Kepala Lab GI</option>
								<option value='Dosen Tetap'>Dosen Tetap</option>
                <option value='Dosen Tetap'>Mahasiswa</option>
							</select>
									</div>
								</div>
								
								<div class="form-group" style = "margin : 0 !important">
									<label class="col-md-3 control-label" for="Persentase">JENIS KELAMIN</label>
									<div class="col-md-9">
									<select type="text" class="form-control" required="required" placeholder="Jenis Kelamin" name="jenis_kelamin" id="tiga" value="<?php echo isset ($data[3])?$data[3]:'';?>">
								<option value='' selected>--Pilih Jenis Kelamin--</option>
								<option value='Laki-laki'>Laki - Laki</option>
								<option value='Perempuan'>Perempuan</option>
							</select>
									</div>
								</div>
													
															
							<!-- Form actions -->
								<div class="form-group">
									<div class="col-md-12 widget-right">
										<p align="center"><br>
							             <button  class="btn btn-primary btn-md" id="btn-todo">Save </button>&nbsp;&nbsp;
							            <a href="list_mahasiswa.php" class="btn btn-primary btn-md" id="btn-todo">Cancel</a></p>
							        </div>
								</div>
										</fieldset>
									</form>

                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->

		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
