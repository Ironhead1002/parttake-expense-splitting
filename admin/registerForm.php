<?php
$con = mysqli_connect("localhost","root","","parttake") or die("connection faild");

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

if (isset($_POST['submit'])) {

	$name = $_POST['user_name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$contact = $_POST['user_contact_no'];

    $e_name = encrypt($name);
    $e_email = encrypt($email);
    $e_pass = encrypt($password);
    $e_contact = encrypt($contact);

	$query  ="INSERT into users (user_name,email,password,user_contact_no) VALUES ('$e_name','$e_email','$e_pass','$e_contact')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            ?>
                <script>
                    alert ('You are Successfully Registered');
                    location.replace('index.php');
                </script>
            <?php
        }else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  </div>";
        }
     } else {

}

?>