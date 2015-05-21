<?php require_once('header.php');?>
<?php //If user is not xuatkho header or linking to index.php
$maphieu = $_GET['maphieu'];
$ngayban = $_GET['ngayban'];
$ghichu = $_GET['ghichu'];
$tongtien = $_GET['tongtien'];
$manv = $_GET['manv'];
$makhach = $_GET['makhach'];
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
                        <a href="#">EDIT PHIEUXUATKHO</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="box col-md-12">
                <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-list-alt"></i> EDIT PHIEUXUATKHO</h2>
                </div>
                <div class="box-content">
                    <form method="post" role="form" action="../controller/edit_phieuxuatkho.php">
                        <div class="form-group">
                          <label for="maphieu">MaPhieu:</label>
                          <input type="number" class="form-control" name="maphieu" value="<?php echo $maphieu;?>" readonly/>
                        </div>
                        <div class="form-group">
                          <label for="ngayban">NgayBan:</label>
                          <input type="text" class="form-control" name="ngayban" value="<?php echo $ngayban; ?>"/>
                        </div>
                        <div class="form-group">
                          <label for="ghichu">GhiChu:</label>
                          <input type="text" class="form-control" name="ghichu" value="<?php echo $ghichu; ?>"/>
                        </div>
                        <div class="form-group">
                          <label for="tongtien">TongTien:</label>
                          <input type="number" class="form-control" name="tongtien" value="<?php echo $tongtien; ?>" readonly/>
                        </div>
                        <div class="form-group">
                          <label for="manv">MaNV:</label>
                          <input type="number" class="form-control" name="manv" value="<?php echo $manv; ?>"/>
                        </div>
                        <div class="form-group">
                          <label for="makhach">MaKhach:</label>
                          <input type="number" class="form-control" name="makhach" value="<?php echo $makhach; ?>" readonly/>
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