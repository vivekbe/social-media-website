<?php
 session_start();
 if(!(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)){
    // redirect them to your desired location
    header('location:index.php');
    exit;
}
?>

<?php
 include '_dbconnect.php';
 if (!$conn) {
    //echo "Database connection failed!: " . mysqli_connect_error();
    header('location:index.php');
    }
    if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['sno'])){
        $user_id =   $_GET['sno'];
    }
    else{
        $user_id= $_SESSION['sno'];
    }
 
 $sql = "SELECT * FROM posts WHERE `sno`= '$user_id' ORDER BY `post_dt` DESC";
 $result = mysqli_query($conn,$sql);
 $sql2 = "SELECT * FROM user where sno= '$user_id' ";
 $query2 = mysqli_query($conn,$sql2);
 $row2 = mysqli_fetch_assoc($query2);
 $name = $row2['name'];
 
?>

<!Doctype html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous">
    </script>

    <script src="https://kit.fontawesome.com/787f18bed8.js" crossorigin="anonymous"></script>
    <style>
    body {
        background-color: #f0f2f5;
    }

    textarea::placeholder {
        font-size: 1.5rem;
    }

    textarea {
        resize: none;
    }
    nav{
        top:0;
        left:0;
    }
    .results{
        width: 50vw;
        margin: auto;
    }
    </style>
</head>

<body>
    <!-- Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="position:fixed;width:100% !important;z-index:1;box-shadow:1px 1px 2px rgb(0 0 0 / 10%);">
        <div class="container-fluid justify-content-between">
            <!-- Left elements -->
            <div class="d-flex">
                <!-- Brand -->
                <a class="navbar-brand me-4 mb-1 d-flex align-items-center" href="feed.php">
                    <img src="https://www.gehu.ac.in/content/dam/gehu/about/GEHU-logo.svg" height="20" alt="Logo"
                        loading="lazy" style="margin-top: 2px;" />
                </a>

                <!-- Search form -->
                <form class="input-group w-auto my-auto d-none d-sm-flex" action = "search.php" method="get">
                    <input autocomplete="off" type="search" class="form-control rounded" placeholder="Search" name="searchname"
                        style="min-width: 125px;"   />
                    <button class="btn btn-primary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
                
            </div>
            <!-- Left elements -->

            <!-- Center elements -->
            <ul class="navbar-nav flex-row d-none d-md-flex " style="gap:32px;">
                <li class="nav-item me-3 me-lg-1 active">
                    <a class="nav-link" href="feed.php">
                        <span><i class="fas fa-home fa-lg"></i></span>
                    </a>
                </li>

                <li class="nav-item me-3 me-lg-1">
                    <a class="nav-link" href="#">
                        <span><i class="fas fa-video fa-lg"></i></span>
                    </a>
                </li>


                <li class="nav-item me-3 me-lg-1">
                    <a class="nav-link" href="#">
                        <span><i class="fas fa-users fa-lg"></i></span>
                    </a>
                </li>
            </ul>
            <!-- Center elements -->

            <!-- Right elements -->
            <ul class="navbar-nav flex-row">
                <li class="nav-item dropdown me-3 me-lg-1">
                    <a class="nav-link dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-comments fa-lg"></i>

                        <span class="badge rounded-pill badge-notification bg-danger">1</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                        <li>
                            <a class="dropdown-item" href="#">Some news</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Another news</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown me-3 me-lg-1">
                    <a class="nav-link dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-bell fa-lg"></i>
                        <span class="badge rounded-pill badge-notification bg-danger">1</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                        <li>
                            <a class="dropdown-item" href="#">Some news</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Another news</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown me-3 me-lg-1">
                    <a class="nav-link dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-user"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                        <li>
                            <a class="dropdown-item" href="profile.php"><span style="margin-right:8px;"><i class="fa-solid fa-user"></i></span><?php echo $_SESSION['name']; ?></a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="friendrequest.php">Friend Requests</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="_logout.php">Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Right elements -->
        </div>
    </nav>
    <!-- Navbar -->
        <div class="card bg-light" style="width:50vw;margin:60px auto 20px;border-radius: 15px;box-shadow:1px 1px 2px rgb(0 0 0 / 10%); ">
          <div class="card-body p-4">
            <div class="d-flex text-black">
              <div class="flex-shrink-0">
                <img src="images/img1.png"
                  alt="Generic placeholder image" class="img-fluid"
                  style="width: 180px; border-radius: 10px;">
              </div>
              <div class="flex-grow-1 ms-3">
                <h5 class="mb-1"><?php echo $name ;?></h5>
                <p class="mb-2 pb-1" style="color: #2b2a2a;"><?php echo $row2['batch'] ;?></p>
                <div class="d-flex justify-content-start rounded-3 p-2 mb-2"
                  style="background-color: #efefef;">
                  <div>
                    <p class="small text-muted mb-1">Articles</p>
                    <p class="mb-0">41</p>
                  </div>
                  <div class="px-3">
                    <p class="small text-muted mb-1">Followers</p>
                    <p class="mb-0">976</p>
                  </div>
                  <div>
                    <p class="small text-muted mb-1">Rating</p>
                    <p class="mb-0">8.5</p>
                  </div>
                </div>
                <div class="d-flex pt-1">
                  <button type="button" class="btn btn-outline-primary me-1 flex-grow-1">Message</button>
                  <button type="button" class="btn btn-primary flex-grow-1">Friend Request</button>
                </div>
              </div>
            </div>
          </div>
        </div>
    <div class="results" >
        <div class="card position-relative">
            <ul class="list-group list-group-flush">
                <?php
                   if(mysqli_num_rows($result)){
                    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                        $description=$row["post_text"];
                        $id=$row["post_id"];
                        $time = $row['post_dt'];
                        echo "
                        <div class='card' style='margin-bottom:10px;box-shadow: 0 1px 2px rgb(0 0 0 / 10%), 0 1px 2px rgb(0 0 0 / 10%);'>
                        <div class='card-body'>
                        <h5 class='card-title'><span style='margin-right:8px;'><i class='fa-solid fa-user'></i></span>$name</h5>
                        <p class='text-muted' style='font-size:10px;margin-top:0px; margin-bottom:10px;'>$time</p>
                        <p class='card-text'> $description</p>
                        </div>
                        </div>";
                        }
                   }else{ echo "<h3 style='margin:auto;'>No Post Found</h3>";
                }
                
                
                ?>
            </ul>
        </div>
    </div>
</body>
</html>