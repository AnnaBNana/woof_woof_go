$(document).ready(function(){
  $('.open').click(function(){
    var msg_id = $(this).attr("id");
    console.log(msg_id);
    $.get("/queries/msg_partial/" + msg_id, function(res) {
      $('#message').html(res);
        });
    return false;
  });
  $('.reply').click(function(){
    var msg_id = $(this).attr("id");
    console.log(msg_id);
    $.get("/queries/reply_partial/" + msg_id, function(res) {
      $('#message').html(res);
        });
    return false;
  });
  $('.sent').click(function(){
    $('.received_mail_container').css("display", "none");
    $('.sent_mail_container').attr("class", "sent_show");
    return false;
  });
  $('.received').click(function(){
    $('.received_mail_container').css("display", "inline");
    $('.sent_show').attr("class", "sent_mail_container");
    return false;
  });

});
