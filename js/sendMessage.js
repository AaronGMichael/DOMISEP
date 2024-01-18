function areYouSure(){
    const msg = document.querySelector("*[name='message']").value;
    return confirm(`Are you sure you want to send this message?\n\n ${msg}`);
  }
  