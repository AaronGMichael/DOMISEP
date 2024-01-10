$(document).ready(function () {
    showGraph();
});


function showGraph()
{
    {   let graphTarget = $("#graphCanvas");
        let chartStatus = Chart.getChart("graphCanvas"); // <canvas> id
        if (chartStatus != undefined) {
            chartStatus.destroy();
        }
        const urlParams = new URLSearchParams(window.location.search);
        const type = urlParams.get('type');
        let param = urlParams.get('apartmentid') ? urlParams.get('apartmentid') :urlParams.get('buildingid');
        let options = {};
        options["type"] = type;
        let imm;
        if(urlParams.get('apartmentid')){
            options["apartment"] = urlParams.get('apartmentid');
            imm = true;
        }
        else{
            options["building"] = urlParams.get('buildingid');
            imm = false;
        }
        let fromDate = document.querySelector("#fromDate").value;
        let toDate = document.querySelector("#toDate").value;
        if(fromDate) fromDate = new Date(fromDate);
        else fromDate = new Date(0);
        if(toDate) toDate = new Date(toDate);
        else toDate = new Date();
        console.log(fromDate, toDate)
        $.post(`../utils/${imm? "getApartmentUsageHistory" : "getBuildingUsageHistory"}.php`,
        options,
        function (result)
        {
            let data = [];
            document.getElementById("noData").innerHTML = "";
            for (var i in result) {
                let t = result[i].DateTime.split(/[- :]/);
                data.push({
                    x: new Date(Date.UTC(t[0], t[1]-1, t[2], t[3], t[4], t[5])),
                    y: result[i].Value
                })
            }
            console.log(data);
            var chartdata = {
                datasets: [
                    {
                        label: 'Usage History',
                        backgroundColor: '#49e2ff',
                        borderColor: '#46d5f1',
                        hoverBackgroundColor: '#CCCCCC',
                        hoverBorderColor: '#666666',
                        data: data.filter((entry) => {
                            if(entry.x>=fromDate && entry.x<=toDate) return true;
                            else return false;
                        })
                    }
                ]
            };

            var barGraph = new Chart(graphTarget, {
                type: 'line',
                data: chartdata,
                options:{
                    scales: {
                        x: {
                            type:"time",
                            time:{
                                unit: "day"
                            }
                        }
                    }
                }
            });
        });
    }
}