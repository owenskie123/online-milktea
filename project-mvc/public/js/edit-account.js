const CURRENT_PASS = document.getElementById('current-pass');
const NEW_PASS = document.getElementById('password');
const CONFIRM_PASS = document.getElementById('confirm-pass');

if (CURRENT_PASS){
    CURRENT_PASS.onkeyup = () => {
        if (CURRENT_PASS.value != ''){
            CURRENT_PASS.setAttribute('required', '');
            NEW_PASS.setAttribute('required', '');
            CONFIRM_PASS.setAttribute('required', '');
            NEW_PASS.disabled = false;
            CONFIRM_PASS.disabled = false;
        }
        else {
            CURRENT_PASS.removeAttribute('required');
            NEW_PASS.removeAttribute('required');
            CONFIRM_PASS.removeAttribute('required');
            NEW_PASS.value = '';
            CONFIRM_PASS.value = '';
            NEW_PASS.disabled = true;
            CONFIRM_PASS.disabled = true;
        }
    }
}
