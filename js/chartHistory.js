$(document).ready(function () {
    showGraph();
});


function showGraph()
{
    {   let graphTarget = $("#graphCanvas");
        const urlParams = new URLSearchParams(window.location.search);
        const type = urlParams.get('type');
        const apartment = urlParams.get('apartmentid');
        $.post("../utils/getApartmentUsageHistory.php",
        {   
            type:type,
            apartment: apartment
        },
        function (result)
        {
            let data = [];
            console.log(result);
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
                        label: 'Sensor History',
                        backgroundColor: '#49e2ff',
                        borderColor: '#46d5f1',
                        hoverBackgroundColor: '#CCCCCC',
                        hoverBorderColor: '#666666',
                        data: data
                    }
                ]
            };

            var barGraph = new Chart(graphTarget, {
                type: 'line',
                data: chartdata,
                options:{
                    scales: {
                        x: {
                            type:"time"
                        }
                    }
                }
            });
        });
    }
}