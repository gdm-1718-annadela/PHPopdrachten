<?php
require_once '../../app.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products - <?php echo SITE_NAME; ?></title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>css/main.css">
</head>
<body>
<nav class="primary darken-2">
    <div class="nav-wrapper">
      <a href="<?php echo ADMIN_URL; ?>" class="brand-logo"><?php echo SITE_NAME; ?></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="sass.html"><i class="material-icons">search</i></a></li>
        <li><a href="badges.html"><i class="material-icons">view_module</i></a></li>
        <li><a href="collapsible.html"><i class="material-icons">refresh</i></a></li>
        <li><a href="mobile.html"><i class="material-icons">more_vert</i></a></li>
      </ul>
    </div>
  </nav>
<div class="row">
    <div class="col s2">
        <div class="collection">
            <a href="#!" class="collection-item">Pages</a>
            <a href="<?php echo ADMIN_URL; ?>products" class="collection-item active">Products</a>
            <a href="#!" class="collection-item">Comments</a>
            <a href="#!" class="collection-item">Admins</a>
          </div>
                 
    </div>
    <div class=col s10>
      <form action="" method="GET">
        <label>Filter op</label>
        <select class="browser-default" name="sort">
          <option value="name">name</option>
          <option value="brand">brand</option>
          <option value="price">price</option>
        </select>
        <button type="submit" name="filter_btn">filter</button>
      </form>
    </div>

    <?php 

    if(isset($_GET['sort'])){
      // $filter = $_GET['sort'];
      $direction = 'ASC';
      if(isset($_GET['dir'])){
        $direction = $_GET['dir'];
      }
      $products= get_products($_GET['sort'] . ' ' . $direction );
    }else{
      $products = get_products();
        }
    
    ?>
    <div class="col s10">
        <table class="striped">
            <thead>
              <tr>
                  <th><a href="?sort=name" >Product</a></th>
                  <th><a href="?sort=brand" >Brand</a></th>
                  <th>Description</th>
                  <th><a href="?sort=price" >Price</a></th>
                  <th></th>
              </tr>
            </thead>
            <tbody>
              <?php 

              foreach($products as $product) : ?>
                <tr>
                  <td><?php echo $product['name']; ?></td>
                  <td><?php echo $product['brand']; ?></td>
                  <td><?php echo $product['description']; ?></td>
                  <td><?php echo $product['price']; ?></td>
                  <td>
                    <a href="<?php echo ADMIN_URL ?>products/edit.php?product_id=<?php echo $product['product_id']; ?>" class="waves-effect waves-light btn">edit</a>
                    <a href="<?php echo ADMIN_URL ?>products/delete.php?product_id=<?php echo $product['product_id']; ?>" class="waves-effect waves-light btn delete red">delete</a>
                  </td>
                </tr>
              <?php endforeach; ?>
                
            </tbody>
          </table>
          <a href="<?php echo ADMIN_URL ?>products/edit.php" class="btn-floating btn-large waves-effect waves-light"><i class="material-icons">add</i></a>

          <ul class="pagination">
              <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
              <li class="active"><a href="#!">1</a></li>
              <li class="waves-effect"><a href="#!">2</a></li>
              <li class="waves-effect"><a href="#!">3</a></li>
              <li class="waves-effect"><a href="#!">4</a></li>
              <li class="waves-effect"><a href="#!">5</a></li>
              <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
            </ul>

    </div>

</div>
</body>
</html>