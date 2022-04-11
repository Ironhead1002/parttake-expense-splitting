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

if($_SESSION['user_name']==true){

}else{
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Css -->
    <link rel="stylesheet" href="./dist/styles.css">
    <link rel="stylesheet" href="./dist/all.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
    <title>Parttake Dashboard</title>
</head>

<body>
<!--Container -->
<div class="mx-auto bg-grey-400">
    <!--Screen-->
    <div class="min-h-screen flex flex-col">
        <!--Header Section Starts Here-->
        <?php
            include('header.php');
        ?>
        <!--/Header-->

        <div class="flex flex-1">
            <!--Sidebar-->
            <?php
                include('Sidebar.php');
            ?>
            <!--/Sidebar-->
            <!--Main-->
            <main class="bg-white-300 flex-1 p-3 overflow-hidden">

                <div class="flex flex-col">
                    <!-- Stats Row Starts Here -->
                        <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2 d-flex">

                        <?php
                        $id = $_SESSION['user_unique_id'];
                        $con = mysqli_connect("localhost","root","","parttake") or die("connection failed");
                        $sql="SELECT event.event_name,event.event_id
                              FROM event
                              INNER JOIN event_members
                              ON event.event_id=event_members.event_id where event.event_status = 'ongoing' and event_members.user_id = $id";

                        $quary = mysqli_query($con,$sql);
                        $cnt = mysqli_num_rows($quary);

                        while($result = mysqli_fetch_array($quary))
                        {
                            $var_event_name = $result['event_name'];
                            $d_var_event_name = dycrypt($var_event_name);
                            $unique_event_id = $result['event_id'];
                            $e_unique_event_id = encrypt($unique_event_id);

                            $sql_total = "select sum(amount_spend) as total_amount from expense where event_id = $unique_event_id";
                            $query_total = mysqli_query($con,$sql_total);

                            $total_expense = 0;
                            
                            while($row_total = mysqli_fetch_assoc($query_total)){

                                if ($row_total["total_amount"] != '') {
                                    $total_expense = $row_total['total_amount'];
                                }
                                
                            }

                            echo "<a href=\"Expenses.php\">

                                    <div class=\"shadow-lg bg-red-vibrant border-l-8  hover:bg-red-vibrant-dark border-red-vibrant-dark mb-2 p-2  md:w-1/4 mx-2 event-div\">
                                        <div class=\"p-4 flex flex-col\">
                                            <a href=\"Expenses.php?data=".$e_unique_event_id."\" class=\"no-underline text-white text-2xl\">"
                                                .$d_var_event_name."
                                            </a>
                                        </div>
                                        <div class=\"p-4\">
                                            <a href=\"Expenses.php?data=".$e_unique_event_id."\" class=\"no-underline text-white text-lg align-items-end align-text-bottom\">"
                                                .$total_expense.
                                            "</a>
                                        </div>
                                    </div>
                                </a>";
                        }
                        ?>

                        
                    </div>
                </div>
            </main>
            <!--/Main-->
        </div>
        <!--Footer-->
        
        <!--/footer-->

    </div>

</div>
<script src="./main.js"></script>
</body>

</html>