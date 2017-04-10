
<h1>Login</h1>
<form>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" id="Lemail" required>
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="Lpassword" required>
  </div>
  <div class="checkbox">
    <label><input type="checkbox" id="remember"> Remember me</label>
  </div>
  <button type="submit" class="btn btn-default" id="Login">Login</button>
</form>

<script type="text/javascript">
$(document).ready(function(){
 $("#Login").click(function(){
    username=$("#Lemail").val();
    password=$("#Lpassword").val();
    $.ajax({
     type: "POST",
     url: "/API/v1/auth/Login",
    data: "email="+username+"&password="+password,
     success: function(html){
    if(html['Status']==true)    {
     //window.location='<?php echo $Request_URL; ?>';
    $("#Login").html("Worked");
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
</script>
