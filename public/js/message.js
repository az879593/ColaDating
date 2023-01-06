var chatUserNow;
$(".aprevent").on("click", function (e) {
	e.preventDefault();
});

window.addEventListener("popstate", function (e) {
	location.reload();
});

function chatroomInit(chatuserid) {
	history.pushState(
		"",
		"Title of the page",
		"http://localhost/ColaDating/messages/" + chatuserid
	);
	chatUserNow = chatuserid;

	url = "http://localhost/ColaDating/Messages/chatusernow/" + chatuserid;
	$.ajax({
		type: "POST",
		url: url,

		success: function (data) {
			// $(".chatlist").html(data);
			// console.log(data);
			$(".chatusernow").html(data);
		},
		error: function (data) {},
	});

	// console.log(chatuserid);
	url = "http://localhost/ColaDating/Messages/history/" + chatuserid;
	// console.log(url);
	$.ajax({
		type: "POST",
		url: url,

		success: function (data) {
			// $(".chatlist").html(data);
			// console.log(data);
			$(".chatspace").html(data);
		},
		error: function (data) {},
	});

	url = "http://localhost/ColaDating/Messages/typearea/" + chatuserid;
	
	$.ajax({
		type: "POST",
		url: url,

		success: function (data) {
			$(".type").html(data);
		},
		error: function (data) {},
	});

}

function sendMessage(fromid, toid) {
	var text = document.getElementById("typearea").value;
	document.getElementById("typearea").value = "";
	var url = "http://localhost/ColaDating/Messages/index";
	if (text) {
		// console.log(text);
		chatroomInit(toid);
		$.ajax({
			type: "POST",
			url: url,
			data: {
				text: text,
				from_id: fromid,
				to_id: toid,
			},
			success: function (data) {
				refreshMatchList();
				chatroomInit(toid);
			},
			error: function (data) {},
		});
	}
}

function refreshMatchList() {
	var url = "http://localhost/ColaDating/Messages/matchlist";
	// console.log(url);

	$.ajax({
		type: "POST",
		url: url,

		success: function (data) {
			// $(".chatlist").html(data);
			$(".chatlist").html(data);
		},
		error: function (data) {},
	});
	// console.log(chatUserNow);
}

function refreshChatHistory() {
	var url = "http://localhost/ColaDating/Messages/history/" + chatUserNow;
	// console.log(url);
	if (chatUserNow) {
		$.ajax({
			type: "POST",
			url: url,

			success: function (data) {
				// $(".chatlist").html(data);
				// console.log(data);
				$(".chatspace").html(data);
			},
			error: function (data) {},
		});
		// console.log(chatUserNow);
	}
}

function like(user, matchuser){
	var url = "http://localhost/ColaDating/Messages/match";
	$.ajax({
		type: "POST",
		url: url,
		data: {
			user: user,
			matchuser: matchuser,
			status: 1,
		},
		success: function (data) {
			// refreshMatchList();
			checkMatch(user, matchuser);
			changeMatchUser();
		},
		error: function (data) {},
	});
}

function dislike(user, matchuser){
	var url = "http://localhost/ColaDating/Messages/match";
	$.ajax({
		type: "POST",
		url: url,
		data: {
			user: user,
			matchuser: matchuser,
			status: -1,
		},
		success: function (data) {
			// refreshMatchList();
			changeMatchUser();
		},
		error: function (data) {},
	});
}

function changeMatchUser(){
	var url = "http://localhost/ColaDating/Messages/matchcard";
	$.ajax({
		type: "POST",
		url: url,

		success: function (data) {
			// $(".chatlist").html(data);
			// alert('dsaaaaaaaaa');
			if(data){
				$(".matchspace").html(data);
			}else{

			}
		},
		error: function (data) {
		},
	});
}

function checkMatch(user, matchuser){
	var url = "http://localhost/ColaDating/Messages/checkMatch";
	$.ajax({
		type: "POST",
		url: url,
		data: {
			user: user,
			matchuser: matchuser,
		},
		success: function (data) {
			if(data == 1){
				alert('配對成功');
				refreshMatchList();
			}
		},
		error: function (data) {},
	});
}
// setInterval(chatroomInit, 500, chatUserNow);
setInterval(refreshChatHistory, 200);


