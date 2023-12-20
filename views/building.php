<?php 
include_once('../layout/header.php');
$utils = new DbUtils();
$appartments = DbUtils::getApartmentByAdmin($_GET["id"]);
$buildingName = DbUtils::getBuildingName($_GET["id"]);
?>
          <div class="basic-container">
              <h1 style="font-size: 30pt"><b><?php echo $buildingName?></b></h1>
              <h1>Choose an appartment you want to manage</h1>
              <!-- <ul class="cards"> -->
              <div class="d-flex flex-row flex-nowrap overflow-auto">
              <?php if(isset($appartments[0]))foreach($appartments as $appartment){ 
                $sumWater = DbUtils::sumUpWater($appartment->apartmentid);
                $sumEle = DbUtils::sumUpElectricity($appartment->apartmentid);?>
                <li class="cards_item">
                      <div class="card" style="min-width: 300px;">
                          <div class="card_image_container">
                              <div class="card_image"><img src="<?php echo $appartment->photo; ?>"></div>
                          </div>
                              <div class="card_content">
                              <h1 class="card_title"><?php echo $appartment->name?></h1>
                              <div class="row align-items-center">
                                <div class="col">
                                  <h2 class="card_text">Electricity:<b><?php echo $sumEle  . " kWh"; ?></b></h2>
                                </div>
                                <div class="col">
                                  <h2 class="card_text">Water:<b> <?php echo $sumWater  . " Liters"; ?></b></h2>
                                </div>
                              </div>
                              <a href="apartment.php?id=<?php echo $appartment->getId()?>">
                                <button type="submit" name="go-to-building" class="button-submit">View Details</button>
                              </a>
                          </div>
                      </div>
                  </li>
              <?php } 
              else {
                echo "Nothing to Show! Add Appartments";
              }
              ?>
              </div>
            </div>
        </div>
    </div>
</div>
<?php
include('../layout/footer.php');
?>
