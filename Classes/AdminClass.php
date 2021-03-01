<?php 
	class admin extends Adatbazis
	{
		public function felhasznalok()
		{
			$this->sql = "SELECT  
					felhasz_id ,
					nev , 
					jelszo ,
					email ,
					szul_datum ,
					profil_kep ,
					jog_id
					FROM
					felhasznalo ";
			$this->result = $this->conn->query($this->sql);

			if ($this->result->num_rows > 0)
			{
				echo "<div class='container-fluid'>";
				echo "<table class='table table-dark table-hover table-bordered'>";
				echo "<tr>";
					echo "<th>ID</th>";
					echo "<th>Név</th>";
					echo "<th>Jelszó</th>";
					echo "<th>E-mail</th>";
					echo "<th>Születési Dátum</th>";
					echo "<th>Profil Kép</th>";
					echo "<th>Jogosultsag ID</th>";
					echo "<th>Törlés</th>";
					echo "<th>Módosítás</th>";
				echo "</tr>";
				while($this->row = $this->result->fetch_assoc()) 
				{
					echo "<tr>";
						echo "<td>" . $this->row["felhasz_id"]. "</td>";
						echo "<td>" . $this->row["nev"]. "</td>";
						echo "<td>" . $this->row["jelszo"]. "</td>";
						echo "<td>" . $this->row["email"]. "</td>";
						echo "<td>" . $this->row["szul_datum"]. "</td>";
						echo "<td>" . $this->row["profil_kep"]. "</td>";
						echo "<td>" . $this->row["jog_id"]. "</td>";
						echo "<form method='POST'>
								<td><input type='hidden' name='action' value='cmd_torles_felh'>
								<input type='hidden' name='input_id' value='".$this->row["felhasz_id"]."'>
								<input type='submit' class='btn btn-danger' value='Törlés'></td>
						 	</form>";
						 	//input_id = sorszam !!!!
						echo "<form method='POST'>
								<td><input type='hidden' name='action' value='cmd_modosit_felh'>
								<input type='hidden' name='input_id' value='".$this->row["felhasz_id"]."'> 
								<input type='submit' class='btn btn-info' data-toggle='modal' data-target='#myModal' value='Módosítás'></td>
						 	</form>";
					echo "</tr>";
				}
				echo "</table>";
				echo "</div>";
			} 
			else 
			{
				echo "Nincs felhasználó az adatbázisban!";
			}
	    }
	    public function user_delete($id)
	    {
			if($id == "") 
			{ 
				return  "<div class='alert alert-dismissible alert-danger'>
						<button type='button' class='close' data-dismiss='alert'>&times;</button>
						<strong>Sikertelen Törlés!!!</strong>
						</div>"; 
			}

			$this->sql = "DELETE FROM felhasznalo
						  WHERE felhasz_id	= $id";
			if($this->conn->query($this->sql))
			{
				return "<div class='alert alert-dismissible alert-success'>
						  <button type='button' class='close' data-dismiss='alert'>&times;</button>
						  <strong>Sikeres Törlés!!!</strong>
						</div>";
			} 
			else 
			{
				return "<div class='alert alert-dismissible alert-danger'>
						  <button type='button' class='close' data-dismiss='alert'>&times;</button>
						  <strong>Sikertelen Törlés!!! ".$this->conn->error."</strong>
						</div>";
			}		
		}
		//update form
		public function user_updateForm() //ezt majd később megcsinálom :D
	    {
			$this->sql = "SELECT
							nev , 
							jelszo ,
							email ,
							szul_datum ,
							profil_kep
							FROM
							felhasznalo 
							WHERE felhasz_id = ".$_POST["input_id"]." ";
			$this->result = $this->conn->query($this->sql);

			if ($this->result->num_rows > 0)
			{
				while($this->row = $this->result->fetch_assoc()) 
				{
					ini_set("display_errors", 0);
					//modal START
					echo "<div class='card text-white bg-dark mb-3' style='max-width: 40rem;'>";
					  echo "<div class='card-header'><h2>Módosítás</h2></div>";
					  echo "<div class='card-body'>";
					    echo "<form method='POST'>";
							echo "Addj meg egy nevet:<br />";
							echo "<input type='text' class='form-control' name='input_nev' value='".$this->row["nev"]."'><br />";
							echo "Addjon meg egy jelszavat:<br />";
							echo "<input type='password' name='input_jelszo' class='form-control' value='".$this->row["jelszo"]."'><br />";
							echo "Addjon meg egy email címet<br />";
							echo "<input type='email' name='input_email' class='form-control' value='".$this->row["email"]."'><br />";
							echo "Addja meg a születési évét:<br />";
							echo "<input type='date' name='input_szul_datum' class='form-control' value='".$this->row["szul_datum"]."'><br />";
							echo "Addjon meg egy profil képet:<br />";
							echo "<input type='text' name='input_profil_kep' class='form-control' value='".$this->row["profil_kep"]."'><br />";

							echo "<input type='hidden' name='action' value='VeglegesUpdate'>";
							echo "<input type='hidden' name='input_id' value='".$this->row["felhasz_id"]."'>";
							echo "<input type='submit' class='btn btn-warning' value='Módosítás végrehajtása'>";
						echo "</form>";
					  echo "</div>";
					echo "</div>";

					//modal END
				}
				//var_dump($this->sql);
				$_SESSION['id'] = $_POST['input_id'];
			}
			else 
			{
				echo "Nincs felhasználó az adatbázisban!";
			}
		}
		public function user_veglegesUpdate()
		{
			$teszt = $_SESSION['id'];
			$this->sql = "UPDATE `felhasznalo`
			SET
					nev = '".$_POST["input_nev"]."',
					jelszo = '".$_POST["input_jelszo"]."',
					email = '".$_POST["input_email"]."',
					szul_datum = '".$_POST["input_szul_datum"]."',
					profil_kep = '".$_POST["input_profil_kep"]."'
					
				    WHERE felhasz_id = $teszt";
			//echo $this->sql;
			if(mysqli_query($this->conn, $this->sql))
			{
				echo "Sikeres Módosítás!";
			} 
			else 
			{
				echo "Sikertelen Módosítás";
				//echo $_SESSION['id'];
			}
		}
		//Útvonal hozzáadása
		public function utvonal_hozaad($input_UPD_UtvonalNev, $input_UPD_UtvonalLeiras, $input_UPD_UtvonalIdo, $input_UPD_km, $input_UPD_UtvonalTerek/*, $input_UPD_UtvonalKep*/)
		{
			// --- KÉP FELTÖLTÉS --

				//ini_set("display_errors", 0);
				$target_dir = "kepek/";
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

			// --- KÉP FELTÖLTÉS VÉGE --
			$api = $_SESSION["felhnev"];
			$kep = basename( $_FILES["fileToUpload"]["name"]);

			if($input_UPD_UtvonalNev == "") {return "<p>Hibás utvonal név ".$api."</p>";}
			/*if($input_UPD_UtvonalLeiras == "") {return "<p>Nem írt leírást</p>";}
			if($input_UPD_UtvonalIdo == "") {return "<p>Nem adta meg meddig tartott az Útvonal</p>";}
			if($input_UPD_km == "") {return "<p>Nem adta meg milyen hosszú az Útvonal</p>";}
			if($input_UPD_UtvonalTerek == "") {return "<p>Nem adott meg érintett tereket</p>";}
			if($input_UPD_UtvonalKep == "") {return "<p>nem töltött fel képet</p>";}*/
			$this->sql = "INSERT INTO 
						utvonalak
						(
							utvonal_nev ,
							utvonal_leiras ,  
							utvonal_ido ,
							utvonal_hossz ,
							utvonal_felh ,
							utvonal_ter ,
							utvonal_kep
						)
						VALUES
						(
						'$input_UPD_UtvonalNev',
						'$input_UPD_UtvonalLeiras',
						'$input_UPD_UtvonalIdo',
						'$input_UPD_km',
						'$api' ,
						'$input_UPD_UtvonalTerek' ,
						'$kep'
						)
					";
			if($this->conn->query($this->sql))
			{
				return "<div class='alert alert-dismissible alert-success'>
						  	<button type='button' class='close' data-dismiss='alert'>&times;</button>
						  	<strong>Az útvonal sikeresen hozzá lett adva az adatbázishoz</strong>
							</div>";
			} 
			else 
			{
				return "<p>Sikertelen Útvonal felvétel!".var_dump($this->sql)."</p>";
			}
		}
		//útvonal kiiras
		public function utvonal_kiiras()
		{
			$this->sql = "SELECT  
					*
					FROM
					utvonalak ";
			$this->result = $this->conn->query($this->sql);

			if ($this->result->num_rows > 0)
			{
				echo "<div class='container-fluid'>";
				echo "<table class='table table-dark table-hover table-bordered'>";
				echo "<tr>";
					echo "<th>ID</th>";
					echo "<th>Név</th>";
					echo "<th>Leírás</th>";
					echo "<th>Idő</th>";
					echo "<th>Hossz(Km)</th>";
					echo "<th>Felhasználó</th>";
					echo "<th>Tér</th>";
					echo "<th>Kép</th>";
					echo "<th>Törlés</th>";
				echo "</tr>";
				while($this->row = $this->result->fetch_assoc()) 
				{
					echo "<tr>";
						echo "<td>" . $this->row["utvonal_id"]. "</td>";
						echo "<td>" . $this->row["utvonal_nev"]. "</td>";
						echo "<td>" . $this->row["utvonal_leiras"]. "</td>";
						echo "<td>" . $this->row["utvonal_ido"]. "</td>";
						echo "<td>" . $this->row["utvonal_hossz"]. "</td>";
						echo "<td>" . $this->row["utvonal_felh"]. "</td>";
						echo "<td>" . $this->row["utvonal_ter"]. "</td>";
						echo "<td>" . $this->row["utvonal_kep"]. "</td>";
						echo "<form method='POST'>
								<td><input type='hidden' name='action' value='cmd_torles_utvonal'>
								<input type='hidden' name='input_id' value='".$this->row["utvonal_id"]."'>
								<input type='submit' class='btn btn-danger' value='Törlés'></td>
						 	</form>";
					echo "</tr>";
				}
				echo "</table>";
				echo "</div>";
			} 
			else 
			{
				echo "Nincs Útvonal az adatbázisban!";
			}
		}
		//utvonal törlés
		public function utvonal_delete($id)
	    {
			if($id == "") 
			{ 
				return  "<div class='alert alert-dismissible alert-danger'>
						<button type='button' class='close' data-dismiss='alert'>&times;</button>
						<strong>Sikertelen Törlés!!!</strong>
						</div>"; 
			}

			$this->sql = "DELETE FROM utvonalak
						  WHERE utvonal_id	= $id";
			if($this->conn->query($this->sql))
			{
				return "<div class='alert alert-dismissible alert-success'>
						  <button type='button' class='close' data-dismiss='alert'>&times;</button>
						  <strong>Sikeres Törlés!!!</strong>
						</div>";
			} 
			else 
			{
				return "<div class='alert alert-dismissible alert-danger'>
						  <button type='button' class='close' data-dismiss='alert'>&times;</button>
						  <strong>Sikertelen Törlés!!! ".$this->conn->error."</strong>
						</div>";
			}		
		}
		//Esemény kiiras
		public function esemenyKiiras()
		{
			$this->sql = "SELECT  
					*
					FROM
					esemeny ";
			$this->result = $this->conn->query($this->sql);

			if ($this->result->num_rows > 0)
			{
				echo "<div class='container-fluid'>";
				echo "<table class='table table-dark table-hover table-bordered'>";
				echo "<tr>";
					echo "<th>ID</th>";
					echo "<th>Blog Cím</th>";
					echo "<th>Bejegyzés létrehozásának a dátuma</th>";
					echo "<th>közzétevő neve</th>";
					echo "<th>Tartalom</th>";
					echo "<th>Link</th>";
					echo "<th>Törlés</th>";
				echo "</tr>";
				while($this->row = $this->result->fetch_assoc()) 
				{
					echo "<tr>";
						echo "<td>" . $this->row["id"]. "</td>";
						echo "<td>" . $this->row["blogCim"]. "</td>";
						echo "<td>" . $this->row["datum"]. "</td>";
						echo "<td>" . $this->row["iro"]. "</td>";
						echo "<td>" . $this->row["szoveg"]. "</td>";
						echo "<td>" . $this->row["url"]. "</td>";
						echo "<form method='POST'>
								<td><input type='hidden' name='action' value='cmd_torles_esemeny'>
								<input type='hidden' name='input_id' value='".$this->row["id"]."'>
								<input type='submit' class='btn btn-danger' value='Törlés'></td>
						 	</form>";
					echo "</tr>";
				}
				echo "</table>";
				echo "</div>";
			}
			else
			{
				echo "Nincs Útvonal az adatbázisban!";
			}
		}
		//Esemény törlés
		public function esemenyDelete($id)
		{
			if($id == "") 
			{ 
				return  "<div class='alert alert-dismissible alert-danger'>
						<button type='button' class='close' data-dismiss='alert'>&times;</button>
						<strong>Sikertelen Törlés!!!</strong>
						</div>"; 
			}

			$this->sql = "DELETE FROM esemeny
						  WHERE id	= $id";
			if($this->conn->query($this->sql))
			{
				return "<div class='alert alert-dismissible alert-success'>
						  <button type='button' class='close' data-dismiss='alert'>&times;</button>
						  <strong>Sikeres Törlés!!!  ".var_dump($this->sql)."</strong>
						</div>";
			} 
			else 
			{
				return "<div class='alert alert-dismissible alert-danger'>
						  <button type='button' class='close' data-dismiss='alert'>&times;</button>
						  <strong>Sikertelen Törlés!!! ".$this->conn->error."</strong>
						</div>";
			}
		}		
	}
?>