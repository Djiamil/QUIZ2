const aform = document.getElementById('form_1');
const aprenom = document.getElementById('aprenom');
const anom = document.getElementById('anom');

const alogin= document.getElementById('alogin');
const apassword = document.getElementById('apassword');
const apassword2 = document.getElementById('apassword2');
const retexte=/[0-9]/
const renum=/[a-zA-Z]/

//Functions-------------------------------------------------------------
function showError(input, message) {//Afficher les messages d'erreur
    const formControle = input.parentElement;
    formControle.className = 'form-controle error';
    const small = formControle.querySelector('small');
    small.innerText = message;
}
//
function showSuccess(input) {
    const formControle = input.parentElement;
    formControle.className = 'form-controle success'; 
}
//
function checkEmail(input) {//Tester si l'email est valide :  javascript : valid email
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if (re.test(input.value.trim().toLowerCase())) {
        showSuccess(input);
    } else {
        showError(input,`Email is not valid!`);
    }
}
//
function checkRequired(inputArray) {// Tester si les champs ne sont pas vides
    inputArray.forEach(input => {
        if (input.value.trim() === '') {
            showError(input,`${getFieldName(input)} requis`);
        }else{
            showSuccess(input);
        }
    });
}
//
function getFieldName(input) {
    return input.id.charAt(1).toUpperCase() + input.id.slice(2);
}
//
function checkLength(input) {
    if(input.value.length < 6){
        showError(input, `${getFieldName(input)} at least 6 characters!`)
    }else{
        showSuccess(input);
    }
}
//
function checkPassword(input){
    if((!retexte.test(input.value)) || (!renum.test(input.value))) {
        showError(input, "Mot de pass invalid")
    }
    else{
        showSuccess(input);
    }
}

function checkPasswordMatch(input1, input2) {
    if (input1.value !== input2.value) {
        showError(input2, 'Mot De passe non conformes!');
    }
}





//Even listeners--------------------------------------------------------
aform.addEventListener('submit',function(e){
    e.preventDefault();//Bloquer la soumission du formulaire
    

    checkRequired([aprenom,anom,alogin, apassword,apassword2]);
    //
    checkLength(apassword);
    checkEmail(alogin);
    checkPassword(apassword);
    checkPasswordMatch(apassword,apassword2);


    /*
    function isValidEmail(email) {//Tester si l'email est valide
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}
    if (username.value === '') {
       showError(username,'Username is required!'); 
    }else{
        showSuccess(username);
    }

    if (email.value === '') {
       showError(email,'Email is required!'); 
    }else if(!isValidEmail(email.value)){
        showError(email,'Email is not valid!');
    }else{
        showSuccess(email);
    }

    if (password.value === '') {
       showError(password,'password is required!'); 
    }else{
        showSuccess(password);
    }

    if (password2.value === '') {
       showError(password2,'Password 2 is required!'); 
    }else{
        showSuccess(password2);
    }*/
});