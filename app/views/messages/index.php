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
                    <a class="text-black text-decoration-none aprevent" href="" onclick="chatroomInit(<?php echo $user->id; ?>);">
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

            <ul class="nav color-lump d-flex align-items-center justify-content-between chatusernow">
                <?php if (isset($data['chatusernow'])) : ?>
                    <li class="nav-item ms-4">
                        <div class="message">
                            <div class="avatar">
                                <img src="<?php echo URLROOT; ?><?php echo empty($data['chatusernow']->profile_picture) ? '/img/alien.jpg' : $data['chatusernow']->profile_picture; ?>" alt="This is the photo">
                            </div>
                            <div class="friend">
                                <div class="user text-white ms-3 fs-4"><?php echo $data['chatusernow']->nickname ?></div>
                            </div>
                        </div>
                    </li>
                <?php endif ?>
            </ul>


            <!-- chatroom聊天室 -->
            <!-- <?php echo empty($data['messages']) ? "" : "chatspacecss" ?> -->
            <div class="chatspace chatspacecss">

                <?php if (empty($data['chatusernow'])) : ?>
                    <div class="emptychatuser">
                        <img class="startchat" src="<?php echo URLROOT; ?>/img/icon/startchat_icon.svg" alt="">
                        <h3>選擇聊天對象開始聊天</h1>
                    </div>
                <?php else : ?>
                    <?php foreach ($data['messages'] as $message) : ?>
                        <?php if ($message->to_user == $_SESSION['user_id']) : ?>
                            <div class="d-flex justify-content-start">
                                <div class="chat-bubble-left">
                                    <?php echo $message->message; ?>
                                </div>
                            </div>
                        <?php else : ?>
                            <div class="d-flex justify-content-end">
                                <div class="chat-bubble-right">
                                    <?php echo $message->message; ?>
                                </div>
                            </div>
                        <?php endif ?>
                    <?php endforeach; ?>
                <?php endif ?>

            </div>
            <div class="type">
                <?php if (isset($data['chatusernow'])) : ?>
                    <div class="message-input container-fluid d-flex">
                        <div class="input-group">
                            <input class="form-control rounded-pill" type="text" placeholder="傳送訊息" id="typearea" aria-label=".form-control-lg example">
                            <button class="btn btn-link" type="button" id="button-addon2" onclick="sendMessage(<?php echo $_SESSION['user_id'] ?>, <?php echo $data['chatusernow']->id ?>)">Send</button>
                        </div>
                    </div>
                <?php endif ?>
            </div>

        </div>


        <?php require APPROOT . '/views/inc/footer.php'; ?>