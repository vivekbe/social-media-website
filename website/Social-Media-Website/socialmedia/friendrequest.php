<?php
 session_start();
 if(!(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)){
    // redirect them to your desired location
    header('location:index.php');
    exit;
  }
include '_dbconnect.php';
  $id = $_SESSION['sno'];
  $sql = "SELECT * FROM `friendlist` WHERE  targetID = '$id' AND status= '0'";
  $result = mysqli_query($conn, $sql);

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

    .results {
        width: 50vw;
        margin: auto;
    }

    nav {
        top: 0;
        left: 0;
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

    <div class="results" style="margin-top:60px;">
        <div class="card position-relative">
            <ul class="list-group list-group-flush">
                <?php
                   if(mysqli_num_rows($result)){
                   while($row = mysqli_fetch_assoc($result)){
                    $sno = $row['sourceID'];
                    $sql2 = "SELECT * FROM `user` WHERE `sno` = '$sno' ";
                    $result2 = mysqli_query($conn,$sql2);
                    $row2 = mysqli_fetch_assoc($result2);
                    $name = $row2['name'];
                    echo "<li class='list-group-item'><span style='margin-right:8px;'><i class='fa-solid fa-user'></i></span><a class='link-dark' href='profile.php?sno=$sno' style='font-size:19px;text-decoration:none;'>$name</a><span style='float:right;'><form  action='_acceptrequest.php' method='post'><button type='submit' class='btn btn-primary' name='friend' value = '$sno'>Accept Request</button></form></span></li>";
                   }
                   }else{ echo "<h3 style='margin:auto;'>No New Friend Requests</h3>";
                }
                
                ?>
            </ul>
        </div>
    </div>

</body>

</html>