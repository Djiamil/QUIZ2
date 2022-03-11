const form = document.getElementById('form');
// const username = document.getElementById('username');
const login = document.getElementById('login');
const password = document.getElementById('password');


//Functions-------------------------------------------------------------
function verifyError(input, message) {//Afficher les messages d'erreur
    const formControl = input.parentElement;
    formControl.className = 'form-control error';
    const small = formControl.querySelector('small');
    small.innerText = message;
}
//
function verifySuccess(input) {
    const formControl = input.parentElement;
    formControl.className = 'form-control success'; 
}
//
function mailValide(input) {//Tester si l'email est valide :  javascript : valid email
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if (re.test(input.value.trim().toLowerCase())) {
        verifySuccess(input);
    } else {
        verifyError(input,`L email n est pas valide!`);
    }
}
function invalidEmail() {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    return !re.test(input.value.trim().toLowerCase());
}

function videe(input) {
    return (input.value.trim()==='');
}
function motDePasseCorrect() {
    const regexChiffre=/[0-9]/
    const regexLettre=/[a-zA-Z]/
    return (!regexChiffre.test(password.value)) || (!regexLettre.test(password.value))
}
//
function champRequis(inputArray) {// Tester si les champs ne sont pas vides
    inputArray.forEach(input => {
        if (input.value.trim() === '') {
            verifyError(input,`${nomDuChamp(input)} est requis`);
        }else{
            verifySuccess(input);
        }
    });
}
//
function nomDuChamp(input) {//Retour le nom de chaque input en se basant sur son id
    return input.id.charAt(0).toUpperCase() + input.id.slice(1);
}
//
function verifyLenght(input) {//Tester la longueur de la valeur  d'un input
    if(input.value.length < 6){
        verifyError(input, `${nomDuChamp(input)} doit contenir au moins 6 caracteres!`)
    }else{
        verifySuccess(input);
    }
}
//
function passwordValid(input){
    const regexChiffre=/[0-9]/
    const regexLettre=/[a-zA-Z]/
    if((!regexChiffre.test(input.value)) || (!regexLettre.test(input.value))) {
        showError(input, "Format incorrect");
    }
    else{
        showSuccess(input);
    }
}
function passeMot(input){
    const regexChiffre=/[0-9]/
    const regexLettre=/[a-zA-Z]/
    return(!regexChiffre.test(input.value)) || (!regexLettre.test(input.value))
}

//Even listeners--------------------------------------------------------
form.addEventListener('submit',function(a){
    
    if (videe(login) || videe(password) || motDePasseCorrect()||passeMot() || password.length<6                                           ) {
        a.preventDefault();
        champRequis([login, password]);
        verifyLenght(password);
        mailValide(login);
        passwordValid(password);  
    }
});
