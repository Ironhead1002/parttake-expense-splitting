<?php
   
   session_start();

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


   $con = mysqli_connect("localhost","root","","parttake") or die("connection failed");


   if(isset($_POST['submit'])){

   $Members = $_POST['Members'];
   $event_name = $_POST["event_name"];
   $e_event_name = encrypt($event_name);
   $user_id=$_SESSION['user_unique_id'];
   $event_creation_date = date("Y-m-d H:i:s");
   $event_status = "ongoing";
   $flag = 0;

   
   foreach((array)$Members as $unique_email){
      $e_unique_email = encrypt($unique_email);

      $query1 = "SELECT email from users WHERE email='$e_unique_email'";
      $result1 = mysqli_query($con,$query1);
      $cnt = mysqli_num_rows($result1);

      if($cnt <=0){
         ?>
         <script>
            alert("One of the Email Does not exist!!");
            location.replace('Add_Events.php');
         </script>
         <?php
         
         $flag = 1;
         break;
      }
      else{
         continue;
      }
   }

if($flag == 0){

   $query  = "INSERT INTO `event` (event_name, user_id,event_creation_date,event_status) VALUES ('{$e_event_name}','{$user_id}','{$event_creation_date}','{$event_status}')";

      if(mysqli_query($con, $query)){
        ?>
        <script>
         alert("Event created Successfully");
         location.replace('Dashboard.php');    
        </script>
        <?php
     
    }else
    {
      ?>
        <script>
         alert("Something went wrong try again!!");
         location.replace('Add_Events.php');    
        </script>
        <?php
    }

      $new_id = mysqli_insert_id($con);
      $sql2 = "INSERT INTO event_members (user_id,event_id) VALUES ('$user_id',$new_id)";
      $query_run2 = mysqli_query($con, $sql2);

      foreach ((array)$Members as $value) {
      $e_value = encrypt($value);
      $sql1 = "SELECT user_id from users where email = '$e_value'";

      $result2 = $con-> query($sql1);
      if($result2-> num_rows > 0){
         while($row = mysqli_fetch_array($result2))
         {
             $value = $row['user_id'];
         }
      }
      $sql = "INSERT INTO event_members (user_id,event_id) VALUES ('$value',$new_id)";
      $query_run = mysqli_query($con, $sql);

    }
   
}
}
   
?>