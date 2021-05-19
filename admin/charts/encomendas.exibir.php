
<div class="col-lg-8">
<div class="line-chart block chart">
    <div class="title"><strong>Line Chart Example</strong></div>
    <canvas id="lineChartCustom1"></canvas>
</div>
</div>
<div class="col-lg-4">
<div class="pie-chart chart block">
    <div class="title"><strong>Pie Chart Example</strong></div>
    <div class="pie-chart chart margin-bottom-sm">
    <canvas id="pieChartCustom1"></canvas>
    </div>
</div>
</div>
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
$query="";
$year=date("Y");
foreach ($months as $key => $month) {
    $query="    SELECT    COUNT(*) AS '$key'
                FROM      encomendas 
                WHERE   monthname(data_hora)='$month' 
                AND YEAR(data_hora)=$year;";

    $month=db_query($query);
    $stats[$key]=$month[0][$key];
}
echo json_encode($stats);
?>
<script type="text/javascript">const jArrMonths = <?php echo json_encode($stats); ?>;</script>
<script type="text/javascript" src="charts-customs.js"></script>