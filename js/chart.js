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
        const myParam = urlParams.get('id');
        let fromDate = document.querySelector("#fromDate").value;
        let toDate = document.querySelector("#toDate").value;
        if(fromDate) fromDate = new Date(fromDate);
        else fromDate = new Date(0);
        if(toDate) toDate = new Date(toDate);
        else toDate = new Date();
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
                        backgroundColor: 'rgba(73,226,255, 0.8)',
                        borderColor: 'rgba(73,226,255, 0.8)',
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
                            type:"time"
                        }
                    }
                }
            });
        });
    }
}