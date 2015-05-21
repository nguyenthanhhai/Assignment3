<?php require_once('header.php');?>
<?php //If user is not xuatkho header or linking to index.php
$maphieu = $_GET['maphieu'];
$ma = $_GET['ma'];
$ten = $_GET['ten'];
$giaban = $_GET['giaban'];
$soluong = $_GET['soluong'];
$tenkm = $_GET['tenkm'];
$masp = $_GET['masp'];
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
                        <a href="#">EDIT CHITIETPXK</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="box col-md-12">
                <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-list-alt"></i> EDIT CHITIETPXK</h2>
                </div>
                <div class="box-content">
                    <form method="post" role="form" action="../controller/edit_chitietpxk.php">
                        <div class="form-group">
                          <label for="maphieu">MaPhieu:</label>
                          <input type="number" class="form-control" name="maphieu" value="<?php echo $maphieu;?>" readonly/>
                        </div>
                        <div class="form-group">
                          <label for="masp">MaSP:</label>
                          <input type="text" class="form-control" name="masp" value="<?php echo $masp;?>" readonly/>
                        </div>
                        <div class="form-group">
                          <label for="ma">Ma:</label>
                          <input type="text" class="form-control" name="ma" value="<?php echo $ma; ?>" readonly/>
                        </div>
                        <div class="form-group">
                          <label for="ten">Ten:</label>
                          <input type="text" class="form-control" name="ten" value="<?php echo $ten; ?>" readonly/>
                        </div>
                        <div class="form-group">
                          <label for="giaban">GiaBan:</label>
                          <input type="number" class="form-control" name="giaban" value="<?php echo $giaban; ?>"/>
                        </div>
                        <div class="form-group">
                          <label for="soluong">Soluong:</label>
                          <input type="number" class="form-control" name="soluong" value="<?php echo $soluong; ?>" <?php $pos =strpos($masp,'TB'); if($pos == true) echo "readonly";?>/>
                        </div>
                        <div class="form-group">
                          <label for="tenkm">TenKM:</label>
                          <input type="text" class="form-control" name="tenkm" value="<?php echo $tenkm; ?>" readonly/>
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