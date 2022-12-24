</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    var chatUserNow;
    $(".chatuserlink").on('click', function(e) {
        e.preventDefault();
    });

    window.addEventListener("popstate", function(e) {
        location.reload();
    });

    function chatroomInit(chatuserid) {
        history.pushState('', 'Title of the page', '<?php echo URLROOT; ?>/messages/' + chatuserid);
        chatUserNow = chatuserid;
        url = '<?php echo URLROOT; ?>/Messages/chatusernow/' + chatuserid;
        $.ajax({
            type: 'POST',
            url: url,

            success: function(data) {
                // $(".chatlist").html(data);
                // console.log(data);
                $(".chatusernow").html(data);
            },
            error: function(data) {

            }
        });

        // console.log(chatuserid);
        var url = '<?php echo URLROOT; ?>/Messages/history/' + chatuserid;
        // console.log(url);
        $.ajax({
            type: 'POST',
            url: url,

            success: function(data) {
                // $(".chatlist").html(data);
                // console.log(data);
                $(".chatspace").html(data);
            },
            error: function(data) {

            }
        });

        url = '<?php echo URLROOT; ?>/Messages/typearea/' + chatuserid;
        $.ajax({
            type: 'POST',
            url: url,

            success: function(data) {
                $(".type").html(data);
            },
            error: function(data) {

            }
        });
        chatUserNow = chatuserid;
    }

    function sendMessage(fromid, toid) {

        var text = document.getElementById("typearea").value;
        document.getElementById("typearea").value = '';
        var url = '<?php echo URLROOT; ?>/Messages/index';
        if (text) {
            // console.log(text);
            chatroomInit(toid);
            $.ajax({
                type: 'POST',
                url: url,
                data: {
                    'text': text,
                    'from_id': fromid,
                    'to_id': toid
                },
                success: function(data) {
                    chatroomInit(toid);
                },
                error: function(data) {

                }
            });
        }
    }

    function refreshChatHistory() {
        var url = '<?php echo URLROOT; ?>/Messages/history/' + chatUserNow;
        // console.log(url);
        if (chatUserNow) {
            $.ajax({
                type: 'POST',
                url: url,

                success: function(data) {
                    // $(".chatlist").html(data);
                    // console.log(data);
                    $(".chatspace").html(data);
                },
                error: function(data) {

                }
            });
            // console.log(chatUserNow);
        }

    }
    // setInterval(chatroomInit, 500, chatUserNow);
    setInterval(refreshChatHistory, 2000);
</script>

</html>