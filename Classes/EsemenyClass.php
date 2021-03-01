<?php 
	class Esemeny extends Adatbazis
	{
		public function kiiras()
		{
			$this->sql = "SELECT  
	          blogCim,
	          datum, 
	          iro,
	          szoveg,
	          url
	          FROM
	          esemeny 
	          ORDER BY datum DESC";
	      $this->result = $this->conn->query($this->sql);

	      if ($this->result->num_rows > 0)
	      {
	        while($this->row = $this->result->fetch_assoc()) 
	        {
		        
	    		echo "<h2 style='color: orange;'>".$this->row["blogCim"]."</h2>";
	    		echo "<h5 >".$this->row["datum"]." by: ".$this->row["iro"]."</h5>";
	    		echo "<p>".$this->row["szoveg"]."</p>";
	    		echo "<a href='".$this->row["url"]."' target='_blank'>Ha felkeltette az érdeklődésed kattints a linkre</a>";
	    		echo "<hr>";
	        }
	      } 
	      else 
	      {
	        echo "Nincs Blog az adatbázisban!";
	      }
	    }
	    public function Hozzadas($input_BlogCim, $input_szoveg, $input_url)
	    {
	    	$nev = $_SESSION['felhnev'];
	    	$datum = date("Y-m-d");
	    	if($input_BlogCim == "") {return "<p>Nem adott meg Blog címet".$api."</p>";}
			if($input_szoveg == "") {return "<p>Nem írt szöveget</p>";}
			//if($input_url == "") {return "<p>Nem adott meg linket</p>";}
			$this->sql = "INSERT INTO 
						esemeny
						(
							blogCim ,
							datum ,  
							iro ,
							szoveg ,
							url
						)
						VALUES
						(
						'$input_BlogCim',
						'$datum',
						'$nev',
						'$input_szoveg',
						'$input_url'
						)
					";
			if($this->conn->query($this->sql))
			{
				return "<div class='alert alert-dismissible alert-success'>
						  	<button type='button' class='close' data-dismiss='alert'>&times;</button>
						  	<strong>A blog sikeresen létre lett hozva</strong>
							</div>";
			} 
			else 
			{
				return "<p>Sikertelen blog felvétel!".var_dump($this->sql)."</p>";
			}
	    }	
	}
 ?>