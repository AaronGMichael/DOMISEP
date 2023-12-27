$(document).ready(function () {
    showGraph();
});


function showGraph()
{
    {   let graphTarget = $("#graphCanvas");
        const urlParams = new URLSearchParams(window.location.search);
        const myParam = urlParams.get('id');
        $.post("../utils/getSensorData.php",
        { id: myParam},
        function (result)
        {
            let data = [];
            document.getElementById("noData").innerHTML = "";
            for (var i in result) {
                let t = result[i].datetime.split(/[- :]/);
                data.push({
                    x: new Date(Date.UTC(t[0], t[1]-1, t[2], t[3], t[4], t[5])),
                    y: result[i].value
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