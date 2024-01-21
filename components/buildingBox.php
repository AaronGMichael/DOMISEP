<?php 
include '../utils/DbUtils.php';
$utils = new DbUtils();

              $buildings = DbUtils::searchBuilding(isset($_POST['term']) ? $_POST['term'] : '');
              foreach($buildings as $building){ 
                $sumWater = DbUtils::sumUpWaterBuilding($building->buildingid);
                $sumEle = DbUtils::sumUpElectricityBuilding($building->buildingid);?>
                <li class="cards_item">
                      <div class="card" style="min-width: 300px;">
                          <div class="card_image_container">
                              <div class="card_image"><img src="<?php echo $building->photo; ?>"></div>
                          </div>
                              <div class="card_content">
                              <h1 class="card_title"><?php echo $building->name?></h1>
                              <div class="row align-items-center">
                              <h1 class="card_title"><?php echo $building->getAddress()?></h1>
                              <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-6">
                                        <div class="card mb-4">
                                            <div class="card-body d-flex flex-column align-items-start">
                                                <h2 class="card-text small text-warning mb-0">Electricity<img src="../assets/resources/electricity.png" class="mr-2" style="max-width: 15px;">:</h2>
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
                                                <h2 class="card-text small text-primary mb-0">Water<img src="../assets/resources/water.png" class="mr-2" style="max-width: 18px;">: </h2>
                                                <div class="d-flex align-items-center">
                                                    <span><?php echo ($sumWater > 0) ? $sumWater:0; ?></span>
                                                    <span >/Liters</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                              <a href="building.php?id=<?php echo $building->buildingid?>">
                                <button type="submit" name="go-to-building" class="button-submit">View Details</button>
                              </a>
                          </div>
                      </div>
                  </li>
                <?php }?>
