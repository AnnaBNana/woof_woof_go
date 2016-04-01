$(document).ready(function(){
  $(".reply").click(function(){
    var msg_id = $(this).attr("id");
    console.log(msg_id);
    $.get("/queries/reply_partial/" + msg_id, function(res) {
      // console.log(res);
      $('#message').html(res);
        });
    return false;
  });
  $(".close").click(function(){
    $(".display_msg").css("display", "none");
    return false;
  });
});
