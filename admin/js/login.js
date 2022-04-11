function validation() {
    var email = document.getElementById('username').value;
    var password = document.getElementById('password').value;
   
    const Email = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    

    if (email == "") {
        document.getElementById("c_email").innerHTML = "email is required";
        return false;
    }else if (!email.match(Email)) {
        document.getElementById("c_email").innerHTML = "Please valid email";
        return false;
    } else {
        document.getElementById("c_email").innerHTML = "";
    }

    if (password == "") {
        document.getElementById("c_pass").innerHTML = "password is required";
        return false;
    }  else {
        document.getElementById("c_pass").innerHTML = "";
    }

   
}