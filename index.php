<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Main Page</title>
    <?php include 'database-util.php' ?>
    <link rel="stylesheet" href="css/fontawesome/css/all.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
  <?php include 'navbar.php' ?>

  <div class="container">
    <div class="row">
        <input style="margin: 20px; width: 85%;" class="form-control" id="searchbar" type="text" placeholder="Search" aria-label="Search">
        <button type="button" class="btn btn-sm btn-default" id="searchbutton"><span class="fas fa-search" > </span></button>
    </div>
    
    <div class="row">

      <div class="col-lg-3">
        <h3 class="my-4">Categorias</h3>
        <div class="list-group filter">
          <?php
            $categories = loadValuesFromDB("select * from web.Categories");
            echo '<button style="text-align: left" class="list-group-item button categoryfilter" type="button" value="">Todas</button>';
            foreach($categories as &$category){
              //foreach($brand as $key => &$value){
              //  echo $key;
              //  echo $value;
              //}
              echo '<button style="text-align: left" class="list-group-item button categoryfilter" type="button" value="'.$category['categoryid'].'">'.$category['categoryname'].'</button>';
            } 
          ?>
          <a class="list-group-item">Celulares</a>
          <a class="list-group-item">Televisores</a>
          <a  class="list-group-item">Geladeiras</a>
        </div>
        <div style="margin-top: 50px;">
          <h3 class="my-4">Marcas</h3>
        </div>
        <div class="list-group filter">
          <?php
            $brands = loadValuesFromDB("select * from web.Brands");
            echo '<button style="text-align: left" class="list-group-item button brandfilter" type="button" value="">Todas</button>';
            foreach($brands as &$brand){
              //foreach($brand as $key => &$value){
              //  echo $key;
              //  echo $value;
              //}
              echo '<button style="text-align: left" class="list-group-item button brandfilter" type="button" value="'.$brand['brandid'].'">'.$brand['brandname'].'</button>';
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
          <?php include 'database/product-selection-index.php'?>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>

  <script type="text/javascript" src="js/filters.js"></script>
  <script type="text/javascript" src="js/index.js"></script>
</body>
</html>
