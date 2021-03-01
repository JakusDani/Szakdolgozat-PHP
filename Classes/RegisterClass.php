<?php 
	include_once "AdatbazisClass.php";
	class Regisztracio extends Adatbazis
	{
		public function Insert($input_REG_username,
							$input_REG_password,
							$input_REG_Cpassword,
							$input_REG_email,
							$input_REG_date)
		{

			// --- KÉP FELTÖLTÉS --

				//ini_set("display_errors", 0);
				$target_dir = "profilkepek/";
				$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				// Check if image file is a actual image or fake image
				if(isset($_POST["submit"])) 
				{
				    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				    if($check !== false) 
				    {
				        echo "<div class='alert alert-dismissible alert-success'>
						  <button type='button' class='close' data-dismiss='alert'>&times;</button>
						  <strong>A feltöltött fájl nem kép - " . $check["mime"] . ".</strong>
						</div>";
				        $uploadOk = 1;
				    } 
				    else 
				    {
				        echo "<div class='alert alert-dismissible alert-danger'>
						  	<button type='button' class='close' data-dismiss='alert'>&times;</button>
						  	<strong>A fájl nem kép.<br></strong>
							</div>";
				        $uploadOk = 0;
				    }
				}
				// Check if file already exists
				if (file_exists($target_file)) 
				{
				    echo "<div class='alert alert-dismissible alert-danger'>
						  	<button type='button' class='close' data-dismiss='alert'>&times;</button>
						  	<strong>Ezen a néven már fel van töltve egy kép.<br></strong>
							</div>";
				    $uploadOk = 0;
				}
				// Check file size
				if ($_FILES["fileToUpload"]["size"] > 500000) 
				{
				    echo "<div class='alert alert-dismissible alert-danger'>
						  	<button type='button' class='close' data-dismiss='alert'>&times;</button>
						  	<strong>Túl nagy a fájl mérete.<br></strong>
							</div>";
				   		$uploadOk = 0;
				}
				// Allow certain file formats
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" ) 
				{
				    echo "<div class='alert alert-dismissible alert-danger'>
						  	<button type='button' class='close' data-dismiss='alert'>&times;</button>
						  	<strong>JPG, JPEG, PNG & GIF Csak ezek a fájl formátumok az elfogadottak.<br></strong>
							</div>";
				    $uploadOk = 0;
				}
				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) 
				{
				    echo "<div class='alert alert-dismissible alert-danger'>
						  	<button type='button' class='close' data-dismiss='alert'>&times;</button>
						  	<strong>Sikertelen kép feltöltés.<br></strong>
							</div>";
				// if everything is ok, try to upload file
				} 
				else 
				{
				    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
				    {
				        echo"<div class='alert alert-dismissible alert-success'>
						  	<button type='button' class='close' data-dismiss='alert'>&times;</button>
						  	<strong>A fájl ". basename( $_FILES["fileToUpload"]["name"]). " sikeresen feltöltve.<br></strong>
							</div>";
				    } 
				    else 
				    {
				        echo "<div class='alert alert-dismissible alert-danger'>
						  	<button type='button' class='close' data-dismiss='alert'>&times;</button>
						  	<strong>Valami hiba történt feltöltés közben próbálja újra.<br></strong>
							</div>";
				    }
				}
				//echo basename( $_FILES["fileToUpload"]["name"]);
				$profkep = basename( $_FILES["fileToUpload"]["name"]);
				//$_SESSION['profkep'] = basename( $_FILES["fileToUpload"]["name"]);

			// --- KÉP FELTÖLTÉS VÉGE --

			if($input_REG_username == "") {return "<p>Hibás felhasználó név</p>";}
			if($input_REG_password == "") {return "<p>Hibás jelszó</p>";}
			if($input_REG_email == "") {return "<p>Hibás email cím</p>";}
			if($input_REG_date == "") {return "<p>Nincs kitöltve a születési dátum</p>";}
			if($input_REG_password != $input_REG_Cpassword ) {return "<p>Nem egyezik a két jelszó</p>";}
			//$hash = password_hash($input_REG_password, PASSWORD_BCRYPT);
			$this->sql = "INSERT INTO 
						felhasznalo  
						(
							nev ,    
							jelszo ,  
							email ,  
							szul_datum ,
							profil_kep ,
							jog_id
						)
						VALUES
						(
						'$input_REG_username',
						'$input_REG_password',
						'$input_REG_email',
						'$input_REG_date',
						'$profkep',
						2
						)
					";
			if($this->conn->query($this->sql))
			{
				return "<p>Sikeres Regisztráció!</p>";
			} 
			else 
			{
				return "<p>Sikertelen Regisztráció!</p>";
			}
		}
	}
 ?>