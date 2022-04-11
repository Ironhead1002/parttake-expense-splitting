<?php
   
   session_start();
   $con = mysqli_connect("localhost","root","","parttake") or die("connection failed");

   if($_SESSION['user_name']==true){
      
   }else{
   header('location:index.php');
   }
?>
<?php
   if(isset($_POST['submit'])){
      $amount = $_POST["expense"];
      $expense_name = $_POST["e_name"];
      $user_id=$_SESSION['user_unique_id'];
      $expense_date = date("Y-m-d H:i:s");
      $current_eventid = $_POST["submit"];

      $sql="select event_name from event where event_id='$current_eventid'";
      $quary = mysqli_query($con,$sql);

      while($row = mysqli_fetch_assoc($result1))
      {
         $event_name = $row["event_name"];
      }

      $sql1  = "INSERT INTO `expense` (user_id,event_id,expence_name,amount_spend,amount_spend_on_date) VALUES ('{$user_id}','{$current_eventid}','{$expence_name}','{$amount}','{$expense_date}')";
   if(mysqli_query($con, $sql1)){
        ?>
        <script>
         alert("Expense Added Successfully");
         location.replace('Expenses.php');    
        </script>
        <?php
     
    }else
    {
      ?>
        <script>
         alert("Something went wrong try again!!");
         location.replace('Expenses.php');    
        </script>
        <?php
    }
   }
?>
