<link rel="stylesheet" type="text/css" href="css/Esemeny.css">
<style type="text/css">
	
</style>
	<div class="container">
	    <div class="row">
	    	<div class="col-sm-12">


	    		<div class="container">
					<img src="kepek/esemenyek.jpg" alt="Nature" style="width:100%;">
					<div class="text-block">
						<h4 style="color:white;">Minden ami görkorcsolya</h4>
			    		<p>Cikkek, sport események, fesztiválok, csoportok és még sok más :)</p>
					</div>
				</div>

	    		<!--<img src="kepek/esemenyek.jpg" width="100%" height="200px">-->
	    	</div>
	    </div>
	    <br>
	    <!-- nagy kép vége -->
	    <!-- 50% grid eleje -->
	    <div class="row" >
    		<div class="col-sm-6" >
		      	<!-- belföldi esemény -->
		      	<div class="container">
					<div class="card card border-warning mb-3"  style="padding: 0px;">
				    	<div class="card-body" id="margo">
				    		<img src="kepek/Eleterzes.jpg" class="float-right rounded" width="200px" height="250px" id="meret" title="ÉLETÉRZÉS">
				      		<h4 class="card-title" id="blog">Lifestyle Roller Skate</h4>
				      		<p class="card-text" id="blog">Ez csak egy kis szöveg hahaha</p>
				      		<a href="https://www.facebook.com/lifestylerollerskatingbudapest/" target="_blank" class="card-link">további tartalom a linkre kattintva</a>
				    	</div>
					</div>
				</div>
		    </div>
		    <br>
	    	<!-- belföldi esemény VÉGE -->
	    	<div class="col-sm-6">
	    	<!-- külföldi esemény -->
		      	<div class="container">
					<div class="card card border-warning mb-3"  style="padding: 0px;">
				    	<div class="card-body" id="margo">
				    		<img src="kepek/FNSlogo.jpg" class="float-right rounded" width="200px" height="250px" id="meret" title="FNS">
				      		<h4 class="card-title" id="blog">Budapest Friday Night Skating (B-FNS)</h4>
				      		<p class="card-text" id="blog">Ez csak egy kis szöveg hahaha</p>
				      		<a href="https://www.facebook.com/groups/139467469408643/" target="_blank" class="card-link">további tartalom a linkre kattintva</a>
				    	</div>
					</div>
				</div>
		    </div>
	    	<!-- külföldi esemény VÉGE -->
	    </div>
    </div>
    <!-- 50% grid VÉGE -->
    <div class="container">
	    <div class="row" id="blog">
	    	<div class="col-sm-8">
	    		<h1>Legfrisebb koris hírek</h1>
	    		<hr>
	    		<div class="card border-warning mb-3" style="max-width: 50rem;">
					<div class="card-header"><h3 style="color: orange;">Bejegyzés Létrehozása</h3></div>
					<div class="card-body">
						<p class="card-text">
							<form method="POST" enctype="multipart/form-data">
                                    <div class="form-group card-text">
                                    <h5 style="color: black;">Adjon a blognak egy címet:</h5><input type="text" class="form-control"  style="width: 250px;" name="input_BlogCim"><br />
                                    <textarea type="text" class="form-control" name="input_szoveg" placeholder="Mi jár a fejedben?" rows="3"></textarea><br />
                                    <h5 style="color: black;">Adjon meg egy url címet (opcionális):</h5><input type="text" class="form-control" style="width: 340px;" name="input_url"><br />
                                    <input type="hidden" name="action" value="cmd_BlogFeltolt">
                                    <input type="submit" class="btn btn-warning ajax-nav float-right" value="Blog bejegyzés Hozzáadása">
                                </div>
                            </form>
						</p>
					</div>
				</div>
	    		<?php 
	    			include "Classes/EsemenyClass.php";
	    			$blog = new Esemeny();
	    			if(isset($_POST["action"]) and $_POST["action"]=="cmd_BlogFeltolt")
                    {
                        echo $blog->Hozzadas($_POST["input_BlogCim"],
                                                             $_POST["input_szoveg"],
                                                             $_POST["input_url"]
                                                             );
                    }
	    			$blog->kiiras();
	    		 ?>
	    		<!--<h2>Egyéb blog post</h2>
	    		<p>Lorem ipsum dolor sit amet consectetur adipiscing elit tincidunt vivamus, 
	    		maecenas fermentum lacinia ante litora tortor neque pharetra, in sapien himenaeos integer volutpat proin nam habitant.</p>-->
	    	</div>
	    	<!-- archívum -->
	    	<div class="col-sm-4">
	      		<div style="background-color: #0066cc;">
	      			<h1>About</h1>
	      			<p>Etiam porta sem malesuada magna mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
	      		</div>
	      		<br>
	      		<h1>Archívum</h1>
	      		<ul>
	      			<li><button type="button" class="btn btn-link" style="color: orange;">2020-01</button></li>
	      			<li><button type="button" class="btn btn-link" style="color: orange;">2020-02</button></li>
	      			<li><button type="button" class="btn btn-link" style="color: orange;">2020-03</button></li>
	      			<li><button type="button" class="btn btn-link" style="color: orange;">2020-04</button></li>
	      			<li><button type="button" class="btn btn-link" style="color: orange;">2020-05</button></li>
	      			<li><button type="button" class="btn btn-link" style="color: orange;">2020-06</button></li>
	      			<li><button type="button" class="btn btn-link" style="color: orange;">2020-07</button></li>
	      			<li><button type="button" class="btn btn-link" style="color: orange;">2020-08</button></li>
	      			<li><button type="button" class="btn btn-link" style="color: orange;">2020-09</button></li>
	      			<li><button type="button" class="btn btn-link" style="color: orange;">2020-10</button></li>
	      			<li><button type="button" class="btn btn-link" style="color: orange;">2020-11</button></li>
	      			<li><button type="button" class="btn btn-link" style="color: orange;">2020-12</button></li>
	      			
	      		</ul>
	    	</div>
	    </div>



    </div>
    