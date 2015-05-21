<?php require_once('header.php');?>
<?php //If user is not xuatkho header or linking to index.php
$manv = $_GET['manv'];
$holot = $_GET['holot'];
$ten = $_GET['ten'];
$diachi = $_GET['diachi'];
$ngaysinh = $_GET['ngaysinh'];
$ngoaingu = $_GET['ngoaingu'];
$email = $_GET['email'];
$sdtnoibo = $_GET['sdtnoibo'];
$didong = $_GET['didong'];
$ngayvao = $_GET['ngayvao'];
$luong = $_GET['luong'];
$vitri = $_GET['vitri'];

?>
<div class="ch-container">
    <div class="row">
        
        <?php require_once('left-sidebar.php');?>

        <noscript>
            <div class="alert alert-block col-md-12">
                <h4 class="alert-heading">Warning!</h4>

                <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
                    enabled to use this site.</p>
            </div>
        </noscript>

<!--===================================Content==================================================-->
        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Tables</a>
                    </li>
                    <li>
                        <a href="#">EDIT NHANVIEN</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="box col-md-12">
                <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-list-alt"></i> EDIT NHANVIEN</h2>
                </div>
                <div class="box-content">
                    <form method="post" role="form" action="../controller/edit_nhanvien.php">
                        <div class="form-group">
                          <label for="manv">MaNV:</label>
                          <input type="number" class="form-control" name="manv" value="<?php echo $manv;?>" readonly/>
                        </div>
                        <div class="form-group">
                          <label for="holot">HOLOT:</label>
                          <input type="text" class="form-control" name="holot" value="<?php echo $holot;?>" />
                        </div>
                        <div class="form-group">
                          <label for="ten">TEN:</label>
                          <input type="text" class="form-control" name="ten" value="<?php echo $ten;?>" />
                        </div>
                        <div class="form-group">
                          <label for="diachi">DIACHI:</label>
                          <input type="text" class="form-control" name="diachi" value="<?php echo $diachi;?>"/>
                        </div>
                        <div class="form-group">
                          <label for="ngaysinh">NGAYSINH:</label>
                          <input type="text" class="form-control" name="ngaysinh" value="<?php echo $ngaysinh;?>" />
                        </div>
                        <div class="form-group">
                          <label for="ngoaingu">NGOAINGU:</label>
                          <input type="text" class="form-control" name="ngoaingu" value="<?php echo $ngoaingu;?>" />
                        </div>
                        <div class="form-group">
                          <label for="email">EMAIL:</label>
                          <input type="text" class="form-control" name="email" value="<?php echo $email;?>" />
                        </div>
                        <div class="form-group">
                          <label for="sdtnoibo">SDTNOIBO:</label>
                          <input type="text" class="form-control" name="sdtnoibo" value="<?php echo $sdtnoibo;?>" />
                        </div>
                        <div class="form-group">
                          <label for="didong">DIDONG:</label>
                          <input type="text" class="form-control" name="didong" value="<?php echo $didong;?>" />
                        </div>
                        <div class="form-group">
                          <label for="ngayvao">NGAYVAO:</label>
                          <input type="text" class="form-control" name="ngayvao" value="<?php echo $ngayvao;?>" />
                        </div>
                        <div class="form-group">
                          <label for="luong">LUONG:</label>
                          <input type="number" class="form-control" name="luong" value="<?php echo $luong;?>" />
                        </div>
                        <div class="form-group">
                          <label for="vitri">VITRI:</label>
                          <input type="text" class="form-control" name="vitri" value="<?php echo $vitri;?>" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" name="edit" value="Edit" />
                        </div>
                    </form>
                </div>
                </div>
                </div>
            </div>    
        </div>
<!--==================================/Content==================================================-->        
    </div><!--/fluid-row-->

    
    <hr>
    <footer class="row">
        This is footer.
    </footer>

</div><!--/.fluid-container-->
<?php require_once('footer.php');?>