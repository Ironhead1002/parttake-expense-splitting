<?php
session_start();

function dycrypt($string)
{
    $encrypt_method = "AES-256-CBC";
    $secret_key = 'parttake_expense';
    $secret_iv = 'parttake_expense_iv';
    $key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);

    return $output;
}

function encrypt($string)
{
    $encrypt_method = "AES-256-CBC";
    $secret_key = 'parttake_expense';
    $secret_iv = 'parttake_expense_iv';
    $key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
    $output = base64_encode($output);

    return $output;
}

//error_reporting(0);
if($_SESSION['user_name']==true){

}else{
    header('location:index.php');
}
?>
<?php
    include('header.php');
    $e_data = $_GET["data"];
    $data = dycrypt($e_data);
?>
<?php


   $con = mysqli_connect("localhost","root","","parttake") or die("connection failed");
if(isset($_POST['submit'])){
   $user_id=$_SESSION['user_unique_id'];
   $e_Event_id = $_GET['data'];
   $Event_id = dycrypt($e_Event_id);
   $exepence_name = $_POST['exepence_name'];
   $e_exepence_name = encrypt($exepence_name);
   $amount_spend = $_POST['amount_spend'];
   $amount_spend_on_date = date("Y-m-d H:i:s");


    $query  = "INSERT INTO `expense` (user_id, event_id,exepence_name,amount_spend,amount_spend_on_date) VALUES ('{$user_id}','{$Event_id}','{$e_exepence_name}','{$amount_spend}','{$amount_spend_on_date}')";

     if(mysqli_query($con, $query)){
        ?>
        <script>
         alert("Exepence added Successfully");
          location.replace('Expenses.php?data=<?php echo $e_Event_id;?>');    
        </script>
        <?php
      
    }else
    {
      echo "something went wrong try again!";        
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Css -->
    <link rel="stylesheet" href="./dist/styles.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="./dist/all.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
    <title>Parttake Dashboard</title>
    <style type="text/css">
        .alert-span{
            color: red;
        }
    </style>
</head>

<body>
<!--Container -->
<div class="mx-auto bg-grey-400">
    <!--Screen-->
    <div class="min-h-screen flex flex-col">
        <!--Header Section Starts Here-->
        
        <!--/Header-->

        <div class="flex flex-1">
            <!--Sidebar-->
            <?php
                include('Sidebar.php');
            ?>
            <!--/Sidebar-->
            <!--Main-->
            <main class="bg-white-300 flex-1 p-3 overflow-hidden">
                <form class=""  method="post" onkeyup="return validation()" name="myform">
                <div class="row">

                    <div class="col-lg-4 col-md-4 col-sm-4 m-1">
                        <input class=" w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="cus_amount" name="amount_spend" type="text" required="" placeholder="Amount" aria-label="Name">
                        <span class="alert-span" id="alert-span"></span>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 m-1">
                        <input class="w-full  px-5 py-2 text-gray-700 bg-gray-200 rounded" id="cus_name" name="exepence_name" type="text" required="" placeholder="Expense Name" aria-label="Name">
                    </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 m-1">
                            <button class=" px-4 py-2  text-white font-light  bg-gray-900 rounded" name="submit" id="add_member" value=$data type="submit">add</button>
                            <?php
                            echo "<a href=\"end_event.php?data=".$data."\" class=\" px-4 py-2  text-white font-light  bg-gray-900 rounded\" name=\"End_event\">End Event</a>";
                            ?>
                        </div>
                       
                        
                </div>
                        <span class="alert-span" id="c_expense"> </span>

                        </form><br>
                
                <?php
                    $con = mysqli_connect("localhost","root","","parttake") or die("connection failed");
                    $sql="select * from expense where event_id=$data";
                    $quary = mysqli_query($con,$sql);

                    $sql_event_name = "select event_name from event where event_id = $data";
                    $query_event_name = mysqli_query($con,$sql_event_name);


                    while($row1 = mysqli_fetch_assoc($query_event_name)){
                        $e_name = $row1['event_name'];
                        $d_e_name = dycrypt($e_name);
                    }

                    $sqlcount="select count(*) as total_members from event_members where event_id=$data";
                    $quarycount = mysqli_query($con,$sqlcount);

                    $total_members = mysqli_fetch_assoc($quarycount);
                    $total_members['total_members'];
                ?>
                <b><?php echo "<p class=\"text-gray-800 font-medium text-center text-lg font-bold\">".$d_e_name."</p>"; ?></b><br>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                          <th scope="col" colspan="5" class="text-center">EXPENSES</th>
                        </tr>
                    </thead>
                    <thead class="thead-dark">
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Spend By</th>
                          <th scope="col">Spend On</th>
                          <th scope="col">Amount</th>
                          <th scope="col">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php

                    $total = 0;
                    $average = 0;
                    // $expense_by_person = array();
                    $no = 1;

                    while($row = mysqli_fetch_assoc($quary))
                    { 
                        $spend_on = $row["exepence_name"];
                        $amount = $row["amount_spend"];
                        $total = $total+$amount;
                        $date = $row["amount_spend_on_date"];
                        $person_id = $row["user_id"];

                        $sql1="select user_name from users where user_id=$person_id";
                        $quary1 = mysqli_query($con,$sql1);                       

                        while($row1 = mysqli_fetch_assoc($quary1))
                        { 
                            $person_name = $row1["user_name"];
                        }

                        // array_push($expense_by_person, array($person_name,$person_expense));

                        $d_person_name = dycrypt($person_name);
                        $d_spend_on = dycrypt($spend_on);

                        echo "<tr>
                          <th scope=\"row\">".$no."</th>
                          <td>".$d_person_name."</td>
                          <td>".$d_spend_on."</td>
                          <td>".$amount."</td>
                          <td>".$date."</td>
                        </tr>";

                        $no = $no+1;
                    }

                    ?>
                    </tbody>
                </table>
                <br>


                <table class="table mb-2">
                    <thead class="thead-dark">
                        <tr>
                          <th scope="col" colspan="4" class="text-center">SPLITTING</th>
                        </tr>
                    </thead>
                    <thead class="thead-dark">
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Name</th>
                          <th scope="col">Total amount</th>
                          <th scope="col">Owes</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $i = 0;


                        // for($i = 0; $i<$total_members['total_members'];$i++)
                        //{
                            $owes = 0;
                            $average = 0;
                            $total_spend = 0;
                            $sqlname_id="select * from event_members where event_id=$data";
                            $query_name_id = mysqli_query($con,$sqlname_id);
                            $sql_total = "select sum(amount_spend) as total_amount from expense where event_id = $data";
                            $query_total = mysqli_query($con,$sql_total);

                            while($row_total = mysqli_fetch_assoc($query_total)){
                                $total_spend = $row_total['total_amount'];
                            } 

                            $average = $total_spend/$total_members['total_members'];

                            while($row_name_id = mysqli_fetch_assoc($query_name_id))
                            {
                                $user_id_name = $row_name_id['user_id'];

                                $sql_name = "select user_name from users where user_id = $user_id_name";
                                $query_name = mysqli_query($con,$sql_name);

                                while($row_name = mysqli_fetch_assoc($query_name)){

                                    $sqlsum="select sum(amount_spend) as total_expense_by_person from expense where user_id=$user_id_name and event_id = $data";
                                    $quarysum = mysqli_query($con,$sqlsum);
                                    $person_expense = '0';
                                    // echo $person_expense;
                                    while($rowsum = mysqli_fetch_assoc($quarysum))
                                    {    
                                        if ($rowsum["total_expense_by_person"] != '') {
                                            $person_expense = $rowsum["total_expense_by_person"];
                                        }
                                    } 
                                    $owes = $person_expense - $average;
                                    $total_name = $row_name['user_name'];
                                    $d_total_name = dycrypt($total_name);
                                    echo "<tr>
                                    <th scope=\"row\">".($i+1)."</th>
                                    <td>".$d_total_name."</td>
                                    <td>".$person_expense."</td>";




                                    if($owes<0)
                                    {
                                        echo "<td class=\"text-danger\">".(int)abs($owes)."</td></tr>";  
                                    }
                                    else{
                                        echo "<td class=\"text-success\">".(int)$owes."</td></tr>"; 
                                    }
                                    $i = $i+1;                            
                                }
                            }
    
                        //}

                        ?>
                        
                    </tbody>
                </table>


            </main>
            <!--/Main-->
        </div>
        <!--Footer-->
        
        <!--/footer-->

    </div>

</div>
<script src="js/Expenses.js"></script>

<script src="./main.js"></script>
<script type="text/javascript">
    function validation() {
    var expense = document.getElementById('cus_amount').value;
    // var expense = document.myform.expense.value;
    // alert(expense);
    var numbers = /^[0-9]*$/;

 if (!expense.match(numbers)) {

        document.getElementById("alert-span").innerHTML = "only number is allowed";
    }  else {
        document.getElementById("cus_name").innerHTML = "";
    }
}
</script>
</body>

</html>