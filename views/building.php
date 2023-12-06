<?php 
include_once('../layout/header.php');
$utils = new DbUtils();
$appartments = DbUtils::getApartmentByAdmin($_GET["id"]);
?>
          <div class="basic-container">
              <h1 style="font-size: 30pt"><b>Name of the Building - Adress</b></h1>
              <h2>Choose an appartment you want to manage</h2>
              <!-- <ul class="cards"> -->
              <div class="d-flex flex-row flex-nowrap overflow-auto">
              <?php foreach($appartments as $appartment){ ?>
                <li class="cards_item">
                      <div class="card" style="min-width: 300px;">
                          <div class="card_image_container">
                              <div class="card_image"><img src="https://www.contemporist.com/wp-content/uploads/2016/04/contemporary-apartment_040416_06-800x533.jpg"></div>
                          </div>
                              <div class="card_content">
                              <h1 class="card_title"><?php echo $appartment->name?></h1>
                              <div class="row align-items-center">
                                <div class="col">
                                  <h2 class="card_text">Electricity:</h2>
                                </div>
                                <div class="col">
                                  <h2 class="card_text">Water:</h2>
                                </div>
                              </div>
                              <a href="apartment.php">
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
