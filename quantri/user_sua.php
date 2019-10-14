<?php
$row=null;
$idUser = $_GET['idUser']; settype($idUser,"int");
$kq = $qt->User_Chitiet($idUser);

if (isset($_POST['Ten'])) {
    $Ten = $_POST['Ten'];
    $Pasword = $_POST['Password'];
    $DiaChi = $_POST['DiaChi'];
    $email = $_POST['Email'];
    $qt->User_Sua($Ten,$Pasword, $DiaChi, $email,$idUser);
    echo "<script>document.location='index.php?p=user_ds';</script>";
    exit();


}  
?>


<div class="row clearfix">
    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 center-block" style="float:none">
        <div class="card">
            <div class="header">
                <h2>
                    SỬA USER
                </h2>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);">Action</a></li>
                            <li><a href="javascript:void(0);">Another action</a></li>
                            <li><a href="javascript:void(0);">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="body">
                <form class="form-horizontal" method="post" action="">

                    <div class="row clearfix">
                        <div class="col-sm-3 form-control-label">
                            <label for="Ten">Họ Tên</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="Ten" name="Ten" class="form-control"
                                           placeholder="Nhập họ tên" required value="<?=$kq['HoTen'];?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <!-- <div class="col-sm-3 form-control-label">
                            <label for="User_Name">User Name</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="User_Name" name="User_Name" class="form-control"
                                           placeholder="Nhập user name" value="<?=$kq['Username']?>" disabled>
                                </div>
                            </div>

                        </div> -->

                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-3 form-control-label">
                            <label for="Password">Password</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="password" id="Password" name="Password" class="form-control"
                                           placeholder="Nhập Password" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-3 form-control-label">
                            <label for="DiaChi">Địa Chỉ</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="DiaChi" name="DiaChi" class="form-control"
                                           placeholder="Nhập địa chỉ" value="<?=$kq['DiaChi']?>">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-3 form-control-label">
                            <label for="Email">Email</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="email" id="Email" name="Email" class="form-control" placeholder="Nhập Email" value="<?=$kq['Email']?>">
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">SỬA USER</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>