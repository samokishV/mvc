<div class="cover">
    <div class="inner-cover">
        <?php use App\Lib\Session as Session;
        if(Session::hasFlash()) { ?>
            <div class="alert alert-<?php Session::flashType(); ?>" role="alert">
                <?php Session::flash(); ?>
            </div>
        <?php } ?>
        <form method="post" action="" class="registration-form needs-validation" novalidate>
            <h5 class="text-uppercase bold"> Authorization </h5>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
                <div class="invalid-feedback">
                    Please provide a valid email.
                </div>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
                <div class="invalid-feedback">
                    Please enter a password.
                </div>
            </div>
            <input type="submit" class="btn btn-success btn-lg w-100" value="Sign in" required>
            <p><a href="/user/password_recovery_page">&nbsp;Forgot password? </a></p>
        </form>
    </div>
</div>
