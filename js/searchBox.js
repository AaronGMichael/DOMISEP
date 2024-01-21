

$("#searchBox").on('input', function() {
    let searchTerm = this.value;
    $("#buildingBox").load("../components/buildingBox.php", {
        term: searchTerm
    });
});

$(document).ready(function() {
    $("#buildingBox").load("../components/buildingBox.php");
});
