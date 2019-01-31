<div class="cover">
    <div class="inner-cover">
        <?php use App\Lib\Session as Session;

if (Session::hasFlash()) {
    ?>
            <div class="alert alert-<?php Session::flashType(); ?>" role="alert">
                <?php Session::flash(); ?>
            </div>
        <?php
} ?>
        <form method="post" action="" class="registration-form needs-validation" novalidate>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
                <div class="invalid-feedback">
                    Please provide a valid email.
                </div>
            </div>
            <input type="submit" class="btn btn-success btn-lg w-100" value="Recovery" required>
        </form>
    </div>
</div>
