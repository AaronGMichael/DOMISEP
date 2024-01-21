async function switchClicked(state, id, ele){
    // let device = JSON.parse(data);
    let opts = {};
    opts['id'] = id;
    if(state.trim() === "ON") opts["state"] = 0;
    else opts["state"] = 1;
    fetch('../utils/switchDevice.php',{method:"POST", body: JSON.stringify(opts)}).then(function changeState(data){
        location.reload();
    });
}

let sensor;

function addDetails(data){
    sensor = data;
    const tip = document.querySelector(`#tooltip${data.sensorid}`);
    tip.style.height = "10em";
    tip.style.width = "8em";
    tip.innerHTML = `<textarea type='text' class='tooltip-input'></textarea><button class='tooltip-add' onclick='sendDetails()'>Submit</button>`
}

function sendDetails(){
    const text = document.querySelector(`#tooltip${sensor.sensorid} textarea`).value;
    fetch('../utils/addSensorDescription.php',
        {method:"POST", body: JSON.stringify({
            text: text,
            id: sensor.sensorid
        })})
            .then(function changeState(data){
                const resp = data.json();
                let element = document.querySelector(`#tooltip${sensor.sensorid}`);
                element.innerHTML = text;
                sensor=null;
        });
}
