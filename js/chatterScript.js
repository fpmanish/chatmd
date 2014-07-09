function Chatter(){
	this.getMessage = function(callback, lastTime,pu,du){
		var t = this;
		var latest = null;
	 var pu = $('#pu').val();
	  var du = $('#du').val();
		$.ajax({
			'url': 'chatterEngine.php',
			'type': 'post',
			'dataType': 'json',
			'data': {
				'mode': 'get',
				'lastTime': lastTime,
				'pu' :pu,
				'du' :du
			},
			'timeout':10000 ,
			'cache': false,
			'success': function(result){
				//alert(result);
				if(result.result){
					callback(result.message);
					latest = result.latest;
				}	
			},
			'error': function(e){
				//console.log(e);
			},
			'complete': function(){
			
				t.getMessage(callback, latest);
			}
		});
	};
	
	this.postMessage = function(user, text,pu,du, callback){
	
		$.ajax({
			'url': 'chatterEngine.php',
			'type': 'post',
			'dataType': 'json',
			'data': {
				'mode': 'post',
				'user': user,
				'text': text,
				'pu': pu,
				'du': du
			},
			'success': function(result){
				callback(result);
			},
			'error': function(e){
				console.log(e);
			}
		});
	};
};

var c = new Chatter();

$(document).ready(function(){
	var c = new Chatter();
	$('#formPostChat').submit(function(e){
		e.preventDefault();
		
		var user = $('#postUsername');
		var text = $('#postText');
	    var pu = $('#pu');
	    var du = $('#du');
		var err = $('#postError');
		
		c.postMessage(user.val(), text.val(),pu.val(),du.val(), function(result){
			if(result){
				text.val('');
			}
			err.html(result.output);
		});
	
		return false;
	});
	
	c.getMessage(function(message){
		var chat = $('#chatMessageList').empty();
		
		for(var i = 0; i < message.length; i++){
			chat.append(
				'<li class="chatMessage">' +
				'		<span class="chatUsername">' + message[i].user + '</span>' +
				'		<p class="chatText">' + message[i].text + '</p>' +
				'</li>'
			);
		}
		
		$('#chatMessageList').scrollTop($('#chatMessageList')[0].scrollHeight);
	});
});