<head>
    <title>Hotel Dominic Indonesia</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/d1dd01a62e.js" crossorigin="anonymous"></script>
    <link href="./assets/bootstrap-4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./jQuery/jQuery-3.5.1.min.js"></script>
</head>

<style>
    body{
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }
    nav {
        font-size: 1.5vw;
        
    }
    div{
        font-size: 1.5vw;
    }
</style>
<body>
<!-- header -->
<header>
    <nav class="navbar navbar-expand-lg navbar-light px-5 bg-dark fixed-top">
        <a class="navbar-brand" href="index_admin.php" style="font-size: 2vw;"> <font color="#F6F1E3" style="font-family: 'Times New Roman', Times, serif"><b>DOMINIC</b></font> </a>
        <button style="font-size: 1vw; background-size: 1vw; background: #999;" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
          <ul class="navbar-nav mr-auto my-2 my-lg-0 navbar-nav-scroll" style="max-height: 180px;">
            <li class="nav-item">
                <a class="nav-link" href="home_admin.php"><font color="#F6F1E3">Hotel</font></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="ulasan.php"><font color="#F6F1E3">Ulasan</font></a>
            </li>
            <li class="nav-item" >
                <a class="nav-link" href="signin.php"><font color="#F6F1E3">Sign in</font></a>
            </li>
            <li class="nav-item" >
                <a class="nav-link" href="logout.php"><font color="#F6F1E3">Log Out</font></a>
            </li>
          </ul>
          <form class="d-flex">
            <input style="font-size: 1vw; " class="form-control mr-2" type="search" placeholder="Search" aria-label="Search" >
            <button class="btn border-dark" type="submit" style="font-size: 1vw; background-size: 1vw; background:#999;">
                <i style="font-size: 1vw; color: #F6F1E3;" class="fas fa-search"></i>
            </button>
            <a class="btn border-dark" style="font-size: 1vw; background-size: 1vw; background:#999;" href="profil_admin.php?id=1">
            <i class="fas fa-user-circle" style="font-size: 1.2vw;"></i>
            </a>
          </form>
          
        </div>
      </nav>
</header>