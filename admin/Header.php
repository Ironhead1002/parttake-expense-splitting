<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<header class="bg-nav">
            <div class="flex justify-content-between">
                <div class="p-1 mx-3 inline-flex items-center">
                    <i class="fas fa-bars pr-2 text-white" onclick="sidebarToggle()"></i>
                    <h3 class="text-white p-1">PARTTAKE</h3>
                </div>
                <div class=" pr-5 flex flex-row items-center">
                    <!-- <a href="https://github.com/tailwindadmin/admin" class="text-white p-2 mr-2 no-underline hidden md:block lg:block">Github</a> -->


                    <img onclick="profileToggle()"  class="inline-block h-8 w-8 rounded-full mr-2" src="https://image.shutterstock.com/image-vector/male-user-account-profile-circle-260nw-467503055.jpg" alt="">
                    <a href="#" onclick="profileToggle()" class="text-white  mr-3 no-underline hidden md:block lg:block"><?php echo $_SESSION['user_name'];?></a>
                    <div id="ProfileDropDown" class="rounded hidden shadow-md bg-white absolute pin-t mt-12 mr-1 pin-r">
                        <ul class="list-reset bg-light m-0">
                          <li><a href="Dashboard.php" class="no-underline dropdown-item  btn block text-black ">My account</a></li>
                          <li><hr class="border-t  border-grey-ligght"></li>
                          <li><a href="logout.php" class=" block text-black btn dropdown-item  hover:bg-grey-light">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>