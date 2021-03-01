<?php 
	//include "AdatbazisClass.php";
	class Trukkok extends Adatbazis
	{
		public function kezdo()
	    {
	      $this->sql = "SELECT  
	          tipus ,
	          kategoria , 
	          trukk_nev ,
	          video
	          FROM
	          trukk 
	          WHERE
	          tipus = 'szlalom' and
	          kategoria = 'kezdo'";
	      $this->result = $this->conn->query($this->sql);

	      if ($this->result->num_rows > 0)
	      {
	        while($this->row = $this->result->fetch_assoc()) 
	        {
		        echo"<div class='col-sm'>";
	              echo"<div class='card text-white bg-primary mb-3' style='max-width: 28rem;'>";
		              echo"<div class='card-header'>".$this->row["trukk_nev"]."</div>";
		              echo"<div class='card-body'>";
		                echo"<p class='card-text'>";
		                    echo"<video width='400' controls>";
							echo"<source src='trükkvideok/".$this->row["video"]."' type='video/mp4'>";
							echo"</video>";
		                echo"</p>";
		              echo"</div>";
	              echo"</div>";
	            echo"</div>";
	        }
	      } 
	      else 
	      {
	        echo "Nincs Trükk az adatbázisban!";
	      }
	    }
	    public function amator()
	    {
	      $this->sql = "SELECT  
	          tipus ,
	          kategoria , 
	          trukk_nev ,
	          video
	          FROM
	          trukk 
	          WHERE
	          tipus = 'szlalom' and
	          kategoria = 'amator'";
	      $this->result = $this->conn->query($this->sql);

	      if ($this->result->num_rows > 0)
	      {
	        while($this->row = $this->result->fetch_assoc()) 
	        {
		        echo"<div class='col-sm'>";
	              echo"<div class='card text-white bg-primary mb-3' style='max-width: 28rem;'>";
		              echo"<div class='card-header'>".$this->row["trukk_nev"]."</div>";
		              echo"<div class='card-body'>";
		                echo"<p class='card-text'>";
		                    echo"<video width='400' controls>";
							echo"<source src='trükkvideok/".$this->row["video"]."' type='video/mp4'>";
							echo"</video>";
		                echo"</p>";
		              echo"</div>";
	              echo"</div>";
	            echo"</div>";
	        }
	      } 
	      else 
	      {
	        echo "Nincs Trükk az adatbázisban!";
	      }
	    }
	    public function kozephalado()
	    {
	      $this->sql = "SELECT  
	          tipus ,
	          kategoria , 
	          trukk_nev ,
	          video
	          FROM
	          trukk 
	          WHERE
	          tipus = 'szlalom' and
	          kategoria = 'kozephalado'";
	      $this->result = $this->conn->query($this->sql);

	      if ($this->result->num_rows > 0)
	      {
	        while($this->row = $this->result->fetch_assoc()) 
	        {
		        echo"<div class='col-sm'>";
	              echo"<div class='card text-white bg-primary mb-3' style='max-width: 28rem;'>";
		              echo"<div class='card-header'>".$this->row["trukk_nev"]."</div>";
		              echo"<div class='card-body'>";
		                echo"<p class='card-text'>";
		                    echo"<video width='400' controls>";
							echo"<source src='trükkvideok/".$this->row["video"]."' type='video/mp4'>";
							echo"</video>";
		                echo"</p>";
		              echo"</div>";
	              echo"</div>";
	            echo"</div>";
	        }
	      } 
	      else 
	      {
	        echo "Nincs Trükk az adatbázisban!";
	      }
	    }
	    public function profi()
	    {
	      $this->sql = "SELECT  
	          tipus ,
	          kategoria , 
	          trukk_nev ,
	          video
	          FROM
	          trukk 
	          WHERE
	          tipus = 'szlalom' and
	          kategoria = 'profi'";
	      $this->result = $this->conn->query($this->sql);

	      if ($this->result->num_rows > 0)
	      {
	        while($this->row = $this->result->fetch_assoc()) 
	        {
		        echo"<div class='col-sm'>";
	              echo"<div class='card text-white bg-primary mb-3' style='max-width: 28rem;'>";
		              echo"<div class='card-header'>".$this->row["trukk_nev"]."</div>";
		              echo"<div class='card-body'>";
		                echo"<p class='card-text'>";
		                    echo"<video width='400' controls>";
							echo"<source src='trükkvideok/".$this->row["video"]."' type='video/mp4'>";
							echo"</video>";
		                echo"</p>";
		              echo"</div>";
	              echo"</div>";
	            echo"</div>";
	        }
	      } 
	      else 
	      {
	        echo "Nincs Trükk az adatbázisban!";
	      }
	    }
	}
	
 ?>