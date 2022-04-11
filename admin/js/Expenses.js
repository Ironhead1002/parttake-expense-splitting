function validation() {
    alert('sgjh');
    var expense = document.myform.expense.value;
    numbers = /^[0-9]*$/;

 if (!expense.match(numbers)) {

        document.getElementById("cus_amount").innerHTML = "only number is allowed";
    }  else {
        document.getElementById("cus_name").innerHTML = "";
    }
}