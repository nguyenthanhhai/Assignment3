<?php require_once('header.php');?>
<?php
include_once('../controller/controller.php');
$maphieu = $_GET['maphieu'];

$controller = new CONTROLLER;
$res = $controller->get_chi_tiet_pxk($maphieu);
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
                        <a href="#">CHITIETPXK</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="box col-md-12">
                <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-list-alt"></i> CHITIETPXK</h2>
                </div>
                <div class="box-content">
                <div>
                    <a href="insert_chitietpxk.php?maphieu=<?php echo $maphieu;?>"><img width="20" src="img/plus.jpg"/></a>
                </div>
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
                    <?php 
                        $maphieu = $res['MAPHIEU'][$i];
                        $ma = $res['MA'][$i];
                        $ten = $res['TEN'][$i];
                        $giaban = $res['GIABAN'][$i];
                        $soluong = $res['SOLUONG'][$i];
                        $tenkm = $res['TENKM'][$i];
                        $masp = $res['MASP'][$i];
                    ?>
                    <td><?php echo "$v[$i]";?></td>
                    <?php }?>
                    <td>
                        <a href="edit_chitietpxk.php?maphieu=<?php echo $maphieu;?>&amp;masp=<?php echo $masp;?>&amp;ma=<?php echo $ma;?>&amp;ten=<?php echo $ten;?>&amp;giaban=<?php echo $giaban;?>&amp;soluong=<?php echo $soluong;?>&amp;tenkm=<?php echo $tenkm;?>">
                            <img src="img/edit.jpg" width="20"/>
                        </a>
                        &nbsp;
                        <a href="../controller/delete_chitietpxk.php?maphieu=<?php echo $maphieu;?>&amp;masp=<?php echo $masp;?>"><img src="img/delete.png" width="20"/></a>
                    </td>
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