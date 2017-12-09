<?php
    $title='Admin-Login';
    include 'include.php';
?>
<div class="container">
    <div class="admin-login row">
        <div class="col-xs-12 col-sm-8 col-md-offset-3 col-md-6">
            <div class="alert alert-info">ADMIN LOGIN</div>
            <form id="login-form" action="" method="POST">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="*********">
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" value="">Remember Me?</label>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Login" class="btn btn-block text-center btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
