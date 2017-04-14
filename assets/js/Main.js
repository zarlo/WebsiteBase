$(document).ready(function(){
 $("#Login").click(function(){
    username=$("#Lemail").val();
    password=$("#Lpassword").val();
    $.ajax({
     type: "POST",
     url: "/Login",
    data: "email="+username+"&password="+password,
     success: function(html){
    if(html['Status']==true)    {
     window.location=URL;

    }
    else    {
    $("#Login").html("Failed");
    }
     },
		   beforeSend:function()
		   {
         $("#Login").html("Logining...");
		   }
		  });
  return false;
});
});
