function validation() {
    var events_name = document.myform.events_name.value;
    letters = /^[a-zA-Z ]*$/;

    if (events_name == "") {
        document.getElementById("e_name").innerHTML = "Name is required";
        // document.getElementById("e_name").style.display = "block";
    }  else {
        document.getElementById("e_name").innerHTML = "";
    }
}