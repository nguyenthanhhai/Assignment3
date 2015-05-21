<?php require_once('header.php');?>
<?php //If user is not xuatkho header or linking to index.php
include_once('../controller/controller.php');
$controller = new CONTROLLER;
$res = $controller->get_phieu_xuat_kho();
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
                        <a href="#">PHIEUXUATKHO</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="box col-md-12">
                <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-list-alt"></i> PHIEUXUATKHO</h2>
                </div>
                <?php if(isset($_SESSION['success'])) echo $_SESSION['success'];?>
                <div class="box-content">
                <div><a href="insert_phieuxuatkho.php"><img width="20" src="img/plus.jpg" alt=""/></a></div>
                <!--============================Filter===============================================-->
                <form action="table_phieuxuatkho.php" method="post" style="height:40px">
                Lọc theo
                <select name="mode" style="height:30px">
                  <option value="ngay">
                        <label for="ngay">Ngày </label>
                  </option>
                  <option value="thang">
                        <label for="ngay">Tháng </label>
                  </option>
                  <option value="tenkh">
                        <label for="tenkh">TênKH </label>
                  </option>
                  <option value="tennv">
                        <label for="tennv">TênNV </label>
                  </option>
                </select>
                <input type="text" name="value" value="" placeholder="Nhap vao day" style="height:30px"/>
                <input type="submit" class="btn btn-success" name="loc" value="Lọc" onclick="" style="height:30px; width:50px"/>
                </form>
                <!--============================Filter===============================================-->
                <?php
                    if(isset($_POST['loc']) && strcmp($_POST['value'],'') != 0){
                        $res = $controller->get_filter_phieu_xuat_kho($_POST['mode'],$_POST['value']);
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
                    <?php 
                        $maphieu = $res['MAPHIEU'][$i];
                        $ngayban = $res['NGAYBAN'][$i];
                        $ghichu = $res['GHICHU'][$i];
                        $tongtien = $res['TONGTIEN'][$i];
                        $manv = $res['MANV'][$i];
                        $makhach = $res['MAKHACH'][$i];
                    ?>
                    <td><a href="table_chitietpxk.php?maphieu=<?php echo $maphieu;?>" style="color: black; text-decoration:none"><?php echo "$v[$i]";?></a></td>
                    <?php }?>
                    <td>
                        <a href="edit_phieuxuatkho.php?maphieu=<?php echo $maphieu;?>&amp;ngayban=<?php echo $ngayban;?>&amp;ghichu=<?php echo $ghichu;?>&amp;tongtien=<?php echo $tongtien;?>&amp;manv=<?php echo $manv?>&amp;makhach=<?php echo $makhach?>">
                            <img src="img/edit.jpg" width="20"/>
                        </a>
                        &nbsp;
                        <a href="../controller/delete_phieuxuatkho.php?maphieu=<?php echo $maphieu;?>"><img src="img/delete.png" width="20"/></a>
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