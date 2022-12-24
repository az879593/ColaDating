// var chatUserNow;

// function chatroomInit(chatuserid) {
//     console.log(chatUserNow);
//     chatUserNow = chatuserid;
//     console.log(chatUserNow);
//     url = '<?php echo URLROOT; ?>/Messages/chatusernow/' + chatuserid;
//     $.ajax({
//         type: 'POST',
//         url: url,

//         success: function (data) {
//             // $(".chatlist").html(data);
//             // console.log(data);
//             $(".chatusernow").html(data);
//         },
//         error: function (data) {

//         }
//     });

//     // console.log(chatuserid);
//     var url = '<?php echo URLROOT; ?>/Messages/history/' + chatuserid;
//     // console.log(url);
//     $.ajax({
//         type: 'POST',
//         url: url,

//         success: function (data) {
//             // $(".chatlist").html(data);
//             // console.log(data);
//             $(".chatspace").html(data);
//         },
//         error: function (data) {

//         }
//     });

//     url = '<?php echo URLROOT; ?>/Messages/typearea/' + chatuserid;
//     $.ajax({
//         type: 'POST',
//         url: url,

//         success: function (data) {
//             $(".type").html(data);
//         },
//         error: function (data) {

//         }
//     });
//     chatUserNow = chatuserid;
// }

// function sendMessage(fromid, toid) {

//     var text = document.getElementById("typearea").value;
//     document.getElementById("typearea").value = '';
//     var url = '<?php echo URLROOT; ?>/Messages/index';
//     if (text) {
//         // console.log(text);
//         chatroomInit(toid);
//         $.ajax({
//             type: 'POST',
//             url: url,
//             data: {
//                 'text': text,
//                 'from_id': fromid,
//                 'to_id': toid
//             },
//             success: function (data) {
//                 chatroomInit(toid);
//             },
//             error: function (data) {

//             }
//         });
//     }
// }

// function refreshChatHistory() {
//     var url = '<?php echo URLROOT; ?>/Messages/history/' + chatUserNow;
//     // console.log(url);
//     if (chatUserNow) {
//         $.ajax({
//             type: 'POST',
//             url: url,

//             success: function (data) {
//                 // $(".chatlist").html(data);
//                 // console.log(data);
//                 $(".chatspace").html(data);
//             },
//             error: function (data) {

//             }
//         });
//         // console.log(chatUserNow);
//     }

// }
// // setInterval(chatroomInit, 500, chatUserNow);
// setInterval(refreshChatHistory, 10000);