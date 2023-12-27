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
            let dates2 = [];
            let values2 = [];
            let totalData = [];
            let totalData2 = [];
            const regex = /(\d\d\d\d)[\/-](\d\d?)[\/-](\d\d)/g;
            document.getElementById("noData").innerHTML = "";
            for (let i in result) {
                totalData.push({
                    x: result[i].datetime.replace(regex, '2023-10-10'),
                    y: result[i].value,
                })
                totalData2.push({
                    x: result[i].datetime.replace(regex, '2023-10-09'),
                    y: result[i].value -2,
                })
                // dates.push(new Date(result[i].datetime));
                // values.push(result[i].value);
                // dates2.push(new Date(result[i].datetime));
                // values2.push(result[i].value);
            }
            console.log(totalData)
            let chartdata = {
                labels: totalData.map(x => x.x),
                datasets: [
                    {
                        label: 'Sensor History 1',
                        backgroundColor: '#0903AD',
                        borderColor: '#1A12FF',
                        hoverBackgroundColor: '#CCCCCC',
                        hoverBorderColor: '#666666',
                        data: totalData.map(x => x.y)
                    },
                    {
                        label: 'Sensor History 2',
                        backgroundColor: '#8C0800',
                        borderColor: '#FF2012',
                        hoverBackgroundColor: '#CCCCCC',
                        hoverBorderColor: '#666666',
                        data: totalData2
                    }
                ],
                options: {
                    plugins: {
                        title: {
                          text: 'Chart.js Time Scale',
                          display: true
                        },  
                    },
                    scales: {
                        x: {
                            type: 'time',
                            time: {
                              // Luxon format string
                              tooltipFormat: 'DD T'
                            },
                            title: {
                              display: true,
                              text: 'Date'
                            }
                          },
                    }   
                  }
            };

            var barGraph = new Chart(graphTarget, {
                type: 'line',
                data: chartdata,
            });
        });
    }
}

//https://codepen.io/leelenaleee/pen/MWojOwv
// https://chartjs.org/docs/latest/samples/scales/time-line.html