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
        <span class="status3"><?php echo date("h:i a",strtotime($chat->timestamp)); ?></span>
       <br><?php echo $chat->message ?></span>
          
      <?php }

      else{?>
          <span class="chat_msg_item chat_msg_item_user">
          <span class="status"><?php echo date("h:i a",strtotime($chat->timestamp)); ?></span>
         <br> <?php echo $chat->message ?></span>
        
  
      <?php } ?>          
   <?php }?>
    
    </div>
    <div class="fab_field">

    

	<form id="myform" method= "post">

	    <input type="hidden" id="sent_by" name = "sent_by" value = "user"/></input>

      <button type="submit" id="fab_send" name="fab_send" class="fab" ><i class="zmdi zmdi-mail-send" ></i></button>
      <input type="textarea" id="message" name="message" placeholder="Send a message" class="chat_field chat_message" ></input>
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
						
			$("form#myform").submit(function(){
       

                var url;
                url = "<?php echo base_url('Chat/save') ?>";

											
				$.ajax("/Chat/save",{
              url: url,
							message: $("#message").val(),
							sent_by: $("#sent_by").val(),
							type : "post",
              dataType: "JSON",
              data: $('#myform').serialize(), 

						}, 
            function(data) {
              
              $("#chat_converse").load(location.href + " #chat_converse");
            


				});	
              $('#message').val('');					
              $('#message').focus();

        return false;
			});

		});


    
    
</script>

<script>
$(document).ready(function () {
  setInterval(function() {
    var $message = $("#chat_converse");
        $message[0].scrollTop = $message[0].scrollHeight;
        $("#chat_converse").load(location.href + " #chat_converse");
}, 1500);

});
</script>


</body>

</html>
