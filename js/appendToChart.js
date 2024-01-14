function addCompare(){
    const urlParams = new URLSearchParams(window.location.search);
    let param = urlParams.get('apartmentid') ? 'Apartment' : 'Building';
    $.ajax({
        url : `../components/add${param}ToCompare.php`,
        type : 'post',
        data: {admin: admin},
        success: function(data) {
         $('#DIVID').html(data);
        },
        error: function() {
         $('#DIVID').text('An error occurred');
        }
    });
}

function addData(){
    let val = document.querySelector("#addBuilding").value;
    let buildingName = document.querySelector('#addBuilding option:checked').innerText;
    updateData(val, buildingName);
}

function updateData(building, name){
    let barGraph = Chart.getChart("graphCanvas");
    const urlParams = new URLSearchParams(window.location.search);
    const type = urlParams.get('type');
    let param = urlParams.get('apartmentid') ? urlParams.get('apartmentid') :urlParams.get('buildingid');
    let options = {};
    options["type"] = type;
    let imm;
    if(urlParams.get('apartmentid')){
        options["apartment"] = building;
        imm = true;
    }
    else{
        options["building"] =building;
        imm = false;
    }
    let fromDate = document.querySelector("#fromDate").value;
    let toDate = document.querySelector("#toDate").value;
    if(fromDate) fromDate = new Date(fromDate);
    else fromDate = new Date(0);
    if(toDate) toDate = new Date(toDate);
    else toDate = new Date();
    const randomNum = () => Math.floor(Math.random() * (235 - 52 + 1) + 52);
    const randomRGB = () => `rgb(${randomNum()}, ${randomNum()}, ${randomNum()})`;
    $.post(`../utils/${imm? "getApartmentUsageHistory" : "getBuildingUsageHistory"}.php`,
    options,
    function (result){
        let data = [];
        for (var i in result) {
            let t = result[i].DateTime.split(/[- :]/);
            data.push({
                x: new Date(Date.UTC(t[0], t[1]-1, t[2], t[3], t[4], t[5])),
                y: result[i].Value
            })
        }
        let newData = {
                    label: `${name} Usage History`,
                    backgroundColor: randomRGB(),
                    borderColor: randomRGB(),
                    hoverBackgroundColor: '#CCCCCC',
                    hoverBorderColor: '#666666',
                    data: data.filter((entry) => {
                        if(entry.x>=fromDate && entry.x<=toDate) return true;
                        else return false;
                    })
        }
        barGraph.data.datasets.push(newData);
        barGraph.update();
    }
    ).fail((building) => {
        window.alert(`${name} has no data`);
    })
}
