// Iestyn's code ----------------------------------------------
function formValidation(){
    document.getElementById("registerForm").addEventListener("submit", function(event){
        let isValid = true;
        
        var username = document.getElementById("username").value
        var password = document.getElementById("password").value
        var email = document.getElementById("email").value
        var phoneNumber = document.getElementById("phoneNumber").value
        var title = document.getElementById("title").value
        var gender = document.getElementById("gender").value
        var firstName = document.getElementById("firstName").value
        var lastName = document.getElementById("lastName").value
        var addressL1 = document.getElementById("addressL1").value
        var addressL2 = document.getElementById("addressL2").value
        var addressL3 = document.getElementById("addressL3").value
        var postcode = document.getElementById("postcode").value
        
        var usernameError = document.getElementById("usernameError")
        var passwordError = document.getElementById("passwordError")
        var emailError = document.getElementById("emailError")
        var phoneNumberError = document.getElementById("phoneNumberError")
        var titleError = document.getElementById("titleError")
        var genderError = document.getElementById("genderError")
        var firstNameError = document.getElementById("firstNameError")
        var lastNameError = document.getElementById("lastNameError")
        var addressL1Error = document.getElementById("addressL1Error")
        var addressL2Error = document.getElementById("addressL2Error")
        var addressL3Error = document.getElementById("addressL3Error")
        var postcodeError = document.getElementById("postcodeError")

        usernameError.textContent = "";
        passwordError.textContent = "";
        emailError.textContent = "";
        phoneNumberError.textContent = "";
        titleError.textContent = "";
        genderError.textContent = "";
        firstNameError.textContent = "";
        lastNameError.textContent = "";
        addressL1Error.textContent = "";
        addressL2Error.textContent = "";
        addressL3Error.textContent = "";
        postcodeError.textContent = "";

        if(username === ""){
            usernameError.textContent = "You must input a Username.";
            isValid = false;
        }

        if(password === ""){
            passwordError.textContent = "You must input a Password.";
            isValid = false;
        }

        var emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
        if(!email.match(emailPattern)){
            emailError.textContent = "Enter a valid email address.";
            isValid = false;
        }

        var phonePattern = /^[0-9]{10,15}$/;
        if(!phoneNumber.match(phonePattern)){
            phoneNumberError.textContent = "Enter a valid phone number.";
            isValid = false;
        }

        if(title === ""){
            titleError.textContent = "Select a title.";
            isValid = false;
        }

        if(gender === ""){
            genderError.textContent = "Gender is required.";
            isValid = false;
        }

        if(firstName === ""){
            firstNameError.textContent = "Enter your first name.";
            isValid = false;
        }

        if(lastName === ""){
            lastNameError.textContent = "Enter your last name.";
            isValid = false;
        }

        if(addressL1 === ""){
            addressL1Error.textContent = "Address Line 1 is required.";
            isValid = false;
        }

        if(addressL2 === ""){
            addressL2Error.textContent = "Address Line 2 is required.";
            isValid = false;
        }

        if(addressL3 === ""){
            addressL3Error.textContent = "Address Line 3 is required.";
            isValid = false;
        }

        if(postcode === ""){
            postcodeError.textContent = "Postcode is required.";
            isValid = false;
        }
        
        if(!isValid){
            event.preventDefault();
        }
    });
}

formValidation();

//-------------------------------------------------------------