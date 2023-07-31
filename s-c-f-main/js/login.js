$(document).ready(function() {
    signUp = document.getElementById("signUp");

    function signUpClicked() {
        window.location.href("signUp.php");
    }
    signUp.addEventListener("click", signUpClicked);
})