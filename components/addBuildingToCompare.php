<?php
    include_once('../utils/DbUtils.php');
    $utils = new DbUtils();
    $buildings = DbUtils::getBuilding();
?>
<select class = "form-control" placeholder="Building" type = "name" id="addBuilding" name = "building" required>
    <option value = "" disabled selected>Select from Options</option>
    <?php foreach($buildings as $building){ ?>
        <option value="<?php echo $building->buildingid ?>"><?php echo $building->name?></option>
    <?php }?>
    <option value="mean">Average</option>
</select>
<button type="submit" name="addComparision" onclick="addData()">Go</button>
