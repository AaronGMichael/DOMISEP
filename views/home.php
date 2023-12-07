<?php 
include_once('../layout/header.php');
include_once("../components/proveAdmin.php");
$utils = new DbUtils();
$buildings = DbUtils::getBuilding();
// $_SESSION["add"] = $buildings;
?>
          <div class="basic-container">
              <h1  style="font-size: 30pt"><b>All of the Buildings</b></h1>
              <h1>Choose a building of your interest</h1>
              <!-- <ul class="cards"> -->
              <div class="d-flex flex-row flex-nowrap overflow-auto">
              <?php foreach($buildings as $building){ ?>
                <li class="cards_item">
                      <div class="card" style="min-width: 300px;">
                          <div class="card_image_container">
                              <div class="card_image"><img src="https://previews.123rf.com/images/frugo/frugo1808/frugo180801907/106471498-paris-france-august-30-black-white-architecture-photo-of-paris-buildings-on-august-30-2015-in-paris.jpg"></div>
                          </div>
                              <div class="card_content">
                              <h1 class="card_title"><?php echo $building->name?></h1>
                              <div class="row align-items-center">
                              <h1 class="card_title"><?php echo $building->getAddress()?></h1>
                              <div class="col">
                                  <h2 class="card_text">Electricity:</h2>
                                </div>
                                <div class="col">
                                  <h2 class="card_text">Water:</h2>
                                </div>
                              </div>
                              <a href="building.php?id=<?php echo $building->buildingid?>">
                                <button type="submit" name="go-to-building" class="button-submit">View Details</button>
                              </a>
                          </div>
                      </div>
                  </li>
                <?php }?>
              </div>
            </div>
        </div>
    </div>
</div>
<?php
include('../layout/footer.php');
?>
