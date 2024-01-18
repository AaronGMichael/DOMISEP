document.querySelector('#flexSwitchCheckChecked').addEventListener("change", (event) => {
    if(document.querySelector("#linkToApartment")) document.querySelector("#linkToApartment").remove();
    else fetch("../components/addApartmentToUserProfile.php").then(async (response) => {
        let html = await response.text();
        document.querySelector('button[name="register"]').insertAdjacentHTML('beforebegin',html);
    });
});
