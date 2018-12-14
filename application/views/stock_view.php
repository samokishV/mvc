    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/main/">Home page</a></li>
        <li class="breadcrumb-item active" aria-current="page">Plants</li>
      </ol>
    </nav>
    <div class="container main">
      <div class="row">
        <div class="col-sm card" width="20rem;">
          <div class="card-body">
            <h5 class="card-title bold">Krupnomery</h5>
            <div class="search-options-block">
              <h5 class="card-title">Product type</h5>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label text-muted" for="defaultCheck1">
                  Option 1 <span class="badge badge-primary">4</span>
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label text-muted" for="defaultCheck1">
                  Option 2 <span class="badge badge-primary">14</span>
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label text-muted" for="defaultCheck1">
                  Option 3 <span class="badge badge-primary">7</span>
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label text-muted" for="defaultCheck1">
                  Option 4 <span class="badge badge-primary">8</span>
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label text-muted" for="defaultCheck1">
                  Option 5 <span class="badge badge-primary">10</span>
                </label>
              </div>
            </div>
            <div class="search-options-block">
              <h5 class="card-title">Search option 2</h5>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label text-muted" for="defaultCheck1">
                  Option 1 <span class="badge badge-primary">4</span>
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label text-muted" for="defaultCheck1">
                  Option 2 <span class="badge badge-primary">14</span>
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label text-muted" for="defaultCheck1">
                  Option 3 <span class="badge badge-primary">7</span>
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label text-muted" for="defaultCheck1">
                  Option 4 <span class="badge badge-primary">8</span>
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label text-muted" for="defaultCheck1">
                  Option 5 <span class="badge badge-primary">10</span>
                </label>
              </div>
            </div>
            <div class="search-options-block">
              <h5 class="card-title">Search option 3</h5>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label text-muted" for="defaultCheck1">
                  Option 1 <span class="badge badge-primary">4</span>
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label text-muted" for="defaultCheck1">
                  Option 2 <span class="badge badge-primary">14</span>
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label text-muted" for="defaultCheck1">
                  Option 3 <span class="badge badge-primary">7</span>
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label text-muted" for="defaultCheck1">
                  Option 4 <span class="badge badge-primary">8</span>
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label text-muted" for="defaultCheck1">
                  Option 5 <span class="badge badge-primary">10</span>
                </label>
              </div>
            </div>
            <form>
              <div class="form-group">
                <label for="formControlRange">
                  <h5 class="card-title">Price</h5>
                </label>
                <input type="range" class="form-control-range" id="formControlRange">
              </div>
            </form>
          </div> 
        </div>
        <div class="col-sm-10 row space-between">
          <?php foreach($data as $key=>$i) {  ?>
          <div class="card" style="width: 18rem;">
            <a href="product.php?id=<?php echo $key;?>">
              <img class="card-img-top" src="/img/<?php echo $i['img'][0]; ?>" alt="<?php echo $i['name']; ?>">
            </a>
            <div class="card-body">              
                <h5 class="card-title bold"><a href="product.php?id=<?php echo $key;?>"><?php echo $i['name']; ?></a></h5>
              <h5 class="card-title"><?php echo $i['price']; ?></h5>
              <h6 class="card-subtitle mb-2 text-muted">vendor code: <?php echo $i['code']; ?></h6>
              <h6 class="card-subtitle mb-2 text-muted">in stock: <?php echo $i['in_stock']; ?></h6>
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
            </div>
          </div>
          <?php } ?>
          <nav aria-label="Page navigation example" class="w-100">
            <ul class="pagination justify-content-center">
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                  <span class="sr-only">Next</span>
                </a>
              </li>
            </ul>
          </nav>
        </div>  
      </div>
    </div>

