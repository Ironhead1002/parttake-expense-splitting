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

$con = mysqli_connect("localhost","root","","parttake") or die("connection failed");
	
	if(isset($_POST['submit'])){
  $email = $_POST['email'];
  $password = $_POST['password'];

  $e_email = encrypt($email);
  $e_password = encrypt($password);

  $sql="select * from users where email='$e_email' and password='$e_password' ";
  $quary = mysqli_query($con,$sql);
  $cnt = mysqli_num_rows($quary);

  if ($cnt>0) 
  {
     while($row = mysqli_fetch_assoc($quary))
      { 
            $name = $row["user_name"];
            $name = dycrypt($name);
            $user_id = $row["user_id"];
            $_SESSION['user_unique_id'] = $user_id;
            $_SESSION['user_name']=$name;
      }
      //echo $name;
      header("location:Dashboard.php");

  }
  else
  {
    ?>
    <script>
     alert("password incorrect");
      location.replace('index.php');
    </script>
    <?php
  }

}

?>