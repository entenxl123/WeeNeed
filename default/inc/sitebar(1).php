<nav class="pcoded-navbar">
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="pcoded-navigatio-lavel">Navigation</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu active pcoded-trigger">
                                    <a onclick="main()">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">MANAGER WEB SITE</span>
                                    </a>
                                   
                                </li>
                           
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu active pcoded-trigger">
                                    <a onclick="contact()">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext" >เพิ่ม/แก้ไขข้อมูลการติดต่อ</span>
                                    </a>
                                   
                                </li>
                           
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu active pcoded-trigger">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">เพิ่ม/ลบ/แก้ไข  ข่าวประชาสัมพันธ์</span>
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
                                            <a   onclick="news('<?=$row_news[cate_id]?>')">
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
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
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
                                            <a   onclick="menumain('<?=$row[cate_id]?>')">
                                                <span class="pcoded-mtext"><?php echo $row[cate_name].''.$row[cate_id]?></span>
                                            </a>
                                        </li>
                                        <? } ?>
                                    </ul>
                                </li>
                           
                            </ul>
                            
                            
                        </div>
                    </nav>