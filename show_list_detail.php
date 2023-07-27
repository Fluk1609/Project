<?php include 'condb.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My List</title>
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</head>
<body>
<?php include 'menu.php' ?>
    <br><br> 
<div class="container">
   
<div class="row">
<?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM list,type WHERE list.type_id = type.type_id and list.list_id='$id'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    ?>
    <div class="col-md-4">
      <img src="image/<?=$row['image']?>" width="280px" class="mt-3 my-2 border"/>
    </div>
    <div class="col-md-6">
        <br><br>
      <h4 class="text-dark">ID:<?=$row['list_id']?></h4> 
      <h5 class="text-success"> <?=$row['list_name']?> </h5>
      ประเภทสินค้า : <?=$row['type_name']?> <br>
      รายละเอียด : <?=$row['detail']?> <br>
      ราคา : <?=$row['price']?> </b> บาท <br><br>
      <a class="btn btn-outline-danger" href="show_list.php">กลับ</a>
      <a class="btn btn-outline-success" href="order.php?id=<?=$row['list_id']?>">เพิ่มลงตะกร้า</a>
    </div>
</div>
    <?php
            mysqli_close($conn);
            ?>
  
</div>
</body>
</html>