<?php if (!empty($data['matchusernow'])) : ?>
    <div class="card" style="width: 25rem">
        <div class="matchusernow">
            <img src="<?php echo URLROOT; ?><?php echo $data['matchusernow']->profile_picture ?>" class="matchimg" alt="...">
            <p class="matchname"><?php echo $data['matchusernow']->nickname ?></p>
        </div>
        <div class="card-body">
            <div class="d-flex matchoption">
                <a class="aprevent macthoption" onclick="dislike(<?php echo $_SESSION['user_id'] ?>, <?php echo $data['matchusernow']->id ?>);">
                    <img class="dislike" src="<?php echo URLROOT; ?>/img/icon/dislike_icon.svg" alt="">
                </a>
                <a class="aprevent macthoption" onclick="like(<?php echo $_SESSION['user_id'] ?>, <?php echo $data['matchusernow']->id ?>);">
                    <img class="like" src="<?php echo URLROOT; ?>/img/icon/like_icon.svg" alt="">
                </a>
            </div>
        </div>
    </div>
<?php else : ?>
    <div class="emptychatuser">
        <img class="startchat" src="<?php echo URLROOT; ?>/img/icon/empty_icon.svg" alt="">
        <h3>附近沒有配對對象了</h3>
    </div>
<?php endif ?>