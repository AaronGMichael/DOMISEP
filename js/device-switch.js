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
