<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/main/">Home page</a></li>
    <li class="breadcrumb-item">Profile</li>
  </ol>
</nav>
<div class=" container main">
  <div class="row">
    <div class="col-sm-4">
      <a href='/user/profile/order-history' class="list-group-item list-group-item-action">Order history</a>
      <a href='/user/profile/settings' class="list-group-item list-group-item-action">Settings</a>
    </div>
    <div class="col-sm-8">
      <table class="table">
        <thead class="thead-default">
          <tr>
            <th>#</th>
            <th>Date</th>
            <th>Title</th>
            <th>Price</th>
            <th>Qt</th>
          </tr>
        </thead>
        <tbody>
        <?php if(isset($data)) { ?>
          <?php foreach($data as $d) { ?>
            <tr>
              <th scope="row"><?=$d->id;?></th>
              <td><?=date("d:m:Y H:i:s", strtotime($d->date));?></td>
              <td><?=$d->title;?></td>
              <td><?=$d->total;?></td>
              <td><?=$d->qt;?></td>
            </tr>
          <?php }  ?>
        <?php } else echo "<p>You haven't made a single order.</p>"; ?>
        </tbody>
        <tfoot>
        </tfoot>
      </table>
    </div>
  </div>
</div>

