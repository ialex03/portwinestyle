<div class="col-lg-6 col-md-6 col-sm-6">
<div class="shop__pagination">
                        <?php
                        $range = 5;

                        // if not on page 1, don't show back links
                        if ($page > 1) {
                        // show << link to go back to page 1
                        echo " <a href='".$url."&page=1'>⇤</a> ";
                        // get previous page num
                        $prevpage = $page - 1;
                        // show < link to go back to 1 page
                        echo " <a href='".$url."&page=$prevpage'>←</a> ";
                        } // end if 
                        
                        // loop to show links to range of pages around current page
                        for ($x = ($page - $range); $x < (($page + $range) + 1); $x++) {
                        // if it's a valid page number...
                        if (($x > 0) && ($x <= $totalpages)) {
                            // if we're on current page...
                            if ($x == $page) {
                                // 'highlight' it but don't make a link
                                echo " <a><div class='ativo'>$x</div></a> ";
                            // if not current page...
                            } else {
                                // make it a link
                                echo " <a href='".$url."&page=$x'>$x</a> ";
                            } // end else
                        } // end if 
                        }// end for
                                        
                        // if not on last page, show forward and last page links        
                        if ($page != $totalpages) {
                        // get next page
                        $nextpage = $page + 1;
                            // echo forward link for next page 
                        echo " <a href='".$url."&page=$nextpage'>→</a> ";
                        // echo forward link for lastpage
                        echo " <a href='".$url."&page=$totalpages'>⇥</a> ";
                        } // end if
                        /****** end build pagination links ******/
                        
                        ?>
                        </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="shop__last__text">
                            <p><?php echo $arrLang['mostrando'];?> <?php echo $offset+1?> - <?php echo ($offset+$registosporpagina>$numregistos?$numregistos:$offset+$registosporpagina)?><?php echo $arrLang['de'];?><?php echo $numregistos?><?php echo $arrLang['resultados'];?></p>
                        </div>
                    </div>