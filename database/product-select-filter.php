<?php
    include '../database-util.php';
    $prevFilter = false;

    $queryFilter = "SELECT * FROM web.products";
    if(isset($_POST['brandid'])){
        if($prevFilter == true){
            $queryFilter .= " and productid IN (select productid from web.productbrands where brandid=".$_POST['brandid'].")";
        }
        else{
            $prevFilter = true;
            $queryFilter .= " where productid IN (select productid from web.productbrands where brandid=".$_POST['brandid'].")";
        }
    }
    if(isset($_POST['categoryid'])){
        if($prevFilter == true){
            $queryFilter .= " and productid IN (select productid from web.productcategories where categoryid=".$_POST['categoryid'].")";
        }
        else{
            $prevFilter = true;
            $queryFilter .= " where productid IN (select productid from web.productcategories where categoryid=".$_POST['categoryid'].")";
        }
        
    }
    if(isset($_POST['name'])){
        if($prevFilter == true){
            $queryFilter .= " and LOWER(productname) LIKE LOWER('%".$_POST['name']."%')";
        }
        else{
            $prevFilter = true;
            $queryFilter .= " where LOWER(productname) LIKE LOWER('%".$_POST['name']."%')";            
        }
    }

    $products = loadValuesFromDB($queryFilter);

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

      $redirect = "../product.php?product_id=" . $product["productid"];
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