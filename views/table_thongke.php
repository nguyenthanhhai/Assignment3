<?php require_once('header.php');?>
<?php //If user is not xuatkho header or linking to index.php
include_once('../controller/controller.php');
$controller = new CONTROLLER;
$res = $controller->get_thong_ke();
$fields = array_keys($res);
$nrows = sizeof($res[$fields[0]]);
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
                        <a href="#">THONGKE</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="box col-md-12">
                <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-list-alt"></i> THONGKE</h2>
                </div>
                <?php if(isset($_SESSION['success'])) echo $_SESSION['success'];?>
                <div class="box-content">
                <form action="table_thongke.php" method="post" style="height:40px" class="form-inline">
                    <div class="form-group">
                        <label for="nam">Năm: </label>
                        <input type="number" value="<?php if(isset($_POST['nam'])) echo $_POST['nam'];else echo "2015"?>" name="nam" placeholder="Ex: 2015"/>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="xem" class="btn btn-default">Xem</button>
                    </div>
                </form>
                <?php
                    if(isset($_POST['xem'])){
                        $res = $controller->get_thong_ke($_POST['nam']);
                        $fields = array_keys($res);
                        $nrows = sizeof($res[$fields[0]]);                      
                    }
                ?>
                <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                <thead>
                <tr>
                    <?php foreach($fields as $field){?>
                    <th><?php echo "$field";?></th>
                    <?php }?>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php for($i=0;$i<$nrows;$i++){?>
                <tr>
                    <?php foreach($res as $k => $v){?>
                    <td><?php echo "$v[$i]";?></td>
                    <?php }?>
                </tr>
                <?php }?>
                </tbody>
                </table>
                </div>
                </div>
                </div>
            <!--/span-->
            </div><!--/row-->
        </div>
<!--==================================/Content==================================================-->        
    </div><!--/fluid-row-->

    
    <hr>
    <footer class="row">
        This is footer.
    </footer>

</div><!--/.fluid-container-->
<?php require_once('footer.php');?>