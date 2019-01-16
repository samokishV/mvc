    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home page</a></li>
        <li class="breadcrumb-item active" aria-current="page">Cart</li>
      </ol>
    </nav>
<div class="container w-100 main">
  <?php if(isset($data)) foreach($data as $i) {  ?>
  <div class="row justify-content-md-center card-body cart-product">
    <div class="col col-lg-2">
      <img src="/img/<?php echo $i->images[0]->src; ?>" alt="<?php echo $i->title; ?>" width="80%">
    </div>
    <div class="col col-lg">
      <h5 class="card-title bold"><?php echo $i->title; ?></h5>
      <h5 class="card-title">&nbsp;</h5>
      <h6 class="card-subtitle mb-2 text-muted">vendor code: <?php echo $i->code; ?></h6>
      <h6 class="card-subtitle mb-2 text-muted">number of flowers: <?php //echo $i['qt']; ?></h6>
      <h6 class="card-subtitle mb-2 text-muted">height: 80cm</h6>
      <h6 class="card-subtitle mb-2 text-muted">price: <?php echo $i->price; ?> </h6>
    </div>
    <div class="col col-lg-2">
      <div class="row">
        <p class="cart-edit">
          <i class="far fa-edit"></i>
          <a href="/cart/delete/<?php echo $i->id; ?>"><i class="far fa-times-circle"></i></a>
        </p>
      </div>      
      <table style="height: 100px;">
        <tbody>
          <tr>
            <td class="align-middle text-right">
                <input class="form-control w-80" type="number" value="<?php //echo $i['qt']; ?>" min="1" id="example-number-input">
                <label for="example-number-input" class="cart-big-txt"><?php //echo $i['total']; ?> UAH</label>
            </td>       
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <?php } else echo 'The cart is empty!'; ?>
  <div class="row">
    <div class="w-50">
      <a href="/products/" class="cart-big-txt"><i class="fas fa-arrow-left"></i>&nbsp;Back to shopping</a>
    </div>
    <div class="w-50">
      <p class="text-right cart-big-txt">
        <a href="#">Checkout&nbsp;<i class="fas fa-arrow-right"></i></a>
      <p>
    </div>
  </div>
</div>
