function dismissMessage(id, data){
    console.log(data);
    if(confirm(`Are you sure you want to clear the message:\n\n${data.text}\nFrom: ${data.firstname} ${data.name}`)){
        fetch('../utils/deleteMessage.php',
        {method:"POST", body: JSON.stringify(data)})
            .then(function changeState(data){
                const resp = data.json();
                let element = document.querySelector(`#${id}`);
                element.remove();
        });
    }
}
