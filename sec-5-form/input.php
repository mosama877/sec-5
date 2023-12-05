<!doctype html>
<?php session_start()?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    
  <?php include('nav.php'); ?>

    <div class="container">

    <h1>product iformation</h1>
    <?php
    if(isset($_SESSION["error"]))  : ?>
    <div class="alert bg-danger">
    <?php
        echo $_SESSION['error'];
        unset($_SESSION['error'])
    ?>
    </div>
    <?php endif; ?>
    <?php
    if(isset($_SESSION["success"]))  : ?>
    <div class="alert alert-success">
    <?php
        echo $_SESSION['success'];
        unset($_SESSION['success'])
    ?>
    </div>
    <?php endif; ?>
    <form action="handle.php" method="POST" class="border p-3 my-5" enctype="multipart/form-data">
    <div class="mb-3 ">
        <label for="" class=""> name</label>
        <input type="text" name="name" class="form-control" placeholder= " Enter product name">
    </div>
    <div class="mb-3 ">
        <label for="
        " class="w-100">description</label>
        <textarea name="textarea" class="w-100" rows="5"  placeholder= " Enter product description"></textarea>
    </div>
    <div class="mb-3">
    <label for="" class=""> price</label>
        <input type="number" name="price" class="form-control" placeholder=" Enter product price" >
    </div>
    <div class="mb-3">
    <label for="" class=""> discount</label>
        <input type="number" name="discount" class="form-control" placeholder= " Enter product discount (if any)">
    </div>
    <div class="mb-3">
        <label for="productImage">Image:</label>
        <input type="file" name="image" class="form-control" id="productImage" placeholder="Enter product image URL">
        
        </div>
        <div class="mb-3">
        <input type="submit" class="form-control bg-primary" value="save" >
    </div>
    </div>
    
    </form>
    
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>