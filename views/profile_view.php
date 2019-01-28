<?php use App\Models\User as User; ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/main/">Home page</a></li>
        <li class="breadcrumb-item">Profile</li>
    </ol>
</nav>
<div class="container main">
    <div class="row">
        <div class="col-sm">
            <a href='/user/profile/order-history' class="list-group-item list-group-item-action">Order history</a>
            <a href='/user/profile/settings' class="list-group-item list-group-item-action">Settings</a>
        </div>
        <div class="col-sm">
            <h3>My settings</h3>
            <p><span>Your name: </span><b><?php echo User::getValue($data, 'name')?></b></p>
            <p><span>Email: </span><b><?php echo User::getValue($data, 'email')?></b></p>
            <p><span>Phone: </span><b><?php echo User::getValue($data, 'phone')?></b></p>
            <p><span>Delivery address: </span><b><?php echo User::getValue($data, 'address')?></b></p>
            <p><a href="#" id="change-data">Edit personal data</a></p>
            <p><a href="#" id="change-password">Change password</a></p>
            <form class="change-data">
            <p><h3>Edit personal data</h3></p>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="<?=$data->name;?>" class="form-control" required>
                    <div class="invalid-feedback">Please fill this field</div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="<?=$data->email;?>" class="form-control" required>
                    <div class="invalid-feedback">Please fill this field</div>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="tel" name="phone" value="<?=$data->phone;?>" class="form-control" required>
                    <div class="invalid-feedback">Please fill this field</div>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" value="<?=$data->address;?>" class="form-control" required>
                    <div class="invalid-feedback">Please fill this field</div>
                </div>
                <input type="submit" class="btn btn-success btn-lg w-100" value="Save">
            </form>            
            <form class="change-password">
                <p><h3>Change password</h3></p>
                <div class="form-group">
                    <label for="old-password">Password</label>
                    <input type="password" id="old-password" name="old-password" class="form-control" required>
                    <div class="invalid-feedback">Please fill this field</div>
                </div>
                <div class="form-group">
                    <label for="new-password">New password</label>
                    <input type="password" id="new-password" name="new-password" class="form-control" required>
                    <div class="invalid-feedback">Please fill this field</div>
                </div>
                <div class="form-group">
                    <label for="confirm-password">Confirm password</label>
                    <input type="password" id="confirm-password" name="confirm-password" class="form-control" required>
                    <div class="invalid-feedback">Please fill this field</div>
                </div>
                <input type="submit" class="btn btn-success btn-lg w-100" value="Save">
                <p><a href="#" id="password-recovery">Forgot password? </a></p>
            </form>
            <form class="password-recovery">
                <p><h3>Password recovery</h3></p>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="<?=$data->email;?>" readonly>
                    <div class="invalid-feedback">Please fill this field</div>
                </div>
                <input type="submit" class="btn btn-success btn-lg w-100" value="Submit">
            </form>
        </div>
        <div class="col-sm">
            
        </div>
    </div>
</div>
