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

$user_id=$_SESSION['user_unique_id'];
$name = $_POST['user_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$contact = $_POST['user_contact_no'];

$e_name = encrypt($name);
$e_email = encrypt($email);
$e_password = encrypt($password);
$e_contact = encrypt($contact);


$query = "UPDATE users set user_name = '$e_name',email='$e_email',password = '$e_password',user_contact_no='$e_contact' where user_id='$user_id'";
        $result   = mysqli_query($con, $query);
        if ($result) {
            ?>
                <script>
                    alert ('Update Successfully ');
                    location.replace('Account_Settings.php');
                </script>
            <?php
        }else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  </div>";
        }
?>