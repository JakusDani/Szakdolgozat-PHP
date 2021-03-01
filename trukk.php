


<div class="row">
  <div class="col-2" style="background-color: grey;">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <br>
        <h2>Szlalom korcsolya</h2>
        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Kezdő</a>
        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Amatőr</a>
        <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Középhaladó</a>
        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Profi</a>
        <h2>Agresszív korcsolya</h2>
    </div>
  </div>
  <div class="col-10">
    <br>
    <div class="tab-content" id="v-pills-tabContent">
    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
        <!-- 1 -->
        <div class="container-fluid">
          <div class="row">
            <?php
                include "Classes\TrukkKiirasokClass.php";
                $api = new Trukkok();
                $api -> kezdo();
             ?>

          </div>
        </div>

        <!-- grid vége -->
          </div>
          <!-- kezdő trükkök vége -->
          <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
            <div class="container-fluid">
          <div class="row">
            <?php
                $api = new Trukkok();
                $api -> amator();
             ?>

          </div>
        </div>
          </div>
    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
        <div class="container-fluid">
          <div class="row">
            <?php
                $api = new Trukkok();
                $api -> kozephalado();
             ?>

          </div>
        </div>
    </div>
    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
        <div class="container-fluid">
          <div class="row">
            <?php
                $api = new Trukkok();
                $api -> profi();
             ?>

          </div>
        </div>
    </div>
        </div>
    
    
    </div>
    
</div>
