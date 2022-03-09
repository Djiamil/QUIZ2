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
function verifieEmail() {//Tester si l'email est valide :  javascript : valid email
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if (re.test(alogin.value.trim().toLowerCase())) {
        return true
    } else {
        return false
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
function champVide(input) {// Tester si les champs ne sont pas vides
    if (input.value.trim() === ''){
        return true
    }else{
        return false
    }
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
function longueurPassword() {
    if(apassword.value.length < 6){
        return false
    }else{
        return true
    }
}
//
function checkPassword(input){
    if((!retexte.test(input.value)) || (!renum.test(input.value))) {
        showError(input, "Format incorrect");
    }
    else{
        showSuccess(input);
    }
}
function verifiePassword(input){
    if((!retexte.test(input.value)) || (!renum.test(input.value))) {
        return false
    }
    else{
        return true
    }
}

function checkPasswordMatch(input1, input2) {
    if (input1.value !== input2.value) {
        showError(input2, 'Mot De passe non conformes!');
    }
}
function motDePasseConformes() {
    if (apassword.value !== apassword2.value) {
        return false
    }else{
        return true
    }
}





//Even listeners--------------------------------------------------------
aform.addEventListener('submit',function(e){
    if (champVide(anom) ||champVide(aprenom)||champVide(alogin)||!verifieEmail()|| !longueurPassword() ||!motDePasseConformes() ) {
        e.preventDefault();
        checkRequired([aprenom,anom,alogin, apassword,apassword2]);
        checkLength(apassword);
        checkEmail(alogin);
        checkPassword(apassword);
        checkPasswordMatch(apassword,apassword2); 
    }
   
});