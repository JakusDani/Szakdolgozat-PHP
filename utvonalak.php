<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

.flip-card {
  background-color: transparent;
  width: 400px;
  height: 650px;
  perspective: 1000px;
}

.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.6s;
  transform-style: preserve-3d;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}

.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}

.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}

.flip-card-front {
  background-color: #bbb;
  color: black;
}

.flip-card-back {
  background-color: #b36b00;
  color: white;
  transform: rotateY(180deg);
}
</style>
<br>
<?php 
  class utvonal extends Adatbazis
  {
    public function utKiiras()
    {
      $this->sql = "SELECT  
          utvonal_nev ,
          utvonal_leiras , 
          utvonal_ido ,
          utvonal_hossz,
          utvonal_ter,
          utvonal_kep
          FROM
          utvonalak
          ";
      $this->result = $this->conn->query($this->sql);

      if ($this->result->num_rows > 0)
      {
        // grid eleje
          echo "<div class='container-fluid'>";
            echo "<div class='row'>";
              
        while($this->row = $this->result->fetch_assoc()) 
        {
          // kártya eleje
              echo "<div class='col-md'>";
                echo "<div class='flip-card card text-white bg-warning mb-3' style='max-width: 50rem;'>";
                  echo "<div class='card-header'><h3>" . $this->row["utvonal_nev"]. "</h3></div>";
                  echo "<div class='flip-card-inner'>";
                    echo "<div class='flip-card-front'>";
                      echo "<img src='kepek/" . $this->row["utvonal_kep"]. "' alt='Útvonal kép' style='width:400px;height:585px;'>";
                    echo "</div>";
                    echo "<div class='flip-card-back'>";
                      echo "<h4>Leírás</h4>";
                      echo "<hr>";
                      echo "<p>" . $this->row["utvonal_leiras"]. "</p>";
                      echo "<hr>";
                      echo "<h4>Érintett Nagyobb terek</h4>";
                      echo "<p>" . $this->row["utvonal_ter"]. "</p>";
                      echo "<hr>";
                      echo "<h4>Teljes Táv " . $this->row["utvonal_hossz"]. "Km <br> Körülbelül " . $this->row["utvonal_ido"]. " alatt teljesíthető</h4>";    
                    echo "</div>";
                  echo "</div>";
                echo "</div>";
              echo "</div>";
              // kártya vége
        }
        
            echo "</div>";
          echo "</div>";
          // grid vége
      } 
      else 
      {
        echo "Nincs Útvonal az adatbázisban!";
      }
    }
  }
 ?>




