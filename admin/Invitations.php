<?php
session_start();
if($_SESSION['user_name']==true){

}else{
    header('location:index.php');
}
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
            <main class="bg-white-300 flex-1 p-3 overflow-hidden">
                <div class="d-inline">
                    <div class="alert alert-primary alert-dismissible fade show d-flex justify-content-between" role="alert">
                        Ramani has invited you to join the event named Mumbai Trip 
                        <div class="text-right ">
                            <button class="btn btn-success text-right mr-2"> Accept </button>
                            <button class="btn btn-danger text-right ml-2 "> Reject </button>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <!--Footer-->
       
        <!--/footer-->

    </div>

</div>
<script src="./main.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>