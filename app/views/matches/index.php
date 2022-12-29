<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/match.css">
</head>

<body>
    <div class="tinder">
        <div class="tinder--status">
            <i class="fa fa-remove"></i>
            <i class="fa fa-heart"></i>
        </div>

        <div class="tinder--cards">
            <div class="tinder--card">
                <img src="https://placeimg.com/600/300/people">
                <h3>Demo card 1</h3>
                <p>This is a demo for Tinder like swipe cards</p>
            </div>
            <div class="tinder--card">
                <img src="https://placeimg.com/600/300/animals">
                <h3>Demo card 2</h3>
                <p>This is a demo for Tinder like swipe cards</p>
            </div>
            <div class="tinder--card">
                <img src="https://placeimg.com/600/300/nature">
                <h3>Demo card 3</h3>
                <p>This is a demo for Tinder like swipe cards</p>
            </div>
            <div class="tinder--card">
                <img src="https://placeimg.com/600/300/tech">
                <h3>Demo card 4</h3>
                <p>This is a demo for Tinder like swipe cards</p>
            </div>
            <div class="tinder--card">
                <img src="https://placeimg.com/600/300/arch">
                <h3>Demo card 5</h3>
                <p>This is a demo for Tinder like swipe cards</p>
            </div>
        </div>

        <div class="tinder--buttons">
            <button id="nope"><i class="fa fa-remove"></i></button>
            <button id="love"><i class="fa fa-heart"></i></button>
        </div>
    </div>
</body>


<script src="<?php echo URLROOT; ?>/js/card.js"></script>
</html>