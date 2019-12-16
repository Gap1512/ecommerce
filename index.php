<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Main Page</title>
    <?php include 'database-util.php' ?>
</head>
<body>
  <?php include 'navbar.php' ?>

  <div class="container">
    <input style="margin: 20px"class="form-control" type="text" placeholder="Search" aria-label="Search">
    <div class="row">

      <div class="col-lg-3">
        <h3 class="my-4">Categorias</h3>
        <div class="list-group filter">
          <?php
            $categories = loadValuesFromDB("select * from web.Categories");
            foreach($categories as &$category){
              //foreach($brand as $key => &$value){
              //  echo $key;
              //  echo $value;
              //}
              echo '<a href="#" class="list-group-item">'.$category['categoryname'].'</a>';
            } 
          ?>
          <a href="#" class="list-group-item">Celulares</a>
          <a href="#" class="list-group-item">Televisores</a>
          <a href="#" class="list-group-item">Geladeiras</a>
        </div>
        <div style="margin-top: 50px;">
          <h3 class="my-4">Marcas</h3>
        </div>
        <div class="list-group filter">
          <?php
            $brands = loadValuesFromDB("select * from web.Brands");
            foreach($brands as &$brand){
              //foreach($brand as $key => &$value){
              //  echo $key;
              //  echo $value;
              //}
              echo '<a href="#" class="list-group-item">'.$brand['brandname'].'</a>';
            } 
          ?>
          <a href="#" class="list-group-item">Android</a>
          <a href="#" class="list-group-item">IOS</a>
          <a href="#" class="list-group-item">Outros</a>
        </div>
      </div>
      <!-- /.col-lg-3 -->
      <div class="col-lg-9">
        <div class="row" id="productsrow">
          <?php
          $products = loadValuesFromDB("select * from web.products");
          foreach($products as &$product){
            $ratingtext = "";
            $ratingnumber = $product["productrating"];
            for($i = 0; $i < 5; $i++){
              if($i < $ratingnumber){
                $ratingtext .= "&#9733; ";
              } else{
                $ratingtext .= "&#9734; ";
              }
            }
            $redirect = "product.php?product_id=" . $product["productid"];
            echo '
              <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                  <a href='.$redirect.'><img class="card-img-top" src="'.$product["productimage"].'" alt=""></a>
                  <div class="card-body">
                    <h4 class="card-title">
                      <a href='.$redirect.'>'.$product["productname"].'</a>
                    </h4>
                    <h5>R$ '.$product["productprice"].'.00</h5>
                    <p class="card-text">'.$product["productdescription"].'</p>
                  </div>
                  <div class="card-footer">
                    <small class="text-muted">'.$ratingtext.'</small>
                  </div>
                </div>
              </div>';
          }
          ?>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>

  <script type="text/javascript" src="js/filters.js"></script>
</body>
</html>
