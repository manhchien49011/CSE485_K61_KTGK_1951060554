<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <title>Index</title>
  </head>
  <body>
    <div class="container_fliud">
        <div class="row-header">
            <div class="col-md-12">
                <img src="./logo.png" class="img-fluid" alt="" />
            </div>
        </div>
        <div class="row-nav-menu">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Quản lý</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    
                    
                    </div>
                </div>
            </nav> 
            <div class="row">
                </div>
                <div class="col-md-12 ">
                    
                    <div>
                        <button ><a href="http://localhost:88/nhan_mau/them.php">Thêm danh sách</a></button>
                    </div>
                    <?php
                    if(isset($_GET['response'])){
                        if($_GET['response']=='successfully'){
                            echo "<p class='text-danger'>Thêm thành công</p>";
                        }
                        if($_GET['response']=='existed'){
                            echo "<p class='text-danger'>Thêm thất bại</p>";
                        }
                        if($_GET['response']=='ok'){
                            echo "<p class='text-danger'>Sửa thành công</p>";
                        }
                        if($_GET['response']=='xoa'){
                            echo "<p class='text-danger'>Xóa thành công</p>";
                        }
                        
                    }
                  ?>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Mã người nhận máu</th>
                            <th scope="col">Họ và tên</th>
                            <th scope="col">Tuổi</th>
                            <th scope="col">Nhóm máu</th>
                            <th scope="col">Số máu nhận</th>
                            <th scope="col">Giới tính</th>
                            <th scope="col">Ngày đăng kí nhận</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Sửa</th>
                            <th scope="col">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                //lấy dữ liệu từ CSDL và để ra bảng (phần lặp lại)
                                //bước 1:kết nối tời csdl(mysql)
                                $conn = mysqli_connect('localhost','root','','blood_recipient');
                                if(!$conn){
                                    die("Không thể kết nối,kiểm tra lại các tham số kết nối");
                                }

                                //bước 2 khai báo câu lệnh thực thi và thực hiện truy vấn
                                $sql = "SELECT * from blood_recipient";
                                $result = mysqli_query($conn,$sql);

                                //bước 3 xử lý kết quả trả về
                                if(mysqli_num_rows($result) > 0){
                                    $i=1;
                                    while($row = mysqli_fetch_assoc($result)){
                            ?>
                            
                            <tr>
                            <th scope="row"><?php echo $i; ?> </th>
                            <td><?php echo $row['reci_id']; ?> </td>
                            <td><?php echo $row['reci_name']; ?> </td>
                            <td><?php echo $row['reci_age']; ?> </td>
                            <td><?php echo $row['reci_bgrp']; ?> </td>
                            <td><?php echo $row['reci_bqnty']; ?> </td>
                            <td><?php echo $row['reci_sex']; ?> </td>
                            <td><?php echo $row['reci_reg_date']; ?> </td>
                            <td><?php echo $row['reci_phno']; ?> </td>
                            <td><a href="sua.php?reci_id=<?php echo $row['reci_id']; ?>"><i class="fas fa-edit"></i></a></td>
                            <td><a href="xoa.php?reci_id=<?php echo $row['reci_id']; ?>"><i class="fas fa-trash"></i></a></td>
                            </tr>
                            <?php
                                $i++;
                                }
                            }
                            ?>
                        </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script src="../js/uploads.js"</script> -->  
  </body>
</html>