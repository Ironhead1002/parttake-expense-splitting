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

if($_SESSION['user_name']==true){

}else{
    header('location:index.php');
}
?>
<?php
$con = mysqli_connect("localhost","root","","parttake") or die("connection failed");
$user_id=$_SESSION['user_unique_id'];
$sql = "SELECT * from users where user_id= $user_id";

        $result = $con-> query($sql);
        if($result-> num_rows > 0){
            while($row = mysqli_fetch_array($result))
            {
                $d_name = $row['user_name'];
                $d_email = $row['email'];
                $d_password = $row['password'];
                $d_contact = $row['user_contact_no'];

                $d_name = dycrypt($d_name);
                $d_email = dycrypt($d_email);
                $d_password = dycrypt($d_password);
                $d_contact = dycrypt($d_contact);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Css -->
    <link rel="stylesheet" href="./dist/styles.css">
    <link rel="stylesheet" href="./dist/all.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Invitations</title>
    <style>
        .login{
            background: url('./dist/images/login-new.jpeg')
        }
        .validate{
            color: red;
        }
    </style>
</head>

<body>
<!--Container -->
<div class="mx-auto bg-gray-lightest">
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
            <!--/Main-->
            <div class="container mx-auto h-full flex flex-1 justify-center items-center">
    <div class="w-full max-w-lg">
        <div class="leading-loose">
            <form class="max-w-xl m-4 p-10 bg-white rounded shadow-xl" method="post" action="update_profile.php" onkeyup="return validation()" name="myform">
                <p class="text-gray-800 font-medium text-center font-weight-bold">Your Details</p>
                <div class="">
                    <label class="block text-sm text-gray-00" for="cus_name">Name</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="USER" name="user_name" type="text" value="<?php echo $d_name;?>"  placeholder="Your Name" aria-label="Name">
                    <span class="validate" id="c_name"></span>
                </div>
                <div class="mt-2">
                    <label class="block text-sm text-gray-600" for="cus_email">Email</label>
                    <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" id="EMAIL" name="email" type="text" value="<?php echo $d_email;?>"  placeholder="Your Email" aria-label="Email">
                    <span class="validate" id="c_email"></span>
                </div>
                <div class="mt-2">
                    <label class=" block text-sm text-gray-600" for="cus_email">Password</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="PASS" name="password" type="text" value="<?php echo $d_password;?>" placeholder="Password" >
                    <span class="validate" id="c_pass"></span>
                </div>
                <div class="mt-2">
                    <label class=" text-sm block text-gray-600" for="cus_email">Contact</label>
                    <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded"  id="CON" name="user_contact_no" type="text" value="<?php echo $d_contact;?>"  placeholder="Contact" aria-label="Email">
                    <span class="validate" id="c_contact"></span>
                </div>
               
                

                <div class="mt-4 text-center">
                    <button class="px-4 py-1 text-white  font-light tracking-wider bg-gray-900 rounded" type="submit" name="submit">Update</button>
                </div>
                
            </form>
        </div>
    </div>
</div>
    </div>
        <!--Footer-->
       
        <!--/footer-->

    </div>

</div>
<script type="text/javascript" src="js/register.js"></script>
<script src="./main.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<?php
}}
?>
</body>

</html>