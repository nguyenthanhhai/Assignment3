<?php 
if(class_exists('Controller')){
    $controller = new CONTROLLER;
}else{
    die('Error');
}

$list_table_name = $controller->get_list_table_name();
?>
<!-- left menu starts -->
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked">
                    </div>
                    <ul class="nav nav-pills nav-stacked main-menu">
                        <li class="nav-header">Main</li>
                        <li><a class="ajax-link" href="index.php"><i class="glyphicon glyphicon-home"></i><span> Dashboard</span></a>
                        </li>
                        <li class="nav-header hidden-md">Data management</li>
                        <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-list"></i><span> Tables</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <?php foreach($list_table_name as $value){?>
                                <li><a href="table_<?php echo strtolower($value);?>.php"><?php echo "$value";?></a></li>
                                <?php }?>
                            </ul>
                        </li>
                        </li>
                        <li><a href="#"><i class="glyphicon glyphicon-cog"></i><span> Setting</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/span-->
        <!-- left menu ends -->