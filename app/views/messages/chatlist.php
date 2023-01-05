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