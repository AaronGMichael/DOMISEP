async function switchClicked(state, id, ele){
    // let device = JSON.parse(data);
    console.log(state, id);
    let opts = {};
    opts['id'] = id;
    if(state.trim() === "ON") opts["state"] = 0;
    else opts["state"] = 1;
    console.log(opts);
    console.log(ele);
    fetch('../utils/switchDevice.php',{method:"POST", body: JSON.stringify(opts)}).then(function changeState(data){
        console.log(state);
        location.reload();
    });
}
