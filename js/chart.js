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
            console.log(result);
             var dates = [];
            var values = [];
            document.getElementById("noData").innerHTML = "";
            for (var i in result) {
                dates.push(result[i].datetime);
                values.push(result[i].value);
            }
            var chartdata = {
                labels: dates,
                datasets: [
                    {
                        label: 'Sensor History',
                        backgroundColor: '#49e2ff',
                        borderColor: '#46d5f1',
                        hoverBackgroundColor: '#CCCCCC',
                        hoverBorderColor: '#666666',
                        data: values
                    }
                ]
            };

            var barGraph = new Chart(graphTarget, {
                type: 'line',
                data: chartdata,
            });
        });
    }
}