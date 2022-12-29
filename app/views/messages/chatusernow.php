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