<?php require_once('header.php');?>
<?php //If user is not xuatkho header or linking to index.php
include_once('../controller/controller.php');
$controller = new CONTROLLER;
$res = $controller->get_doanh_so('','');
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
                        <a href="#">DOANHSO</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="box col-md-12">
                <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-list-alt"></i> DOANHSO</h2>
                </div>
                <?php if(isset($_SESSION['success'])) echo $_SESSION['success'];?>
                <div class="box-content">
                <!--====================================Filter=================================================-->
                <form action="table_doanhso.php" method="post" class="form-inline" role="form" style="height:40px">
                    <div class="form-group">
                    <label for="ngaybd">NgayBD:&nbsp; </label><input style="height:30px" type="date" name="ngaybd" value="<?php if(isset($_POST['ngaybd'])) echo $_POST['ngaybd'];?>"/>
                    </div>
                    <div class="form-group">
                    <label for="ngaykt">NgayKT:&nbsp; </label><input style="height:30px" type="date" name="ngaykt" value="<?php if(isset($_POST['ngaykt'])) echo $_POST['ngaykt'];?>"/>
                    </div>
                    <div class="form-group">
                    <input type="submit" class="btn btn-success" name="loc" value="Lọc" onclick="" style="height:30px"/>
                    </div>
                </form>
                <?php
                    if(isset($_POST['loc']) && strcmp($_POST['ngaybd'],'') != 0 && strcmp($_POST['ngaykt'],'') != 0){
                        $res = $controller->get_doanh_so($_POST['ngaybd'],$_POST['ngaykt']);
                        $fields = array_keys($res);
                        $nrows = sizeof($res[$fields[0]]);
                    }
                ?>
                <!--====================================Filter=================================================-->
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