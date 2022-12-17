<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?></title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/user_style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Dancing+Script">
</head>

<body>

    <nav class="navbar navbar-expand-lg color-lump">
        <div class="container">
            <a class="navbar-brand" href="#">
                <font color="white" size="7" face="Dancing Script">COLA</font>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <?php if(isset($_SESSION['user_id'])) : ?>
                    <li class="nav-item ">
                        <div class="nav-link text-white"><?php echo $_SESSION['user_nickname']?>,Welcome</div>
                    </li>
                    <li class="nav-item ">
                        <a class="btn nav-link text-white" href="<?php echo URLROOT; ?>/users/logout">Logout</a>
                    </li>
                    <?php else : ?>
                    <li class="nav-item">
                        <a class="btn nav-link text-white" aria-current="page" href="<?php echo URLROOT; ?>/users/register">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn nav-link text-white" href="<?php echo URLROOT; ?>/users/login">Login</a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- <div class="color-lump">
        <div class="container">
            <font color="white" size="7" face="Dancing Script">COLA</font>
        </div>
    </div> -->