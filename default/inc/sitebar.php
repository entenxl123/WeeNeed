<nav class="pcoded-navbar">
                        <?php if($section == 1){ ?>
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="pcoded-navigatio-lavel">Navigation</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu active pcoded-trigger">
                                    <a href='index_manager.php?section=1'>
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">MANAGER WEB SITE</span>
                                    </a>
                                   
                                </li>
                           
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu active pcoded-trigger">
                                    <a href="box_contact.php?section=1">
                                        <span class="pcoded-micon"><i class="icofont icofont-ui-contact-list"></i></span>
                                        <span class="pcoded-mtext" >เพิ่ม/แก้ไขข้อมูลการติดต่อ</span>
                                    </a>
                                   
                                </li>
                           
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu active pcoded-trigger">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="icofont icofont-newspaper"></i></span>
                                        <span class="pcoded-mtext">เพิ่ม/ลบ/แก้ไข  ข่าว</span>
                                    </a>
                                    
                                    <ul class="pcoded-submenu">
                                    <?
                                        $sql_news="SELECT
                                                        tb_category.cate_id,
                                                        tb_category.cate_name
                                                        FROM tb_category
                                                        ORDER BY tb_category.cate_id ASC";
                                        $query_news=mysql_query($sql_news);
                                        while($row_news=mysql_fetch_array($query_news)){
                                    ?>
                                        <li class="">
                                            <a  href="list_news2_new.php?section=1&cate_id=<?=$row_news[cate_id]?>">
                                                <span class="pcoded-mtext"><?php echo $row_news[cate_name]?></span>
                                            </a>
                                        </li>
                                        <? } ?>
                                    </ul>

                                </li>
                           
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu active pcoded-trigger">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="icofont icofont-page"></i></span>
                                        <span class="pcoded-mtext">เพิ่ม/ลบ/แก้ไข เมนู</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                    <?
                                                        $sql="SELECT
                                                        tb_category.cate_id,
                                                        tb_category.cate_name
                                                        FROM tb_category
                                                        ORDER BY tb_category.cate_id ASC";
                                        $query=mysql_query($sql);
                                        while($row=mysql_fetch_array($query)){
                                                    ?>
                                        <li class="">
                                            <a  href="list_menumain_new.php?section=1&cate_id=<?=$row[cate_id]?>">
                                                <span class="pcoded-mtext"><?php echo $row[cate_name]?></span>
                                            </a>
                                        </li>
                                        <? } ?>
                                    </ul>
                                </li>
                           
                            </ul>
                            
                            
                        </div>
                        <?php } ?>
                        <?php if($section == 2){ ?>
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="pcoded-navigatio-lavel">Navigation</div>
                           
                        <ul class="pcoded-item ">
                                <li class="">
                                    <a href='show_approve.php?section=2'>
                                        <span class="pcoded-micon"><i class="icofont icofont-document-folder"></i></span>
                                        <span class="pcoded-mtext">ข้อมูลหลักเอกสาร</span>
                                    </a>
                                   
                                </li>
                           
                            </ul>
                            <ul class="pcoded-item ">
                                <li class="">
                                    <a href='view_approve.php?section=2'>
                                        <span class="pcoded-micon"><i class="icofont icofont-eye"></i></span>
                                        <span class="pcoded-mtext">เอกสารขออนุมัติ</span>
                                    </a>
                                   
                                </li>
                           
                            </ul>

                           
                            
                            
                        </div>
                        <?php } ?>
                    </nav>