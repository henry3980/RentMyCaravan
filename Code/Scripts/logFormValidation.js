// Iestyn's code ----------------------------------------------
function formValidation(){
    document.getElementById("loginForm").addEventListener("submit", function(event){
        let isValid = true;
        
        var username = document.getElementById("username").value
        var password = document.getElementById("password").value

        var usernameError = document.getElementById("usernameError")
        var passwordError = document.getElementById("passwordError")

        usernameError.textContent = "";
        passwordError.textContent = "";

        if(username === ""){
            usernameError.textContent = "Username Incorrect.";
            isValid = false;
        }

        if(password === ""){
            passwordError.textContent = "Password Incorrect.";
            isValid = false;
        }

        if(!isValid){
            event.preventDefault();
        }
    });
}

formValidation();

//-------------------------------------------------------------