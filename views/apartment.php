<?php 
include_once('../layout/header.php');

$utils = new DbUtils();
$rooms = DbUtils::getRoomByAdmin($_GET["id"]);
$apartmentName = DbUtils::getApartmentName($_GET["id"]);
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
                              <h2 class="card_text_grid">Usage: <b>1 289 cm3</b></h2>
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
                              <h2 class="card_text_grid">Usage: <b>78,5 kWh</b></h2>
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
                <?php foreach($rooms as $room){ ?>
                  <li class="cards_item">
                      <div class="card" style="min-width: 300px;">
                          <div class="card_image_container">
                              <div class="card_image"><img src="https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg"></div>
                          </div>
                          <div class="card_content">
                              <h1 class="card_title"><?php echo $room->name?></h1>
                              <div class="row align-items-center">
                                <div class="col">
                                  <h2 class="card_text">Light:</h2>
                                  <h2 class="card_text">Temperature:</h2>
                                </div>
                                <div class="col">
                                  <h2 class="card_text">Humidity:</h2>
                                  <h2 class="card_text">Air Condition:</h2>
                                </div>
                              </div>
                              <a href="room.php?id=<?php echo "$room->roomid"?>">
                                <button type="submit" name="go-to-building" class="button-submit">View Details</button>
                              </a>
                          </div>
                      </div>
                  </li>
                  <?php } ?>
              
              </div>
            </div>
        </div>
    </div>
</div>
<?php
include('../layout/footer.php');
?>
