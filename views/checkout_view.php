<?php use App\Models\User as User;
use App\Lib\Authorization as Authorization;

?>
<div class="container main">
    <div class="row">
        <div class="col-sm">
            <form action="" class="checkout">
            <p><h3>Checkout</h3></p>
                <?php if (Authorization::isAuth()) {
    ?> 

                <?php
} ?>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="<?php echo User::getValue($data['user'], 'name')?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="<?php echo User::getValue($data['user'], 'email')?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="tel" name="phone" value="<?php echo User::getValue($data['user'], 'phone')?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" value="<?php echo User::getValue($data['user'], 'address')?>" class="form-control" required>
                </div>
                <input type="hidden">
		<?php if (isset($data['cart'])) {
        ?>
                <input type="submit" class="btn btn-success btn-lg w-100" value="Checkout">
		<?php
    } else {
        ?>
		<h5>Please add items to cart to make an order!</h5>
		<?php
    } ?>
            </form>
        </div>
        <div class="col-sm">
            <p><h3>Your order</h3></p>
            <table border cellspacing="0" width="400px" class="order-table">
                <tr><th>Product</th><th>Price</th></tr>
                <?php $total_price = 0;
                 if (isset($data['cart'])) {
                     foreach ($data['cart'] as $product) {
                         $total_price += $product['total']; ?>
                      <tr>
                          <td><?=$product[0]->title; ?> x <?=$product['qt']; ?></td>
                          <td><?=$product['total']; ?> ₴ </td>
                      </tr>
                  <?php
                     }
                 } ?>
                <tr>
                    <th>Total</th>
                    <th><?=$total_price;?> ₴ </th>
                </tr>
            </table>
        </div>
    </div>
</div>
