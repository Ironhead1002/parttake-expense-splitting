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
    <title>Add Events</title>
    <style type="text/css">
        .alert-span{
            color: red;
        }
    </style>
</head>

<body>
<!--Container -->
<div class="mx-auto bg-grey-lightest">
    <!--Screen-->
    <div class="min-h-screen flex flex-col">
        <!--Header Section Starts Here-->
        <?php
            include('header.php');
        ?>
        <!--/Header-->

        <div class="flex flex-1 d-flex">
            <!--Sidebar-->
            <?php
                include('Sidebar.php');
            ?>
            <!--/Sidebar-->
            <!--/Main-->
            <div class="container mx-auto h-full flex flex-1 justify-center items-center p-5">
                <div class="w-full max-w-lg">
                    <div class="leading-loose">
                        <form class="max-w-xl m-4 p-10 bg-white rounded shadow-xl" action="Add_Events_form.php" method="post" onkeyup="return validation()" name="myform">
                            <p class="text-gray-800 font-medium text-center text-lg font-bold">Add Events</p>

                            <div class="">
                                <label class="block text-sm text-gray-00" for="cus_name">Events Name</label>
                                <input class=" px-5 py-1 text-gray-700 bg-gray-200 rounded" id="cus_name" name="event_name" type="text" required="" placeholder="Events Name" aria-label="Name">
                                <span class="alert-span" id="e_name"></span>
                            </div>

                            <div class="mt-2"  id="add_field">
                                <label class="block text-sm text-gray-600" for="cus_email">Members</label>
                                <input class=" px-5  py-1 text-gray-700 bg-gray-200 rounded"  name="Members[]" type="email" required="" placeholder="Members Email" >
                            </div>

                            <button class="px-4 py-1 mt-3 text-white font-light tracking-wider bg-gray-900 rounded"name="submit" id="add_member" type="button">Add </button>

                            <div class="mt-4 items-center justify-between text-center">
                                <button class="px-4 py-1 mt-3 text-white font-light tracking-wider bg-gray-900 rounded" name="submit" type="submit">Add Event</button>
                                <br>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <!--/Main-->

        </div>
        <!--Footer-->
       
        <!--/footer-->

    </div>

</div>

<script src="./main.js"></script>
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous">
</script>
<script src="js/Add_Events.js"></script>
<script src="js/Add_Events_validation.js"></script>

</body>

</html>