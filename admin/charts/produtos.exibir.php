<?php
$year=date("Y");
?>
<div class="col-lg-12">
    <div class="bar-chart block chart">
        <div class="title"><strong>Bar Chart Example</strong></div>
        <div class="bar-chart chart">
        <canvas id="barChartCustom3"></canvas>
        </div>
    </div>
</div>

<?php
$year=date("Y");
$query="";


$query="SELECT    (nome)
        FROM      produtos P 
        INNER JOIN produtos_idiomas PI 
        ON P.id=PI.id 
        WHERE   PI.idioma='pt' AND is_active=1 ORDER BY P.id;";

$nomes=db_query($query);
foreach($nomes as $key=>$nome){
    $nomes[$key]=$nome['nome'];
}
$query="SELECT    (n_likes)
        FROM      produtos 
        WHERE     is_active=1 ORDER BY id;";
$likes=db_query($query);
foreach($likes as $key=>$like){
    $likes[$key]=$like['n_likes'];
}
$query="SELECT    (views)
        FROM      produtos 
        WHERE     is_active=1 ORDER BY id;";
$views=db_query($query);
foreach($views as $key=>$view){
    $views[$key]=$view['views'];
}
?>
<script type="text/javascript">const jArrNames=<?php echo json_encode($nomes);?>;
const jArrLikes=<?php echo json_encode($likes);?>.map(Number);
const jArrViews=<?php echo json_encode($views);?>.map(Number);
const jArrMonths =0;
const total_progresso=0;
const total_finalizado=0;</script>
<script type="text/javascript" src="charts-customs.js"></script>
