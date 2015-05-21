<?php require_once('header.php');?>
<?php //If user is not xuatkho header or linking to index.php
include_once('../controller/controller.php');
$controller = new CONTROLLER;
$res = $controller->get_nhan_vien();
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
                        <a href="#">NHANVIEN</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="box col-md-12">
                <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-list-alt"></i> NHANVIEN</h2>
                </div>
                <?php if(isset($_SESSION['success'])) echo $_SESSION['success'];?>
                <div class="box-content">
                <div><a href="insert_nhanvien.php"><img src="img/plus.jpg" alt="" width="20" /></a></div>
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
                        $manv = $res['MANV'][$i];
                        $holot = $res['HOLOT'][$i];
                        $ten = $res['TEN'][$i];
                        $diachi = $res['DIACHI'][$i];
                        $ngaysinh = $res['NGAYSINH'][$i];
                        $ngoaingu = $res['NGOAINGU'][$i];
                        $email = $res['EMAIL'][$i];
                        $sdtnoibo = $res['SDTNOIBO'][$i];
                        $didong = $res['DIDONG'][$i];
                        $ngayvao = $res['NGAYVAO'][$i];
                        $luong = $res['LUONG'][$i];
                        $vitri = $res['VITRI'][$i];
                    ?>
                    <td width="8%"><?php echo "$v[$i]";?></td>
                    <?php }?>
                    <td>
                        <a href="edit_nhanvien.php?manv=<?php echo $manv;?>&amp;holot=<?php echo $holot;?>&amp;ten=<?php echo $ten;?>&amp;diachi=<?php echo $diachi;?>&amp;ngaysinh=<?php echo $ngaysinh;?>&amp;ngoaingu=<?php echo $ngoaingu;?>&amp;email=<?php echo $email;?>&amp;sdtnoibo=<?php echo $sdtnoibo;?>&amp;didong=<?php echo $didong;?>&amp;ngayvao=<?php echo $ngayvao;?>&amp;luong=<?php echo $luong;?>&amp;vitri=<?php echo $vitri;?>">
                            <img src="img/edit.jpg" width="20"/>
                        </a>
                        &nbsp;
                        <a href="../controller/delete_nhanvien.php?manv=<?php echo $manv;?>"><img src="img/delete.png" width="20"/></a>
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