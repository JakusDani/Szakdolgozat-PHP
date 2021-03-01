<?php 
	include_once "AdatbazisClass.php";
	include_once "formClass.php";
	//include_once "fo_oldal.php";
	class Bejelentkezes extends Adatbazis
	{
		public $jog = "";
		//PRÓBAA
		public function proba()
		{
			$this->sql = "SELECT  
					felhasz_id ,
					nev , 
					jelszo ,
					email ,
					szul_datum
					FROM
					felhasznalo ";
			$this->result = $this->conn->query($this->sql);

			if ($this->result->num_rows > 0)
			{
				echo "<table>";
				echo "<tr>";
					echo "<th>ID</th>";
					echo "<th>Név</th>";
					echo "<th>Jelszó</th>";
					echo "<th>E-mail</th>";
					echo "<th>Születési Dátum</th>";
				echo "</tr>";
				while($this->row = $this->result->fetch_assoc()) 
				{
					echo "<tr>";
						echo "<td>" . $this->row["felhasz_id"]. "</td>";
						echo "<td>" . $this->row["nev"]. "</td>";
						echo "<td>" . $this->row["jelszo"]. "</td>";
						echo "<td>" . $this->row["email"]. "</td>";
						echo "<td>" . $this->row["szul_datum"]. "</td>";
					echo "</tr>";
				}
				echo "</table>";
			} 
			else 
			{
				echo "Nincs felhasználó az adatbázisban!";
			}
		}
		public function check_login($username,$pwd)
		{
			
			/*$hash = password_hash($pwd, PASSWORD_DEFAULT);
			echo $hash;*/
			$this->sql = "SELECT 
							`nev`, 
							`jelszo`,
							`profil_kep`
						  FROM 
							`felhasznalo`
						  WHERE
							nev = '$username' and
							jelszo = '$pwd'
						  ";
			
			$this->result = $this->conn->query($this->sql);
			//$_SESSION['profkep'] = $this->sql['profil_kep'];
			if ($this->result->num_rows == 1) 
			{
				
				return "login_ok";
			}
			else 
			{
				return "login_nemok";
			}
			/*if ($this->result->num_rows > 0)
			{
				$this->data = $this->sql->fetch_array();
		    	if (password_verify($pwd, $data['jelszo']))
		    	{
		    		return "login_ok";
		    	}
		    	else
		    	{
		    		return "login_nemok";
		    	}
			}*/
			
		}


		/*public function profilkep(){
   
    $user_data = mysqli_fetch_assoc(mysqli_query($this->conn, "SELECT * FROM felhasznalo
                Where nev = '$_SESSION["felhnev"]' and jelszo = '$_SESSION["jelszo"]'
                "));
         
              $_SESSION["profilkep"] = $user_data['profilkep'];
             
             
                echo "<p>";    
   
   
}*/

		public function check_Permission($username, $pwd)
		{
			

			$this->sql = "SELECT
							'nev',
							'jelszo', 
							`jog_id`
						  FROM 
							`felhasznalo`
						  WHERE
							nev = '$username' AND
							jelszo = '$pwd' AND
							jog_id = 1
						  ";
			
			$this->result = $this->conn->query($this->sql);
			if ($this->result->num_rows == 1) 
			{
				return "login_admin";
			}
			else 
			{
				return "login_user";
			}	
		}


		

		public function Szessonok()
		{
			session_start();

			//echo "<pre>"; var_dump($_REQUEST); echo "</pre>";

			if(isset($_POST["action"]) and $_POST["action"]=="cmd_logout")
			{
				$_SESSION["login_state"]="login_nemok";
				//header("location: login.php");
			}
			if(isset($_POST["action"]) and $_POST["action"]=="cmd_login")
			{
				if (isset($_POST["input_username"]) and
					!empty($_POST["input_username"]) and
					isset($_POST["input_password"]) and
					!empty($_POST["input_password"])
					)
				{
					//teszt
					$_SESSION['felhnev'] = $_POST["input_username"];
					$_SESSION['jelszo'] = $_POST["input_username"];
					//$_SESSION['jog'] = $jog;

					$check_login = new Bejelentkezes();
					$_SESSION["login_state"] = $check_login->check_login(
													$_POST["input_username"],
													($_POST['input_password'])
												);
					//check permission
					$check_Permission = new Bejelentkezes();
					$_SESSION["jog"] = $check_Permission->check_Permission(
													$_POST["input_username"],
													($_POST['input_password'])
												);
				}
			}


			if(isset($_SESSION["login_state"]))
			{
				if($_SESSION["login_state"]=="login_ok")
				{
					$forms = new forms(); $forms->logout_form();
					//include("fo_oldal.php");
					//header("location: fo_oldal.php");
				} 
				elseif($_SESSION["login_state"]=="login_nemok")
				{
					$forms = new forms(); $forms->login_form();
					//header("location: login.php");
				}
				else 
				{
					$forms = new forms(); $forms->login_form();
					//header("location: login.php");
				}
			}
			if(!isset($_SESSION["login_state"]))
			{
				$forms = new forms(); $forms->login_form();
				//header("location: login.php");
			}
			
		}

	}

 ?>