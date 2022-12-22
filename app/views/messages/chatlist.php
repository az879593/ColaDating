<?php foreach ($data['userlist'] as $user) : ?>
    <!-- onclick="getUserMessage(<?php echo $user->id; ?>); return false;" -->
    <a class="text-black text-decoration-none chatuser" href="#" onclick="chatroomInit(<?php echo $user->id; ?>);">
        <div class="message">
            <div class="avatar">
                <img src="<?php echo URLROOT; ?>/img/alien.jpg" alt="This is the photo">
            </div>
            <div class="friend">
                <div class="user"><?php echo $user->nickname; ?></div>
                <div class="text">Hello</div>
            </div>
        </div>
    </a>
<?php endforeach; ?>