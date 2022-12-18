<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/message_style.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Playfair+Display&family=Poppins:wght@200&family=Roboto:wght@300&display=swap" rel="stylesheet">
    <title>Cola</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div class="container1">
        <div class="side">
            <!-- <nav class="navbar navbar-expand-lg color-lump">
                <div class="container">
                    <a class="navbar-brand" href="#">
                        <font color="white" size="7" face="Dancing Script">COLA</font>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <?php if (isset($_SESSION['user_id'])) : ?>
                                <li class="nav-item ">
                                    <div class="nav-link text-white"><?php echo $_SESSION['user_nickname'] ?>,Welcome</div>
                                </li>
                                <li class="nav-item ">
                                    <a class="btn nav-link text-white text-start" href="<?php echo URLROOT; ?>/users/logout">Logout</a>
                                </li>
                            <?php else : ?>
                                <li class="nav-item">
                                    <a class="btn nav-link text-white text-start" aria-current="page" href="<?php echo URLROOT; ?>/users/register">Register</a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn nav-link text-white text-start" href="<?php echo URLROOT; ?>/users/login">Login</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </nav> -->

            <ul class="nav color-lump align-items-center ">
                <li class="nav-item ">
                    <a class="nav-link active text-white" aria-current="page" href="#">
                        <font color="white" size="7" face="Dancing Script">COLA</font>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?php echo URLROOT; ?>/users/logout">Logout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white disabled">Disabled</a>
                </li>
            </ul>

            <div class="chatlist">

                <?php foreach ($data['userlist'] as $user) : ?>
                        <div class="message">
                            <div class="avatar">
                                <img src="<?php echo URLROOT; ?>/img/alien.jpg" alt="This is the photo">
                            </div>
                            <div class="friend">
                                <div class="user"><?php echo $user->nickname; ?></div>
                                <div class="text">Hello</div>
                            </div>
                        </div>
                <?php endforeach; ?>

            </div>

        </div>

        <div class="chatroom">
            <ul class="nav color-lump-reverse align-items-center ">
                <li class="nav-item ">
                    <a class="nav-link active text-white" aria-current="page" href="#">
                        <font color="white" size="7" face="Dancing Script">COLA</font>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white disabled">Disabled</a>
                </li>
            </ul>



            <div class="chatspace">

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

                <!-- <div class="d-flex justify-content-end">
                    <div class="chat-bubble-right">
                        噁男，約三小?
                    </div>
                </div>

                <div class="d-flex justify-content-start">
                    <div class="chat-bubble-left">
                        約嗎?
                    </div>
                </div> -->
            </div>


            <div class="message-input container-fluid d-flex">
                <div class="input-group">
                    <input class="form-control rounded-pill" type="text" placeholder="傳送訊息" aria-label=".form-control-lg example">
                    <button class="btn btn-link" type="button" id="button-addon2">傳送</button>
                </div>
            </div>
        </div>

        <?php require APPROOT . '/views/inc/footer.php'; ?>