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
                <div class="row">
                       
                        
                </div>
                
                <?php
                    
                    $con = mysqli_connect("localhost","root","","parttake") or die("connection failed");
                    $sql="select * from expense where event_id=$data";
                    $quary = mysqli_query($con,$sql);

                    $sql_event_name = "select event_name from event where event_id = $data";
                    $query_event_name = mysqli_query($con,$sql_event_name);


                    while($row1 = mysqli_fetch_assoc($query_event_name)){
                        $e_name = $row1['event_name'];
                    }
                    
                    $sqlcount="select count(*) as total_members from event_members where event_id=$data";
                    $quarycount = mysqli_query($con,$sqlcount);

                    $total_members = mysqli_fetch_assoc($quarycount);
                    $total_members['total_members'];
                ?>
                <div id='printable'>
                <b><?php echo "<p class=\"text-gray-800 font-medium text-center text-lg font-bold\">".dycrypt($e_name)."</p>"; ?></b><br>

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

                        echo "<tr>
                          <th scope=\"row\">".$no."</th>
                          <td>".dycrypt($person_name)."</td>
                          <td>".dycrypt($spend_on)."</td>
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
                                    echo "<tr>
                                    <th scope=\"row\">".($i+1)."</th>
                                    <td>".dycrypt($row_name['user_name'])."</td>
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
                    </div>
                    </tbody>
                </table>
                </div>
                <?php
                echo "<center><a href=\"#null\" class=\" px-4 py-2  text-white font-light  bg-gray-900 rounded\" onclick=\"printContent('printable')\">Print</a></center>";
                ?>

            </main>
            <!--/Main-->
        </div>
        <!--Footer-->
        
                        
        <!--/footer-->

    </div>

</div>
<script src="./main.js"></script>
<script
      src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
      integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
      crossorigin="anonymous"></script>
      <script type="text/javascript">
          $do
      </script>
<script src="js/Expenses.js"></script>
<script type="text/javascript">
<!--
function printContent(id){
str=document.getElementById(id).innerHTML
newwin=window.open('','printwin','left=100,top=100,width=400,height=400')
newwin.document.write('<HTML>\n<HEAD>\n')
newwin.document.write('<link rel=\"stylesheet\" type=\"text/css\" href=\"./dist/styles.css\"/>')
newwin.document.write('<link rel=\"stylesheet\" type=\"text/css\" href=\"css/style.css\"/>')
newwin.document.write('<link rel=\"stylesheet\" type=\"text/css\" href=\"./dist/all.css\"/>')
newwin.document.write('<link href=\"https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i\" rel=\"stylesheet\">')
newwin.document.write('<TITLE>Print Page</TITLE>\n')
newwin.document.write('<script>\n')
newwin.document.write('function chkstate(){\n')
newwin.document.write('if(document.readyState=="complete"){\n')
newwin.document.write('window.close()\n')
newwin.document.write('}\n')
newwin.document.write('else{\n')
newwin.document.write('setTimeout("chkstate()",2000)\n')
newwin.document.write('}\n')
newwin.document.write('}\n')
newwin.document.write('function print_win(){\n')
newwin.document.write('window.print();\n')
newwin.document.write('chkstate();\n')
newwin.document.write('}\n')
newwin.document.write('<\/script>\n')
newwin.document.write('</HEAD>\n')
newwin.document.write('<BODY onload="print_win()">\n')
newwin.document.write(str)
newwin.document.write('</BODY>\n')
newwin.document.write('</HTML>\n')
newwin.document.close()
}
//-->
</script>
</body>

</html>