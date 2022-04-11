<!doctype html>
<html lang="en">

<head>
  <title>Login</title>
  <meta charset="utf-8">
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
</head>

<body class="h-screen font-sans login bg-cover">
<div class="container mx-auto h-full flex flex-1 justify-center items-center">
  <div class="w-full max-w-lg">
    <div class="leading-loose">
      <form class="max-w-xl m-4 p-10 bg-white rounded shadow-xl" action="loginForm.php" method="post" onkeyup="return validation()" name="myform">

        <p class="text-gray-800 font-medium text-center text-lg font-bold">Login</p>
        <div class="">
          <label class="block text-sm text-gray-00" for="username">Username</label>
          <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="username" name="email" type="email"  placeholder="User Email" aria-label="username">
          <span id="c_email"></span>
        </div>
        <div class="mt-2">
          <label class="block text-sm text-gray-600" for="password">Password</label>
          <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" id="password" name="password" type="password" required="" placeholder="*******" aria-label="password">
          <span id="c_pass"></span>
        </div>
        <div class="mt-4 items-center justify-between text-center">
          <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" name="submit" type="submit">Login</button><br>
          
        </div>
        <div class="d-flex justify-content-between">
          <a class="text-center  align-baseline font-bold text-sm text-500 hover:text-blue-800" href="register.php">
            Not registered ?
          </a>
          <a class="inline-block float-right text-right right-0 align-baseline  font-bold text-sm text-500 hover:text-blue-800" href="Forget_pass.php">
              Forgot Password?
          </a>
        </div>
      </form>

    </div>
  </div>
</div>
<script type="text/javascript" src="js/login.js"></script>
</body>

</html>
