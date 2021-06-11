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
    <span class="chat_msg_item chat_msg_item_admin">
            <div class="chat_avatar">
            
            </div>Hey there! Any question?</span>
      <span class="chat_msg_item chat_msg_item_user">
            Hello!</span>
            <span class="status">20m ago</span>
    </div>


      <div id="chat_fullscreen" class="chat_conversion chat_converse">
    </div>
    <div class="fab_field">


	<form action= "<?php echo base_url('Chat/save'); ?>" method= "post">

	    <input type="hidden" id="sent_by" name = "sent_by" value = "user"/></input>
      <button type="submit" id="fab_send" class="fab"><i class="zmdi zmdi-mail-send" ></i></button>
      <input type="textarea" id="message" name="message" placeholder="Send a message" class="chat_field chat_message"></input>
  </form>


  </div>
  </div>
    <a id="prime" class="fab"><i class="prime zmdi zmdi-comment-outline"></i></a>
</div>
<script src="js/index.js"></script>
  <script src='http://code.jquery.com/jquery-1.11.3.min.js'></script>
  <script>
$( "#fab_send" ).click(function() {
   e.preventDefault();
});
</script>
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


</script>


</body>

</html>
