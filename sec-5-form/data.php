<?php session_start()?>

<!doctype html>

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
        <div class="row">
            <div class="col-10 mx-auto my-3">

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>image</th>
                            <th>Name</th>
                            <th>description</th>
                            <th>discount</th>
                            <th>price after discount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION['employees'] as $employee) : ?>
                            <tr>
                                <td > <img src="<?php echo 'img/'. $employee['image']  ?>" alt="" style="width: 300px; height:150px;"> </td>
                                <td  ><?php echo $employee['name']; ?></td>
                                <td><?php echo $employee['discription']; ?></td>
                                <td><?php echo $employee['discount']; ?></td>
                                <td><?php echo $employee['price']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>