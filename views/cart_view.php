<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/main/">Home page</a></li>
    <li class="breadcrumb-item active" aria-current="page">Cart</li>
  </ol>
</nav>
<div class="container w-100 main">
  <?php if (isset($data)) {
    foreach ($data as $key=>$i) {
        if (gettype($i[0])=='object') {
            ?>
	<form method='post' action="" class="products-delete">
		<div class="row justify-content-md-center card-body cart-product">
		  <div class="col col-lg-2">
		    <img src="/img/<?php echo $i[0]->images[0]->src; ?>" alt="<?php echo $i[0]->title; ?>" width="80%">
		  </div>
		  <div class="col col-lg">
		    <h5 class="card-title bold"><?php echo $i[0]->title; ?></h5>
		    <h5 class="card-title">&nbsp;</h5>
		    <h6 class="card-subtitle mb-2 text-muted">vendor code: <?php echo $i[0]->code; ?></h6>
		    <h6 class="card-subtitle mb-2 text-muted">number of flowers: <span id="<?=$i[0]->id; ?>qt"><?php echo $i['qt']; ?></span></h6>
		    <h6 class="card-subtitle mb-2 text-muted">price: <span id="<?=$i[0]->id; ?>price"><?php echo $i[0]->price; ?></span> </h6>
		  </div>
		  <div class="col col-lg-2">
		    <div class="row">
		      <p class="cart-edit">
		        <button type="submit" class="delete-btn"><i class="far fa-times-circle"></i></button>
		      </p>
		    </div>      
		    <table style="height: 100px;">
		      <tbody>
		        <tr>
		          <td class="align-middle text-right">
                      <input name="id" type="hidden" value="<?=$i[0]->id; ?>">
                      <input name="action" type="hidden" value="" id="<?=$i[0]->id; ?>action">
		              <input class="form-control w-80" type="number" id="<?=$i[0]->id; ?>" value="<?php echo $i['qt']; ?>" min="1" max="<?=$i[0]->in_stock; ?>" name="qt">
		              <label for="example-number-input" class="cart-big-txt"><span id="<?=$i[0]->id; ?>total"><?php echo $i['total']; ?></span> UAH</label>
		          </td>       
		        </tr>
		      </tbody>
		    </table>
		  </div>
		</div>
	</form>
  <?php
        }
    }
} else {
    echo 'The cart is empty!';
} ?>
  <div class="row">
    <div class="w-50">
      <a href="/products/" class="cart-big-txt"><i class="fas fa-arrow-left"></i>&nbsp;Back to shopping</a>
    </div>
    <div class="w-50">
      <p class="text-right cart-big-txt">
        <a href="/order/">Checkout&nbsp;<i class="fas fa-arrow-right"></i></a>
      <p>
    </div>
  </div>
</div>
