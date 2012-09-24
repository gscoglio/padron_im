<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include_once 'header.php' ?>
<body>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<div class="container">
    <legend>Log in</legend>
    <form action="login.php" method="post" class="form-horizontal"><input type="hidden" name="ac" value="log"></input>
        <div class="control-group">
            <label class="control-label">Username</label>
            <div class="controls">
            <input type="text" id="inputEmail" name="username" placeholder="Username"></input>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="inputPassword">Password</label>
            <div class="controls">
            <input type="password" id="inputPassword" name="password" placeholder="Password"></input>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
            <label class="checkbox">
            <input type="checkbox"> Remember me</input>
            </label>
            <button type="submit" class="btn" value="Login">Sign in</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>    