<?php 
session_start();
include 'condb.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php include 'menu.php';?>
    <br><br>
    <div class="container">
        <form id="form1" method="POST" action="">
            <div class="row">
               <div class="col-md-10">
                <div class="alert alert-success h4" role="alert">
                    เพิ่มรายการออร์เดอร์
                </div>

                    <table class="table table-striped">
                        <tr class="table-dark text-center">
                            <th>ลำดับ</th>
                            <th>ชื่อรายการ</th>
                            <th>ราคา</th>
                            <th>จำนวน</th>
                            <th>ราคารวม</th>
                            <th>เพิ่ม-ลด</th>
                            <th>ลบ</th>
                        </tr>
                    <?php 
                    $Total = 0;
                    $sumPrice = 0;
                    $m = 1;
                    for ($i=0;$i<=(int)$_SESSION["intLine"]; $i++){
                        if (($_SESSION["strProductID"][$i]) != ""){
                            $sql1="select * from list where list_id ='" . $_SESSION["strProductID"][$i] . "' ";
                            $result1 = mysqli_query($conn,$sql1);
                            $row_li = mysqli_fetch_array($result1);

                            $_SESSION["price"] = $row_li['price'];
                            $Total = $_SESSION["strQty"][$i];
                            $sum = $Total * $row_li['price'];
                            $sumPrice = $sumPrice + $sum;
                            $sumPrice = number_format($sumPrice,2);
                        
                    ?>
                        <tr class="text-center">
                            <td><?=$m?></td>
                            <td> <img src="image/<?=$row_li['image']?>" width="80px" height="100" class="border">
                                <?=$row_li['list_name']?>
                            </td>
                            <td><?=$row_li['price']?></td>
                            <td><?=$_SESSION["strQty"][$i]?></td>
                            <td><?=$sum?></td>
                            <td>
                                <a href="order.php?id=<?=$row_li['list_id']?>" class="btn btn-outline-primary">+</a>
                                <?php if($_SESSION["strQty"][$i] > 1){?>
                                <a href="order_del.php?id=<?=$row_li['list_id']?>" class="btn btn-outline-danger">-</a>
                                <?php }?>
                            </td>
                            <td>
                                <a href="order_delete.php?Line=<?=$i?>"><img src="image/delete.png" width="30"></a>
                            </td>
                        </tr>
                    <?php 
                    $m=$m+1;
                    }
                }
                    mysqli_close($conn);
                    ?>
                    <tr>
                        <td class="text-end" colspan="5">รวมเป็นเงิน</td>
                        <td class="text-center"><?=$sumPrice?></td>
                        <td>บาท</td>
                    </tr>
                    </table>
                    <div style="text-align:right">
                    <a href="show_list.php"><button type="button" class="btn btn-outline-primary">เลือกรายการเพิ่ม</button></a> 
                    <a href="#"><button type="button" class="btn btn-outline-success">ยืนยันรายการ</button></a> 
                    </div>
                </div>   
            </div>

            <div class="row">
                <div class="col-md-6">
                <div class="alert alert-success h4" role="alert">
                    ข้อมูลลูกค้า
                </div>
                ชื่อ-นามสกุล :
                <input type="text" name="cus_name" class="form-control" require placeholder="ชื่อ-นามสกุล..."><br>
                ที่อยู่
                <textarea class="form-control" require placeholder="ที่อยู่..."></textarea><br>
                เบอร์โทร
                <input type="text" name="cus_tel" class="form-control" require placeholder="เบอร์โทร..." row="3"><br>
                <div style="text-align:right">
            <a href="show_list.php"><button type="button" class="btn btn-outline-success">บันทึก</button></a> 
            <a href="#"><button type="button" class="btn btn-outline-danger">ยกเลิก</button></a>         
                </div>
            </div>
            </div>

        </form>
    </div>
</body>
</html>