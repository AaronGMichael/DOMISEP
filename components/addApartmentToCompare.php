<?php
    include_once('../utils/DbUtils.php');
    $utils = new DbUtils();
    if($_POST["admin"] === "false") $apartments = [];   
    else $apartments = DbUtils::getAllBuildingApartments();
?>
<select class = "form-control" placeholder="Building" type = "name" id="addBuilding" name = "building" required>
    <option value = "" disabled selected>Select from Options</option>
    <?php foreach($apartments as $apartment){ ?>
        <option value="<?php echo $apartment->apartmentid ?>"><?php echo $apartment->name?> in Building <?php echo $apartment->buildingName?></option>
    <?php }?>
    <option value="mean">Average</option>
</select>
<button type="submit" name="addComparision" onclick="addData()">Go</button>
