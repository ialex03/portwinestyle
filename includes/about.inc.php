<section class="about spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    
                    <div class="about__video set-bg">
                    <iframe width="930" height="500" src="https://www.youtube.com/embed/XXaAgOA_MqY" 
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen></iframe>
                    
                    
                        <!--<a href="https://www.youtube.com/watch?app=desktop&v=XXaAgOA_MqY&ab_channel=%D0%9F%D0%A0%D0%9E%D0%94%D0%AD%D0%9A%D0%A1%D0%9F%D0%9E"
                        class="play-btn video-popup"><i class="fa fa-play"></i></a>-->
                    </div>
                    
                </div>
            </div>
            <?php
            $query="SELECT * FROM paginas A INNER JOIN paginas_idiomas B ON A.id=B.id WHERE A.is_active = 1 AND B.idioma='$_SESSION[idioma]' AND A.route='sobrenos.php' ORDER BY A.id";
            $arrAssuntos=db_query($query);
             include $arrSETTINGS['dir_site'].'/includes/info.inc.php'; ?>
                <!--Graph
                <div class="col-lg-6 col-md-6">
                    <div class="about__bar">
                        <div class="about__bar__item">
                            <p>Cake design</p>
                            <div id="bar1" class="barfiller">
                                <div class="tipWrap"><span class="tip"></span></div>
                                <span class="fill" data-percentage="95"></span>
                            </div>
                        </div>
                        <div class="about__bar__item">
                            <p>Cake Class</p>
                            <div id="bar2" class="barfiller">
                                <div class="tipWrap"><span class="tip"></span></div>
                                <span class="fill" data-percentage="80"></span>
                            </div>
                        </div>
                        <div class="about__bar__item">
                            <p>Cake Recipes</p>
                            <div id="bar3" class="barfiller">
                                <div class="tipWrap"><span class="tip"></span></div>
                                <span class="fill" data-percentage="90"></span>
                            </div>
                        </div>
                    </div>
                </div>-->
        </div>
    </section>