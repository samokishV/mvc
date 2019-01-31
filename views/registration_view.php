<div class="cover">
    <div class="inner-cover">
        <form method="post" action="" class="registration-form needs-validation" novalidate>
            <h5 class="text-uppercase bold"> create account </h5>
            <?php use App\Lib\Session as Session;

if (Session::hasFlash()) {
    ?>
			<div class="alert alert-<?php Session::flashType(); ?>" role="alert">
				<?php Session::flash(); ?>
			</div>
			<?php
} ?>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" value="<?php if (isset($_POST['name'])) {
        echo $_POST['name'];
    } ?>" required>
                <div class="invalid-feedback">
                  Please choose a username.
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="<?php if (isset($_POST['email'])) {
        echo $_POST['email'];
    } ?>" required>
                <div class="invalid-feedback">
                  Please provide a valid email.
                </div>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" value="<?php if (isset($_POST['password'])) {
        echo $_POST['password'];
    } ?>" required>
                <div class="invalid-feedback">
                  Please choose a password.
                </div>
            </div>
            <input type="submit" class="btn btn-success btn-lg w-100" value="Register">
            <p>Have an account?<a href="/user/login/">&nbsp;Sign in</a></p>
        </form>
    </div>
</div>

