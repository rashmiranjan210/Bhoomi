function validate(e){
    try{
        let name = document.getElementById("name").value
        let email = document.getElementById("email").value
        let country = document.getElementById("country").value
        let city = document.getElementById("city").value
        let address = document.getElementById("address").value.trim();
        
        let mobile = document.getElementById("phone").value
        let pin = document.getElementById("pin").value
        let password = document.getElementById("password").value
        let cpassword = document.getElementById("cpassword").value 
        let error = false;
        let nameError= document.getElementById("nameError")
        let emailError = document.getElementById("emailError")
        let countryError = document.getElementById("countryError")
        let cityError = document.getElementById("cityError")
        let addressError = document.getElementById("addressError")
        let mobileError = document.getElementById("mobileError")
        let pinerror = document.getElementById("pinerror")
        let passwordError = document.getElementById("passwordError")
        let cpasswordError = document.getElementById("cpasswordError")

        if(name === "" || name === null){
            nameError.innerHTML = "email is Required"
            error = true;
        }  else {
            nameError.innerHTML = ""
        }

        let emailPat = /^[\w\.]{4,}@[a-zA-Z\.]{5,}\.[a-zA-Z]{2,}/
        if(email === "" || email === null){
            emailError.innerHTML = "email is Required"
            error = true;
        } else if(!email.match(emailPat)){
            emailError.innerHTML = "Please enter a valid email id"
            error = true;
        } else {
            emailError.innerHTML = ""
        }

        if(country === "" || country === null){
            // alert("Name is required");
            countryError.innerHTML = "country is Required"
            error = true;
        } else {
            countryError.innerHTML = ""
        }
        if( city=== "" ||  city=== null){
            // alert("Name is required");
            cityError.innerHTML = "city is Required"
            error = true;
        } else {
            cityError.innerHTML = ""
        }
        if (address === "") {
            console.log("hi")
            addressError.innerHTML = "Address is Required";
            error = true;
        } else {
            addressError.innerHTML = "";
        }
        let mobPat = /^[6-9][0-9]{9}$/
        if(mobile === "" || mobile === null){
            mobileError.innerHTML = "mobile is Required"
            error = true;
        } else if(!mobile.match(mobPat)){
            mobileError.innerHTML = "Please enter a 10 digit valid mobile number"
            error = true;
        } else {
            mobileError.innerHTML = ""
        }
        
        let pinpat=/[0-9]{6}/
        if( pin=== "" || pin === null){
            pinerror.innerHTML = "pin is Required"
            error = true;
        }else if(!pin.match(pinpat)) {
            pinerror.innerHTML="enter a valid pin"
        }
        
        else {
            pinerror.innerHTML = ""
        }

        let passPat = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*]).{8,16}$/

        console.log("Password pattern:", passPat);
console.log("User input password:", password);
        if(password === "" || password === null){
            passwordError.innerHTML = "password is Required"
            error = true;
        } else if(!password .match(passPat)){
            passwordError.innerHTML = "Please enter a strong password(8-16) with uppercase lowercase numbers and special chars."
            error = true;
        }else {
            passwordError.innerHTML = ""
        }

        if(cpassword === "" || cpassword === null){
            cpasswordError.innerHTML = "confirm password is Required"
            error = true;
        } else if(cpassword !== password){
            cpasswordError.innerHTML = "confirm password must be same as password"
            error = true;
        } else {
            cpasswordError.innerHTML = ""
        }



        if(error){
            e.preventDefault()
        }
    } catch(error){
        console.log(error);
        e.preventDefault()
    }
}