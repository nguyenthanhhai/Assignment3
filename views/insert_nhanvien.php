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
                        <a href="#">INSERT NHANVIEN</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="box col-md-12">
                <div class="box-inner">
                 <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-list-alt"></i> INSERT NHANVIEN</h2>
                </div>
                <div class="box-content">
                    <form method="post" role="form" action="../controller/insert_nhanvien.php">
                        <div class="form-group">
                          <label for="holot">HOLOT:</label>
                          <input type="text" class="form-control" name="holot" value="" />
                        </div>
                        <div class="form-group">
                          <label for="ten">TEN:</label>
                          <input type="text" class="form-control" name="ten" value="" />
                        </div>
                        <div class="form-group">
                          <label for="diachi">DIACHI:</label>
                          <input type="text" class="form-control" name="diachi" value=""/>
                        </div>
                        <div class="form-group">
                          <label for="ngaysinh">NGAYSINH:</label>
                          <input type="date" class="form-control" name="ngaysinh" value="" />
                        </div>
                        <div class="form-group">
                          <label for="ngoaingu">NGOAINGU:</label>
                          <input type="text" class="form-control" name="ngoaingu" value="" />
                        </div>
                        <div class="form-group">
                          <label for="email">EMAIL:</label>
                          <input type="text" class="form-control" name="email" value="" />
                        </div>
                        <div class="form-group">
                          <label for="sdtnoibo">SDTNOIBO:</label>
                          <input type="text" class="form-control" name="sdtnoibo" value="" />
                        </div>
                        <div class="form-group">
                          <label for="didong">DIDONG:</label>
                          <input type="text" class="form-control" name="didong" value="" />
                        </div>
                        <div class="form-group">
                          <label for="bc_cc">BC_CC:</label>
                          <input type="text" class="form-control" name="bc_cc" value="" />
                        </div>
                        <div class="form-group">
                          <label for="ngayvao">NGAYVAO:</label>
                          <input type="date" class="form-control" name="ngayvao" value="" />
                        </div>
                        <div class="form-group">
                          <label for="luong">LUONG:</label>
                          <input type="number" class="form-control" name="luong" value="" />
                        </div>
                        <div class="form-group">
                          <label for="vitri">VITRI:</label>
                          <input type="text" class="form-control" name="vitri" value="" />
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