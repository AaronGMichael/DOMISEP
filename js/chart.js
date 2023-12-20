$(document).ready(function () {
    showGraph();
});


function showGraph()
{
    {
        $.post("../utils/getSensorData.php",{ name: "John", time: "2pm" },
        function (result)
        {
            console.log(result);
             var dates = [];
            var values = [];

            for (var i in result) {
                dates.push(result[i].datetime);
                values.push(result[i].value);
            }
            console.log(dates);
            console.log(values);
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

            var graphTarget = $("#graphCanvas");

            var barGraph = new Chart(graphTarget, {
                type: 'line',
                data: chartdata,
            });
        });
    }
}