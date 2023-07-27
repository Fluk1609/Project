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
<table class="table table-striped">
            <thead class="table-dark text-center">
                <tr>
                    <th>ลำดับ</th>
                    <th>ชื่อรายการ</th>
                    <th>ประเภทรายการ</th>
                    <th>ราคา</th>
                    <th>รายละเอียด</th>
                </tr>
            </thead>
            <?php
            $sql = "SELECT * FROM list , type WHERE list.type_id=type.type_id";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <tbody class = "text-center">
                    <tr>
                        <td><?=$row['list_id']?></td>
                        <td><?=$row['list_name']?></td>
                        <td><?=$row['type_name']?></td>
                        <td><b class="text-danger"><?=$row['price']?></b></td>
                        <td>
                            <a class="btn btn-outline-success" href="show_list_detail.php?id=<?=$row["list_id"]?>">รายละเอียด</a>
                        </td>
                    </tr>
                </tbody>
            <?php
            }
            mysqli_close($conn);
            ?>            
        </table>   
  </div>
</div>
</body>
</html>