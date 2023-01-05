<?php if (empty($data['messages'])) : ?>
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