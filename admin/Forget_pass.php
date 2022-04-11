<?php
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
?>
<!doctype html>
<html lang="en">

<head>
  <title>Login | Tailwind Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="./dist/styles.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
    crossorigin="anonymous">
  <style>
  .login{
    background: url('./dist/images/login-new.jpeg')
  }
  </style>  
</head>

<body class="h-screen font-sans login bg-cover">
<div class="container mx-auto h-full flex flex-1 justify-center items-center">
  <div class="w-full max-w-lg">
    <div class="leading-loose">
      <form class="max-w-xl m-4 p-10 bg-white rounded shadow-xl" method="post">
        <p class="text-gray-800 font-medium text-center text-lg font-bold">Forgot Password</p>
        <div class="">
          <label class="block text-sm text-gray-00" for="username">Email</label>
          <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="username" name="email" type="email" required="" placeholder="User Email" aria-label="username">
        </div>
        
        <div class="mt-4 items-center justify-between text-center">
          <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" name="submit" type="submit">Send Password</button><br>
          
        </div>
        <div class="d-flex justify-content-between">
          <a class="text-center  align-baseline font-bold text-sm text-500 hover:text-blue-800" href="index.php">
            Go Back to Login
          </a>
         
        </div>
      </form>

<?php
  if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $e_email = encrypt($email);
    $d_password = "";
    $con = mysqli_connect("localhost","root","","parttake") or die("connection failed");
    $sql = "select password from users where email = '$e_email'";
    
    if($query = mysqli_query($con,$sql)){
    while($row1 = mysqli_fetch_assoc($query)){
        $e_password = $row1['password'];
        $d_password = dycrypt($e_password);
    }
    $msg = "Your password is ".$d_password;
    mail($email, "Your Password", $msg);
    ?>
    <script>
      alert("Password has being sent to your email");
      location.replace('index.php');
    </script>
    <?php
  }
  else
  {
    ?>
    <script>
      alert("This email is not registered with us");
      location.replace('index.php');
    </script>
    <?php
  }
}
?>

    </div>
  </div>
</div>
</body>

</html>
