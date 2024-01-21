<?php 
include_once('../layout/header.php');
include_once("../components/proveAdmin.php");
?>
          <div class="basic-container">
              <h1  style="font-size: 30pt"><b>All of the Buildings</b></h1>
              <h1>Choose a building of your interest
              </h1>
              <div class="inputSection">
              <label for="searchBox"><i class="fas fa-search"></i></label>
                    <input type="text" name="term" id="searchBox" placeholder="Search Here...">
                </div>
                <br>
              <div class="d-flex flex-row flex-nowrap overflow-auto" id="buildingBox">

              </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="../js/searchBox.js">
</script>
<?php
include('../layout/footer.php');
?>
