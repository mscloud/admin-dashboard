<?php
    $title='Admin-Login';
    include 'include.php';
    if(isset($_COOKIE['username']) && !empty($_COOKIE['username'])) //checking cookie
    {
        header('Location:admin.php');
        exit();
    }

    if(isset($_POST['submit'])) //Submiting the login Form
    {
        if(!empty($_POST))
        {
            $result =$auth->login();
        }
    }
?>
<div class="container">
    <div class="admin-login row">
        <div class="col-xs-12 col-sm-8 col-md-offset-3 col-md-6">
            <div class="alert alert-info">ADMIN LOGIN</div>
        </div>
        <?php
            if(isset($result))
            {
                echo "<div class=' alert alert-danger col-xs-12 col-sm-8 col-md-offset-3 col-md-6'>";

                for($i=0;$i<count($result);$i++)
                {
                    echo "<p>{$result[$i]}</p>";
                }

                echo "</div>";
            }
        ?>
        <div class="col-xs-12 col-sm-8 col-md-offset-3 col-md-6">
            <form id="login-form" action="" method="POST">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="example@abc.com">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="*********">
                </div>
                <div class="checkbox">
                    <label><input name="remember" type="checkbox" value="">Remember Me?</label>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Login" class="btn btn-block text-center btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
