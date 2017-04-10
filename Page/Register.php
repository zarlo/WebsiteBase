<h1>Register</h1>
<form action="API/v1/Register?url=<?php echo $Request_URL;?>" method="post">
  <div class="form-group">
    <label for="User">Username:</label>
    <input type="text" class="form-control" id="User" required>
  </div>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" id="email" required>
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="password" required>
  </div>
  <button type="submit" class="btn btn-default">Register</button>
</form>
