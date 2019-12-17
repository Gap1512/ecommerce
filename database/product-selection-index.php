
<?php
    $products = loadValuesFromDB('select * from web.products');

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

      $redirect = "../ecommerce/product.php?product_id=" . $product["productid"];
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