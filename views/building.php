<?php 
include_once('../layout/header.php');
$utils = new DbUtils();
$appartments = DbUtils::getApartmentByAdmin($_GET["id"]);
$buildingName = DbUtils::getBuildingName($_GET["id"]);
$sumWater = DbUtils::sumUpWaterBuilding($_GET["id"]);
$sumEle = DbUtils::sumUpElectricityBuilding($_GET["id"]);
?>
          <div class="basic-container">
              <h1 style="font-size: 30pt"><b><?php echo $buildingName?></b></h1>
              <?php include('../components/resourcesCards.php'); ?>
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
                              <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-6">
                                        <div class="card mb-4">
                                            <div class="card-body d-flex flex-column align-items-start">
                                                <h2 class="card-text small text-warning mb-0">Electricity<img src="../assets/resources/electricity.png" class="mr-2" style="max-width: 12px;">:</h2>
                                                <div class="d-flex align-items-center">
                                                    <img src="" class="mr-2" style="max-width: 20px;">
                                                    <span><?php echo ($sumEle > 0) ? $sumEle:0; ?></span>
                                                    <span >/kWh</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="card mb-4">
                                            <div class="card-body d-flex flex-column align-items-start">
                                                <h2 class="card-text small text-primary mb-0">Water<img src="../assets/resources/water.png" class="mr-2" style="max-width: 15px;">: </h2>
                                                <div class="d-flex align-items-center">
                                                    <span><?php echo ($sumWater > 0) ? $sumWater:0; ?></span>
                                                    <span >/Liters</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
