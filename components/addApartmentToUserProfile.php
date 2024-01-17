<?php
    include_once('../utils/DbUtils.php');
    $utils = new DbUtils();
    $apartments = DbUtils::getAllBuildingApartments();
?>
<div class="form-group" id="linkToApartment">
<label for="accessrights">Select Apartment:</label>
<select class = "form-control" placeholder="Building" type = "name" id="addBuilding" name = "apartmentLink" required>
    <option value = "" disabled selected>Choose Apartment</option>
    <?php foreach($apartments as $apartment){ ?>
        <option value="<?php echo $apartment->apartmentid ?>"><?php echo $apartment->name?> in Building <?php echo $apartment->buildingName?></option>
    <?php }?>
</select>
</div>
