<?php require_once('header.php');?>
<?php //If user is not xuatkho header or linking to index.php
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
                        <a href="#">INSERT PHIEUXUATKHO</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="box col-md-12">
                <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-list-alt"></i> INSERT PHIEUXUATKHO</h2>
                </div>
                <div class="box-content">
                    <form method="post" role="form" action="../controller/insert_phieuxuatkho.php">
                        <div class="form-group">
                          <label for="ngayban">NgayBan:</label>
                          <input type="text" class="form-control" name="ngayban" value="" placeholder="Example: 2015-03-29"/>
                        </div>
                        <div class="form-group">
                          <label for="ghichu">GhiChu:</label>
                          <input type="text" class="form-control" name="ghichu" value="" placeholder="Example: Nothing"/>
                        </div>
                        <div class="form-group">
                          <label for="manv">MaNV:</label>
                          <input type="number" class="form-control" name="manv" value="" placeholder="Example: 1"/>
                        </div>
                        <div class="form-group">
                          <label for="makhach">MaKhach:</label>
                          <input type="number" class="form-control" name="makhach" value="" placeholder="Example: 1"/>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" name="insert" value="Insert" />
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