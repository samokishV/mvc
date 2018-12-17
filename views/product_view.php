    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/main/">Home page</a></li>
        <li class="breadcrumb-item"><a href="/stock/">Plants</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $data['name']; ?></li>
      </ol> 
    </nav> 
    <div class="container main">
      <div class="row">
        <div class="col-sm-1 flex-col">
          <?php for($i=0; $i<count($data['img']); $i++) { ?>
          <div class="row">
            <img class="d-block h-100" src="/img/<?php echo $data['img'][$i];?>" alt="First slide">
          </div>
          <?php } ?>
        </div>
        <div class="col-sm-5">
          <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
            <?php for($i=0; $i<count($data['img']); $i++) { ?>
              <div class="carousel-item <?php if($i==0) { ?> active <?php } ?> ">
                <img class="d-block w-100" src="/img/<?php echo $data['img'][$i];?>" alt="First slide">
              </div>
            <?php } ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
        <div class="col-sm">
          <div class="card" style="width: 20rem;">
            <div class="card-body">
                <h5 class="card-title bold"><?php echo $data['name'];?></h5>
              <h5 class="card-title"><?php echo $data['price'];?></h5>
              <h6 class="card-subtitle mb-2 text-muted">vendor code: <?php echo $data['code'];?></h6>
              <h6 class="card-subtitle mb-2 text-muted">in stock: <?php echo $data['in_stock'];?></h6>
              <h6 class="card-subtitle mb-2 text-muted">plant height:</h6>
              <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-primary active">
                  <input class="hidden" type="radio" name="options" id="option1" autocomplete="off" checked>50cm
                </label>
                <label class="btn btn-primary">
                  <input class="hidden" type="radio" name="options" id="option2" autocomplete="off">80cm
                </label>
                <label class="btn btn-primary">
                  <input class="hidden" type="radio" name="options" id="option3" autocomplete="off">1m
                </label>
              </div>
              <p class="card-text">Ficus lyre is an evergreen tree. The leaves are large, leathery, with a waxy coating, wavy edges, widening towards the end, resembling a lyre or a violin.</p>
              <div class="row">
                <div class="col-sm">
                  <div class="col-20">
                    <input class="form-control" type="number" value="1" min="1" id="example-number-input">
                  </div> 
                </div>  	
                <div class="col-sm">
                    <button type="button" class="btn btn-dark w-100">Add to Cart</button>
                  </div>  
              </div>
              <p class="card-text wishlist-text"><i class="far fa-heart"></i>Add to wishlist</p>
              <div class="row">
                <div class="flex-row col-sm-4">
                  <div>
                    <i class="fab fa-facebook-square"></i>
                  </div>
                  <div>
                    <i class="fab fa-instagram"></i>
                  </div>
                  <div>
                    <i class="fab fa-google-plus-square"></i>
                  </div>
                </div>
                <div class="col-sm-8">
                
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
