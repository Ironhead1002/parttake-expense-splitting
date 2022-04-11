function validation() {
    var name = document.getElementById('USER').value;
    var email = document.getElementById('EMAIL').value;
    var password = document.getElementById('PASS').value;
    var contact = document.getElementById('CON').value;

    letters = /^[a-zA-Z ]*$/;
    numbers = /^[0-9]*$/;
    const Email = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if (name == "") {
        document.getElementById("c_name").innerHTML = "Name is required";
        return false;
        // document.getElementById("c_name").style.display = "block";
    } else if (!name.match(letters)) {
        document.getElementById("c_name").innerHTML = "only alphabate is required";
        return false;
    }else if (name.length > 30 ){
        document.getElementById("c_name").innerHTML = "Maximum Length should be 30";
        return false;
    }  else {
        document.getElementById("c_name").innerHTML = "";
    }

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
    } else if (password.length < 8 ) {
        document.getElementById("c_pass").innerHTML = "password must be 8 character";
        return false;
    } else {
        document.getElementById("c_pass").innerHTML = "";
    }

    if (contact == "") {
        document.getElementById("c_contact").innerHTML = "contact is required";
        return false;
    }else if (!contact.match(numbers)) {
        document.getElementById("c_contact").innerHTML = "only number is allowed";
        return false;
    } else if (contact.length != 10 ){
        document.getElementById("c_contact").innerHTML = "contact must be 10 number";
        return false;
    } else {
        document.getElementById("c_contact").innerHTML = "";
    }
}
