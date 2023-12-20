<?php 
include_once('../layout/header.php');
$utils = new DbUtils();
$currentId =  $user->isAdmin()? $_GET["id"] : DbUtils::getApartmentByUser($user->id)->getId();
$rooms = DbUtils::getRoomByAdmin($currentId);
$apartmentName = DbUtils::getApartmentName($currentId);
$sumWater = DbUtils::sumUpWater($_GET["id"]);
$sumEle = DbUtils::sumUpElectricity($_GET["id"]);

?>
          <div class="basic-container">
              <h1 style="font-size: 30pt"><b><?php echo $apartmentName?></b></h1>

              <h1>Resources Consumption</h1>
              <div class="additional-padding-small"></div>
              <ul class="cards_grid">
                  <li class="cards_item_grid">
                      <div class="card_grid">
                          <div class="card_image_container_grid">
                              <div class="card_image_grid"><img src="../assets/resources/water.png"></div>
                          </div>
                          <div class="card_content_grid">
                              <h2 class="card_title_grid">Water</h2>
                              <h2 class="card_text_grid">Usage: <b><?php echo $sumWater  . " Liters"; ?></b></h2>
                              <button type="submit" name="view-charts" class="button-submit">View Charts</button>
                          </div>
                      </div>
                  </li>
                  <li class="cards_item_grid">
                      <div class="card_grid">
                          <div class="card_image_container_grid">
                              <div class="card_image_grid"><img src="../assets/resources/electricity.png"></div>
                          </div>
                          <div class="card_content_grid">
                              <h2 class="card_title_grid">Electricity</h2>
                              <h2 class="card_text_grid">Usage: <b><?php echo $sumEle ." kWh"?></b></h2>
                              <button type="submit" name="view-charts" class="button-submit">View Charts</button>
                          </div>
                      </div>
                  </li>
              </ul>
              <div class="additional-padding-small"></div>
              <h1>Choose a Room</h1>
              <h2>Which room do you want to manage?</h2>
              
              <!-- <ul class="cards"> -->
              <div class="d-flex flex-row flex-nowrap overflow-auto">
                <?php if(isset($rooms[0])) foreach($rooms as $room){ ?>
                    <?php $light = DbUtils::light($room->roomid);
                            $temp = DbUtils::temperature($room->roomid); 
                            $hum = DbUtils::humidity($room->roomid); 
                            $air = DbUtils::airCondition($room->roomid);
                             ?>
                  <li class="cards_item">
                      <div class="card" style="min-width: 300px;">
                          <div class="card_image_container">
                              <div class="card_image"><img src="<?php echo $room->photo; ?>"></div>
                          </div>
                          <div class="card_content">
                              <h1 class="card_title"><?php echo $room->name?></h1>
                              <div class="row align-items-center">
                                <div class="col">
                                  <h2 class="card_text">Light: <b><?php echo $light?> </b></h2>
                                  <h2 class="card_text">Temperature: <b><?php if($temp == NULL) echo "No data";
                                        else {$sensortype = DbUtils::getSensorType1($temp->sensorid);
                                        echo $temp->value  . " " . $sensortype->unit;} ?> </b></h2>
                                </div>
                                <div class="col">
                                  <h2 class="card_text">Humidity:<b> <?php if($hum == NULL) echo "No data";
                                        else{$sensortype = DbUtils::getSensorType1($hum->sensorid);
                                         echo $hum->value  . " " . $sensortype->unit;} ?></b></h2>
                                  <h2 class="card_text">Air Condition: <b><?php echo $air?> </b></h2>
                                </div>
                              </div>
                              <a href="room.php?id=<?php echo "$room->roomid"?>">
                                <button type="submit" name="go-to-building" class="button-submit">View Details</button>
                              </a>
                          </div>
                      </div>
                  </li>
                  <?php } else echo "No Rooms to Display" ?>
              
              </div>
            </div>
        </div>
    </div>
</div>
<?php
include('../layout/footer.php');
?>
