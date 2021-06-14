<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>MyWhistle Chat</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="./message.css">
</head>
<body>    

<div class="fabs">
  <div class="chat">
    <div class="chat_header">
      <div class="chat_option">
      <div class="header_img">
        <img src="<?php echo base_url('images/favicon.png');?>"/>
        </div>
        <span id="chat_head">Administrator</span> <br> <span class="agent"></span> <span class="online">(Online)</span>
       <span id="chat_fullscreen_loader" class="chat_fullscreen_loader"><i class="fullscreen zmdi zmdi-window-maximize"></i></span>

      </div>

    </div>
    <div class="chat_body chat_login">
        <a id="chat_first_screen" class="fab"><i class="zmdi zmdi-arrow-right"></i></a>
        <p>We make it simple and seamless for you to talk to us. Tell us anything</p>
    </div>


    <div id="chat_converse" class="chat_conversion chat_converse">
    
    <?php foreach ($chats as $chat) { 
      if($chat->sent_by == 'Admin'){ ?>
        <span class="chat_msg_item chat_msg_item_admin">
        <span class="status3"><?php echo date("h:i",strtotime($chat->timestamp)); ?></span>
       <br><?php echo $chat->message ?></span>
          
      <?php }

      else{?>
          <span class="chat_msg_item chat_msg_item_user">
          <span class="status"><?php echo date("h:i",strtotime($chat->timestamp)); ?></span>
         <br> <?php echo $chat->message ?></span>
        
  
      <?php } ?>          
   <?php }?>

    </div>
      <div id="chat_fullscreen" class="chat_conversion chat_converse">
    </div>
    <div class="fab_field">


	<form id="myform" action= "<?php echo base_url('Chat/save'); ?>" method= "post">

	    <input type="hidden" id="sent_by" name = "sent_by" value = "user"/></input>
      <button type="submit" id="fab_send" name="fab_send"class="fab" ><i class="zmdi zmdi-mail-send" ></i></button>
      <input type="textarea" id="message" name="message" placeholder="Send a message" class="chat_field chat_message"></input>
  </form>


  </div>
  </div>
    <a id="prime" class="fab"><i class="prime zmdi zmdi-comment-outline"></i></a>
</div>

  <script src='http://code.jquery.com/jquery-1.11.3.min.js'></script>
 
<script>
hideChat(0);

$('#prime').click(function() {
  toggleFab();
});


//Toggle chat and links
function toggleFab() {
  $('.prime').toggleClass('zmdi-comment-outline');
  $('.prime').toggleClass('zmdi-close');
  $('.prime').toggleClass('is-active');
  $('.prime').toggleClass('is-visible');
  $('#prime').toggleClass('is-float');
  $('.chat').toggleClass('is-visible');
  $('.fab').toggleClass('is-visible');
  
}

  $('#chat_first_screen').click(function(e) {
        hideChat(1);
  });

  $('#chat_second_screen').click(function(e) {
        hideChat(2);
  });

  $('#chat_third_screen').click(function(e) {
        hideChat(3);
  });

  $('#chat_fourth_screen').click(function(e) {
        hideChat(4);
  });

  $('#chat_fullscreen_loader').click(function(e) {
      $('.fullscreen').toggleClass('zmdi-window-maximize');
      $('.fullscreen').toggleClass('zmdi-window-restore');
      $('.chat').toggleClass('chat_fullscreen');
      $('.fab').toggleClass('is-hide');
      $('.header_img').toggleClass('change_img');
      $('.img_container').toggleClass('change_img');
      $('.chat_header').toggleClass('chat_header2');
      $('.fab_field').toggleClass('fab_field2');
      $('.chat_converse').toggleClass('chat_converse2');
      //$('#chat_converse').css('display', 'none');
     // $('#chat_body').css('display', 'none');
     // $('#chat_form').css('display', 'none');
     // $('.chat_login').css('display', 'none');
     // $('#chat_fullscreen').css('display', 'block');
  });

function hideChat(hide) {
    switch (hide) {
      case 0:
            $('#chat_converse').css('display', 'none');
            $('#chat_body').css('display', 'none');
            $('#chat_form').css('display', 'none');
            $('.chat_login').css('display', 'block');
            $('.chat_fullscreen_loader').css('display', 'none');
             $('#chat_fullscreen').css('display', 'none');
            break;
      case 1:
            $('#chat_converse').css('display', 'block');
            $('#chat_body').css('display', 'none');
            $('#chat_form').css('display', 'none');
            $('.chat_login').css('display', 'none');
            $('.chat_fullscreen_loader').css('display', 'block');
            break;
      case 2:
            $('#chat_converse').css('display', 'none');
            $('#chat_body').css('display', 'block');
            $('#chat_form').css('display', 'none');
            $('.chat_login').css('display', 'none');
            $('.chat_fullscreen_loader').css('display', 'block');
            break;
      case 3:
            $('#chat_converse').css('display', 'none');
            $('#chat_body').css('display', 'none');
            $('#chat_form').css('display', 'block');
            $('.chat_login').css('display', 'none');
            $('.chat_fullscreen_loader').css('display', 'block');
            break;
      case 4:
            $('#chat_converse').css('display', 'none');
            $('#chat_body').css('display', 'none');
            $('#chat_form').css('display', 'none');
            $('.chat_login').css('display', 'none');
            $('.chat_fullscreen_loader').css('display', 'block');
            $('#chat_fullscreen').css('display', 'block');
            break;
    }
}


</script>

<script>
$(document).ready(function(){

var conn = new WebSocket('ws://127.0.0.1:8080');
conn.onopen = function(e) {
    console.log("Connection established!");
};
conn.onmessage = function(e) {
		    console.log(e.data);

		    var data = JSON.parse(e.data);

		    var row_class = '';

		    var background_class = '';

		    if(data.from == 'Me')
		    {
		    	row_class = 'row justify-content-start';
		    	background_class = 'text-dark alert-light';
		    }
		    else
		    {
		    	row_class = 'row justify-content-end';
		    	background_class = 'alert-success';
		    }

		    var html_data = "<div class='"+row_class+"'><div class='col-sm-10'><div class='shadow-sm alert "+background_class+"'><b>"+data.sent_by+" - </b>"+data.message+"<br /><div class='text-right'><small><i>"+data.timestamp+"</i></small></div></div></div></div>";

		    $('#chat_converse').append(html_data);

		    $("#message").val("");
		};

		$('#myform').parsley();

		$('#chat_converse').scrollTop($('#chat_converse')[0].scrollHeight);

		$('#myform').on('fab_send', function(event){

			event.preventDefault();

			if($('#myform').parsley().isValid())
			{

				var sent_by = $('#sent_by').val();

				var message = $('#message').val();

				var data = {
					sent_by : sent_by,
					message : message
				};

				conn.send(JSON.stringify(data));

				$('#chat_converse').scrollTop($('#chat_converse')[0].scrollHeight);

			}

		});
  });

</script>
</body>

</html>
