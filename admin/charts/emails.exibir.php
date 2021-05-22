
<?php
$year=date("Y");

$months = array(
    'Janeiro'=>'January',
    'Fevereiro'=>'February',
    'Março'=>'March',
    'Abril'=>'April',
    'Maio'=>'May',
    'Junho'=>'June',
    'Julho'=>'July ',
    'Agosto'=>'August',
    'Setembro'=>'September',
    'Outubro'=>'October',
    'Novembro'=>'November',
    'Dezembro'=>'December',
);
$stats = array(
    'Janeiro'=>'',
    'Fevereiro'=>'',
    'Março'=>'',
    'Abril'=>'',
    'Maio'=>'',
    'Junho'=>'',
    'Julho'=>'',
    'Agosto'=>'',
    'Setembro'=>'',
    'Outubro'=>'',
    'Novembro'=>'',
    'Dezembro'=>'',
);
$medias = 0;
$query="";

foreach ($months as $key => $month) {
    $query="    SELECT    COUNT(*) AS '$key'
                FROM      emails
                WHERE   monthname(sent_at)='$month' 
                AND YEAR(sent_at)=$year;";

    $mon=db_query($query);
    $stat[$key]=$mon[0][$key];
    $medias+=$mon[0][$key];
}

$media=$medias/12;

?>
<div class="col-lg-12">
    <div class="chart block">
    <div class="title"> <strong>Média de emails por mês em <?php echo $year?></strong></div>
        <div class="statistic-block block">
            <div class="progress-details d-flex align-items-end justify-content-between">
            
            <div class="number dashtext-2"><?php echo $media?></div>
            </div>
        </div>
        <div class="title"> <strong>Número de emails em <?php echo $year?></strong></div>
        <div class="bar-chart chart margin-bottom-sm">
        <canvas id="barChartCustom1"></canvas>
        </div>
        
        </div>
    </div>
</div>

<script type="text/javascript">const jArrMonths = 0;
const total_progresso=0;
const total_finalizado=0;
const jArrNames=0;
const jArrLikes=0;
const jArrViews=0;
const jArrEmails = <?php echo json_encode($stat); ?>;</script>
<script type="text/javascript" src="charts-customs.js"></script>