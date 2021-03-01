<style>
  .avatar {
  vertical-align: middle;
  width: 80px;
  height: 80px;
  border-radius: 50%;
  display: block;
  margin-left: auto;
  margin-right: auto;
  }
  .logo{
    width: 50px;
    height: 50px;
    margin-right: 100px;
  }
  a {
    margin-right: 2px;
  }
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
	<img class="logo" src="hatterVidi/line-roller-skates.png" alt="logo">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
	   	<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarColor01">
    	<ul class="navbar-nav mr-auto">
      		<li class="nav-item active">
        		<a class=" btn btn-warning ajax-nav" href="?link=kezdolap" name="Kezdolap">Kezdőlap</a>
      		</li>
      		<li class="nav-item">
        		<a class="btn btn-warning ajax-nav" href="?link=utvonalak" name="Utvonalak">Útvonalak</a>
      		</li>
          <li class="nav-item">
            <a class="btn btn-warning ajax-nav" href="?link=terkep" name="Terkep">Térkép</a>
          </li>
      		<li class="nav-item">
	       		<a class="btn btn-warning ajax-nav" href="?link=trukk" name="Trukk">Trükkök</a>
     		</li>
        <li class="nav-item">
            <a class="btn btn-warning ajax-nav" href="?link=esemenyek" name="Esemenyek">Események</a>
        </li>
        <?php 
          if ($_SESSION['jog']  == 'login_admin')
          {
            echo"<li class='nav-item'>";
              echo "<a class='btn btn-warning ajax-nav' href='?link=admin' name='Admin'>Admin</a>";
            echo "</li>";
          }
          else
            {
              echo"<li class='nav-item'>";
              echo "<a class='btn btn-warning ajax-nav' style='display: none;' href='?link=admin' name='Admin'>Admin</a>";
            echo "</li>";
            }
         ?>
    	</ul>
    	<div style="margin-right: 120px;" class="btn-group">
        	<a class="nav-link dropdown-toggle btn btn-warning" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION["felhnev"]; ?></a>
        	<div class="dropdown-menu" aria-labelledby="navbarDropdown">
	        	<?php echo "<img src='profilkepek/".$_SESSION['profkep']."' alt='Avatar' class='avatar'>"; ?>
            <br>
	        	<a class="dropdown-item" href="#">Bejelentkezve: <?php echo $_SESSION["felhnev"]; ?></a>
	        	<a class="dropdown-item" href="#">profilom módosítása</a>
        		<div class="dropdown-divider"></div>
		        <form method="POST">
					<input type="hidden" name="action" value="cmd_logout">
					<li><button type="submit" class="btn btn-link" value="Logout">Kijelentkezés</button></li>
				</form>
	        </div>
    	</div>
	</div>
</nav>