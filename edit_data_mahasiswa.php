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
            <a href="index.html" class="logo"><b>WEB KEHADIRAN DOSEN PROGRAM STUDI TEKNIK INFORMATIKA</b></a>
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
                      <a href="javascript:;" >
                          <i class="fa fa-th"></i>
                          <span>Dosen</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="list_mahasiswa.php">List Dosen</a></li>
                          <li><a  href="tambah_data_mahasiswa.php">Tambah Data Dosen</a></li>
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
          	<h3><i class="fa fa-angle-right"></i> List Data Dosen</i></h3>
				<div class="row">
                
                
					</svg><center><h4>Edit Data Dosen</h4></center></div>
					<div class="panel-body">

<?php
error_reporting(0);
session_start();
		if($link=mysql_connect("localhost", "root", ""))
		mysql_select_db("db_magnetic");
  // Periksa sesi login
  if (!isset ($_SESSION["logged-in"])
  || $_SESSION["logged-in"]!==true)
$id_dosen = $_GET['id_dosen'];
$mysql =mysql_query("select * from mahasiswa where id_dosen='$id_dosen'"); 
while ($hasil = mysql_fetch_array($mysql)){
?>

						<form class="form-horizontal" action="edit_mahasiswa_selesai.php?id_dosen=<?php echo $hasil['id_dosen']; ?>" method="post">
							<fieldset>
								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="id_dosen">ID DOSEN</label>
									<div class="col-md-9">
									<input id="id_dosen" disabled name="id_dosen" type="text" placeholder=""  value="<?php echo $hasil['id_dosen']; ?>" class="form-control" required>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-3 control-label" for="rfid">RFID</label>
									<div class="col-md-9">
										<input id="rfid" name="rfid" type="text" placeholder="" value="<?php echo $hasil['rfid']; ?>" class="form-control" required>
									</div>
								</div>
							
								<!-- Message body -->
								<div class="form-group">
									<label class="col-md-3 control-label" for="nik">NIK</label>
									<div class="col-md-9">
										<input id="nik" name="nik" type="text" placeholder="" value="<?php echo $hasil['nik']; ?>" class="form-control" required>
									</div>
								</div>

                <!-- Message body -->
                <div class="form-group">
                  <label class="col-md-3 control-label" for="images">FOTO</label>
                  <div class="col-md-9">
                    <input id="images" name="images" type="file" placeholder="" value="<?php echo $hasil['images']; ?>" class="form-control" required>
                  </div>
                </div>

								<!-- Message body -->
								<div class="form-group">
									<label class="col-md-3 control-label" for="nama">NAMA DOSEN</label>
									<div class="col-md-9">
										<input id="nama" name="nama" type="text" placeholder="" value="<?php echo $hasil['nama']; ?>" class="form-control" required>
									</div>
								</div>
                                
                                <!-- Message body -->
								<div class="form-group">
									<label class="col-md-3 control-label" for="jabatan">JABATAN</label>
									<div class="col-md-9">
										<input id="jabatan" name="jabatan" type="text" placeholder="" value="<?php echo $hasil['jabatan']; ?>" class="form-control" required>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-3 control-label" for="jenis_kelamin">JENIS KELAMIN</label>
									<div class="col-md-9">
										<input id="jenis_kelamin" name="jenis_kelamin" type="text" placeholder="" value="<?php echo $hasil['jenis_kelamin']; ?>" class="form-control" required>
									</div>
								</div>
																			
																

								<!-- Form actions -->
								<div class="form-group">
									<div class="col-md-12 widget-right">
										<p align="center"><button type="submit" class="btn btn-primary btn-md" id="btn-todo">Save </button>&nbsp;&nbsp;
			                    <a href="list_mahasiswa.php" class="btn btn-primary btn-md" id="btn-todo">Cancel
			                    </a></a></p>
                                        		</div>
								</div>
							</fieldset>
						</form>
						<?php } ?>
                        
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