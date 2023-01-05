<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Playfair+Display&family=Poppins:wght@200&family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/message.css">
    <title><?php echo SITENAME; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div class="container1">
        <div class="side">
            <ul class="nav color-stable d-flex align-items-center justify-content-between">
                <li class="nav-item">
                    <div class="message">
                        <div class="avatar">
                            <img src="<?php echo URLROOT; ?><?php echo $_SESSION['user_profilepic'] ?>" alt="This is the photo">
                        </div>
                        <div class="friend">
                            <div class="user text-white ms-2 fs-4"><?php echo $_SESSION['user_nickname'] ?></div>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="" href="<?php echo URLROOT; ?>/messages/match">
                        <img class="functionicon" src="<?php echo URLROOT; ?>/img/icon/match_icon.svg" alt="">
                    </a>
                    <a class="" href="<?php echo URLROOT; ?>/messages" onclick="">
                        <img class="functionicon" src="<?php echo URLROOT; ?>/img/icon/chat_icon.svg" alt="">
                    </a>
                    <a href="<?php echo URLROOT; ?>/users/logout">
                        <img class="functionicon" src="<?php echo URLROOT; ?>/img/icon/logout_icon.svg" alt="">
                    </a>
                    <!-- <a class="nav-link text-white" href="<?php echo URLROOT; ?>/users/logout">ddd</a> -->
                </li>
            </ul>

            <div class="chatlist">

                <?php foreach ($data['userlist'] as $user) : ?>
                    <a class="text-black text-decoration-none" href="<?php echo URLROOT; ?>/messages/<?php echo $user->id; ?>" onclick="changeChatUser(<?php echo $user->id; ?>);">
                        <div class="message">
                            <div class="avatar">
                                <img src="<?php echo URLROOT; ?><?php echo empty($user->profile_picture) ? '/img/alien.jpg' : $user->profile_picture; ?>" alt="error">
                            </div>
                            <div class="friend">
                                <div class="user"><?php echo $user->nickname; ?></div>
                                <div class="text"><?php echo $user->message; ?></div>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>

            </div>

        </div>

        <div class="chatroom">
            <!-- chatroom上排navbar -->
            <!-- <ul class="nav color-lump d-flex align-items-center justify-content-between chatusernow">

            </ul> -->

            <!-- chatroom聊天室 -->
            <!-- <?php echo empty($data['messages']) ? "" : "chatspacecss" ?> -->
            <div class="matchspace">
                <div class="card" style="width: 25rem">
                    <div class="matchusernow">
                        <img src="<?php echo URLROOT; ?><?php echo $data['matchusernow']->profile_picture ?>" class="matchimg" alt="...">
                        <p class="matchname"><?php echo $data['matchusernow']->nickname ?></p>
                    </div>
                    <div class="card-body">
                        <div class="d-flex matchoption">
                            <a class="aprevent" href="" onclick="dislike();">
                                <img class="dislike" src="<?php echo URLROOT; ?>/img/icon/dislike_icon.svg" alt="">
                            </a>
                            <a class="aprevent" href="" onclick="like();">
                                <img class="like" src="<?php echo URLROOT; ?>/img/icon/like_icon.svg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php require APPROOT . '/views/inc/footer.php'; ?>