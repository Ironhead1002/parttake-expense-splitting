<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./dist/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
          crossorigin="anonymous">
    <style>
        .login{
            background: url('./dist/images/login-new.jpeg')
        }
        span{
            color: red;
        }
    </style>
    <title>Register</title>
</head>
<body class="h-screen font-sans login bg-cover">
<div class="container mx-auto h-full flex flex-1 justify-center items-center">
    <div class="w-full max-w-lg">
        <div class="leading-loose">
            <form class="max-w-xl m-4 p-10 bg-white rounded shadow-xl" action="registerForm.php" method="post" onkeyup="return validation()" name="myform">
                <p class="text-gray-800 font-medium text-center">Register</p>
                <div class="">
                    <label class="block text-sm text-gray-00" for="cus_name">Name</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="USER" name="user_name" type="text"  placeholder="Your Name" aria-label="Name">
                    <span id="c_name"></span>
                </div>
                <div class="mt-2">
                    <label class="block text-sm text-gray-600" for="cus_email">Email</label>
                    <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" id="EMAIL" name="email" type="text"  placeholder="Your Email" aria-label="Email">
                    <span id="c_email"></span>
                </div>
                <div class="mt-2">
                    <label class=" block text-sm text-gray-600" for="cus_email">Password</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="PASS" name="password" type="password"  placeholder="Password" >
                    <span id="c_pass"></span>
                </div>
                <div class="mt-2">
                    <label class=" text-sm block text-gray-600" for="cus_email">Contact</label>
                    <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded"  id="CON" name="user_contact_no" type="text"  placeholder="Contact" aria-label="Email">
                    <span id="c_contact"></span>
                </div>
               
                

                <div class="mt-4 text-center">
                    <button class="px-4 py-1 text-white  font-light tracking-wider bg-gray-900 rounded" type="submit" name="submit">Register</button>
                </div>
                <a class="align-baseline text-center font-bold text-sm text-500 hover:text-blue-800" href="index.php">
                   <div class="pt-2"> Already have an account ?</div>
                </a>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript" src="js/register.js"></script>
</body>
</html>