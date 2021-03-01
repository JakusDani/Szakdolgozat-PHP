
<?php 
	
	class forms
	{
		public function login_form()
		{

			?>
				<!DOCTYPE html>
				<html lang="hu">
				<style>
					.logo {
				    width: 50px;
				    height: 50px;
				    margin-right: 100px;
				  }
				</style>
					<head>
						<meta charset="utf-8">
						<meta name="viewport" content="width=device-width, initial-scale=1">
						<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
						<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
						<link rel="stylesheet" href="css/navbar.css">
						<link rel="stylesheet" href="css/LoginStilus.css">
						<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
						<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
						<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
					</head>
					<body>
						<!-- NAV BAR ELEJE -->
						<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
							<img class="logo" src="hatterVidi/line-roller-skates.png" alt="logo">
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
							</button>

							 <div class="collapse navbar-collapse" id="navbarColor01">
							    <ul class="navbar-nav mr-auto">
							      <li class="nav-item">
							        <a class="nav-link"></a>
							      </li>
							    </ul>
							<form class="form-inline my-2 my-lg-0">
								<button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#ModalRegisztracio"><span class="glyphicon glyphicon-user"></span>Regisztráció</button>
							    <button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#ModalBejelentkezés"><span class="glyphicon glyphicon-log-in"></span> Belépés</button>	
							</form>
						</nav>			      
						<!-- NAV BAR VÉGE -->
						<!-- MODAL REGISZTRÁCIÓ -->
						<div class="modal" id="ModalRegisztracio">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title">Regisztráció</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
						        <form method="POST" enctype="multipart/form-data">
									Adjon meg egy felhasználó nevet:<input type="text" class="form-control" name="input_REG_username"><br />
									Adjon meg egy jelszót:<input type="password" class="form-control" name="input_REG_password"><br />
									Adja meg újra a jelszavát:<input type="password" class="form-control" name="input_REG_Cpassword"><br />
									Adja meg email címét:<input type="email" class="form-control" name="input_REG_email"><br />
									Adja meg a születési dátumát:<input type="date" class="form-control" name="input_REG_date"><br />
									Töltsön fel egy profil képet:<br><input type="file" name="fileToUpload" class="form-control-file" id="fileToUpload"><br>
									<input type="hidden" name="action" value="cmd_regisztralas">
									<input type="submit" class="btn btn-warning ajax-nav" value="Regisztrálás">
								</form>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						      </div>
						    </div>
						  </div>
						</div>
						<!-- MODAL REGISZTRÁCIÓ VÉGE -->
						<!-- MODAL Bejelentkezés eleje -->
						<div class="modal" id="ModalBejelentkezés">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title">Bejelentkezés</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
						        <form method="POST">
									Adja meg a felhasználó nevét:<input type="text" class="form-control" name="input_username"><br />
									Adja meg jelszavát:<input type="password" class="form-control" name="input_password"><br />
									<input type="hidden" name="action" value="cmd_login" >
									<button type="submit" class="btn btn-warning ajax-nav" href="?link=kezdolap"  value="Login">Bejelentkezés</button>
								</form>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						      </div>
						    </div>
						  </div>
						</div>
						<!-- MODAL Bejelentkezés vége -->
						<!-- The video -->
						<video autoplay muted loop id="myVideo">
							<source src="hatterVidi\vagott.mp4" type="video/mp4">
						</video>
						<!-- Optional: some overlay text to describe the video -->
						<div class="content">
							<h1 id="szin">üdvözöllek az oldalamon</h1>
							<p>A további tartalmakért kérlek regisztrálj vagy jelentkezz be</p>
							<!--<a id="myBtn">Pause</a> -->
							<a id="myBtn" href="?link=vendeg" name="vendeg">Vendég</a>
						</div>
						
					</body>
				</html>


			<?php
		}
		public function logout_form()
		{
			    $page_title = "Kezdőlap";

			    $as_json = false;
			    if (isset($_GET["view_as"]) && $_GET["view_as"] == "json")
			    {
			        $as_json = true;
			        ob_start();
			    } 
			    else 
			    {
			?>
				<!doctype html>
				<html>
				<head>
				<?php
				        include "Classes/header.php";
				        echo "<title>" . $page_title . "</title>";
				?>
				</head>
				<body>
					<?php	include "Classes/Navbar.php"; ?>

					<div id="ajax-content">
						<?php } ?>

						    <?php
						    	/*teszt
						    	echo $_SESSION["felhnev"];
						    	echo "<br>";
						    	echo $_SESSION["jelszo"];*/
						    	//echo $_SESSION["jog"];
						    	
						    	//echo $_SESSION['profkep'];
						    	$_SESSION['profkep'] = "blank-profile-picture-973460_640";
						    	//echo date("Y-m-d");
						    	ini_set("display_errors", 0);

						    	$link=$_GET['link'];
						        if ($link == 'kezdolap')
						        {
						             include 'fo_oldal.php';
						        }
						        else if ($link == 'utvonalak')
						        {
						            include 'utvonalak.php';
						            $api = new utvonal();
						            $api -> utKiiras();
						        }
						        else if ($link == 'terkep')
						        {
						            include 'terkep.php';
						        }
						        else if ($link == 'trukk')
						        {
						            include 'trukk.php';
						        }
						        else if ($link == 'esemenyek')
						        {
						            include 'esemenyek.php';
						        }
						        else if ($link == 'admin')
						        {
						            include 'admin.php';
						        }
						        else
						        {
						            include 'fo_oldal.php';
						        }
						    ?>

						<?php
						    if ($as_json) 
						    {
						        echo json_encode(array("page" => $page_title, "content" => ob_get_clean()));
						    } 
						    else 
						    {
						?>
					</div>
				<?php
		        include "Classes/Footer.php";
		        echo "</body>\n</html>";
		    }
		}
	}
?>