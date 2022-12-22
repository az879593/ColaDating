<div class="message-input container-fluid d-flex">
    <div class="input-group">
        <input class="form-control rounded-pill" type="text" placeholder="傳送訊息" id = "typearea" aria-label=".form-control-lg example">
        <button class="btn btn-link" type="button" id="button-addon2" onclick="sendMessage(<?php echo $_SESSION['user_id'] ?>, <?php echo $data['chatusernow']->id ?>)">Send</button>
    </div>
</div>