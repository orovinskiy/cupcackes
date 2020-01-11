document.getElementById('cupcakeForm').onsubmit = valid;

//Regex for name
let VALID_NAME_REGEX = /^[a-zA-Z ]+$/;

function valid(){
    let isValid = true;

    //shows all the required fields right away
    $('span').html('*');

    //validates the name
    if(!VALID_NAME_REGEX.test($('#getName').val())){
        isValid = false;
        $('#textErr').show();
        $('#textErr').html('*Please Enter a Valid Name');
    }

    //validates the checkboxes
    let flavors = document.getElementsByName('flavors[]');
    let checked = false;
    for(let i = 0; i < flavors.length; i++){
        if(flavors[i].checked){
            checked = true;
        }
    }
    if(!checked){
        isValid = false;
        $('#boxErr').show();
        $('#boxErr').html('*Please choose at least one option');
    }

    return isValid;
}