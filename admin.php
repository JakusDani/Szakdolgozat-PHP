<link rel="stylesheet" type="text/css" href="css/admin.css">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2" id="menu">
            <!--Menu sáv rész -->
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <br>
                <h2>Menü sáv</h2>
                <a class="nav-link active" id="v-pills-felhasznalo-tab" data-toggle="pill" href="#v-pills-felhasznalo" role="tab" aria-controls="v-pills-felhasznalo" aria-selected="true">Felhasználók</a>
                <a class="nav-link" id="v-pills-utvonal-tab" data-toggle="pill" href="#v-pills-utvonal" role="tab" aria-controls="v-pills-utvonal" aria-selected="false">Útvonal</a>
                <a class="nav-link" id="v-pills-esemeny-tab" data-toggle="pill" href="#v-pills-esemeny" role="tab" aria-controls="v-pills-esemeny" aria-selected="false">Esemény</a>
                <a class="nav-link" id="v-pills-stat-tab" data-toggle="pill" href="#v-pills-stat" role="tab" aria-controls="v-pills-stat" aria-selected="false">Statisztika</a>
            </div>
            <!--Menu sáv rész VÉGE -->
        </div>
        <!--Tartalmi rész -->
        <div class="col-lg-10" style="background-color: black;">
            <br>
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-felhasznalo" role="tabpanel" aria-labelledby="v-pills-felhasznalo-tab">
                    <!--Felhasználó tábla rész -->
                    <!--<p>Ha törölsz egy felhasználót akkor törlődik a hozzá tartozó útvonal is <strong>ezt tartsd figyelembe mielőtt elvégzed a törlést</strong></p> -->
                    <?php 

                        include "Classes/AdminClass.php";
                        //update form
                        if(isset($_POST["action"]) and $_POST["action"]=="cmd_modosit_felh")
                        {
                            $felh_modosit = new admin();
                            echo $felh_modosit->user_updateForm();
                        }
                        //kiiras
                        $felh = new admin();
                        $felh -> felhasznalok();
                        //Törlés
                        if(isset($_POST["action"]) and $_POST["action"]=="cmd_torles_felh")
                        {
                            $felh_delete = new admin();
                            echo $felh_delete->user_delete($_POST["input_id"] );
                        }
                        //update
                        if(isset($_POST["action"]) and $_POST["action"]=="VeglegesUpdate")
                        {
                            $felh_modosit = new admin();
                            echo $felh_modosit->user_veglegesUpdate();
                        }
                     ?>

                    <!--Felhasználó tábla rész VÉGE -->
                </div>
                <div class="tab-pane fade" id="v-pills-utvonal" role="tabpanel" aria-labelledby="v-pills-utvonal-tab">
                            <!--útvonal hozzáadása -->
                            
                              <div class="card text-white bg-dark mb-3" style="max-width: 50rem;">
                                <div class="card-header">Útvonal hozzáadása</div>
                                <div class="card-body">
                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="form-group card-text">
                                            Nevezze el az útvonalat:<input type="text" class="form-control" placeholder="Az Edition legyen ott a végén ;)" name="input_UPD_UtvonalNev"><br />
                                            Ossza meg tapasztalatait az útvonallal kapcsolatban:<textarea type="text" class="form-control" name="input_UPD_UtvonalLeiras" rows="3" placeholder="Maximum 100 karakter"></textarea><br />
                                            Mennyi idő alatt lett teljesítve:<input type="time" class="form-control" name="input_UPD_UtvonalIdo"><br />
                                            Útvonal hossza(Km):<input type="number" class="form-control" name="input_UPD_km"><br />
                                            Érintett terek:<textarea type="text" class="form-control" name="input_UPD_UtvonalTerek" rows="3"></textarea><br />
                                            <!-- Töltsön fel egy képet az útvonalról:<input type="upload" class="form-control" name="input_UPD_UtvonalKep"><br /> -->
                                            Töltsön fel egy képet az útvonalról:<br>
                                            <input type="file" name="fileToUpload" id="fileToUpload">
                                            <!-- <input type="submit" value="Upload Image" name="submit"> -->
                                            <input type="hidden" name="action" value="cmd_UtFeltolt">
                                            <input type="submit" class="btn btn-warning ajax-nav" value="Útvonal Hozzáadása">
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <?php 
                                        if(isset($_POST["action"]) and $_POST["action"]=="cmd_UtFeltolt")
                                        {
                                            $utvonal_update = new admin();
                                            echo $utvonal_update->utvonal_hozaad($_POST["input_UPD_UtvonalNev"],
                                                                        $_POST["input_UPD_UtvonalLeiras"],
                                                                        $_POST["input_UPD_UtvonalIdo"],
                                                                        $_POST["input_UPD_km"],
                                                                        $_POST["input_UPD_UtvonalTerek"]
                                                                        );
                                        }

                                        //útvonal kiiratas -->
                                        
                                        $utvonal_kiiras = new admin();
                                        $utvonal_kiiras -> utvonal_kiiras();
                                        //Törlés
                                        if(isset($_POST["action"]) and $_POST["action"]=="cmd_torles_utvonal")
                                        {
                                            $utvonal_delete = new admin();
                                            echo $utvonal_delete->utvonal_delete($_POST["input_id"] );
                                        }
                                    ?>
                          </div>
  
                    <!--útvonal hozzáadása VÉGE -->
                <div class="tab-pane fade" id="v-pills-esemeny" role="tabpanel" aria-labelledby="v-pills-esemeny-tab">
                    <!--Esemény Kiiras -->
                    <?php 
                        $esemeny = new admin();
                        $esemeny -> esemenyKiiras();
                        //Esemeny Törlés
                        if(isset($_POST["action"]) and $_POST["action"]=="cmd_torles_esemeny")
                        {
                            $esemeny_torles = new admin();
                            echo $esemeny_torles->esemenyDelete($_POST["input_id"] );
                        }
                     ?>
                        
                    </div>

                <div class="tab-pane fade" id="v-pills-stat" role="tabpanel" aria-labelledby="v-pills-stat-tab">
                    <h1>Lorem ipsum dolor sit amet consectetur adipiscing elit tincidunt vivamus, maecenas fermentum lacinia ante litora tortor neque pharetra, in sapien himenaeos integer volutpat proin nam habitant. </h1>
                </div>
            </div>
        </div>
        <!--Tartalmi rész VÉGE -->
    </div>
</div>


    
    