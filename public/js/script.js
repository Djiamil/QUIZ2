const form = document.getElementById('form');
// const username = document.getElementById('username');
const login = document.getElementById('login');
const password = document.getElementById('password');


//Functions-------------------------------------------------------------
function showError(input, message) {//Afficher les messages d'erreur
    const formControl = input.parentElement;
    formControl.className = 'form-control error';
    const small = formControl.querySelector('small');
    small.innerText = message;
}
//
function showSuccess(input) {
    const formControl = input.parentElement;
    formControl.className = 'form-control success'; 
}
//
function checkEmail(input) {//Tester si l'email est valide :  javascript : valid email
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if (re.test(input.value.trim().toLowerCase())) {
        showSuccess(input);
    } else {
        showError(input,`L email n est pas valide!`);
    }
}
//
function checkRequired(inputArray) {// Tester si les champs ne sont pas vides
    inputArray.forEach(input => {
        if (input.value.trim() === '') {
            showError(input,`${getFieldName(input)} est requis`);
        }else{
            showSuccess(input);
        }
    });
}
//
function getFieldName(input) {//Retour le nom de chaque input en se basant sur son id
    return input.id.charAt(0).toUpperCase() + input.id.slice(1);
}
//
function checkLength(input) {//Tester la longueur de la valeur  d'un input
    if(input.value.length < 6){
        showError(input, `${getFieldName(input)} doit contenir au moins 6 caracteres!`)
    }else{
        showSuccess(input);
    }
}
//
function checkPassword(input) {
    if (!preg_match('/[a-zA-Z]/',input) ||!preg_match("/[0-9]/",input)) {
        showError(input, 'Le format du mot de passe est incorrect!');
    }
}



//Even listeners--------------------------------------------------------
form.addEventListener('submit',function(e){
    // e.preventDefault();
    checkRequired([login, password]);
    checkLength(password);
    checkEmail(login);
}
)
