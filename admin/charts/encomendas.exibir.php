
<?php
$year=date("Y");
?>
<div class="col-lg-8">
<div class="line-chart block chart">
    <div class="title"><strong>Número de encomendas realizadas em <?php echo $year?></strong></div>
    <canvas id="lineChartCustom1"></canvas>
</div>
</div>
<div class="col-lg-4">
    <div class="pie-chart chart block">
        <div class="title"><strong>Estado das linhas da encomenda em <?php echo $year?></strong></div>
        <div class="pie-chart chart margin-bottom-sm">
        <canvas id="pieChartCustom1"></canvas>
        </div>
    </div>
</div>
<?php
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

foreach ($months as $key => $month) {
    $query="    SELECT    COUNT(*) AS '$key'
                FROM      encomendas 
                WHERE   monthname(data_hora)='$month' 
                AND YEAR(data_hora)=$year;";

    $month=db_query($query);
    $stats[$key]=$month[0][$key];
}
  $query="    SELECT    COUNT(*) AS num_total
                FROM      linhas_encomenda LE INNER JOIN encomendas E ON LE.id_encomenda=E.id 
                WHERE   YEAR(data_hora)=$year AND estado=2 GROUP BY E.id;";


$num_total=db_query($query);
$total_p=0;
foreach ($num_total as $key => $count) {
    $total_p+=$count['num_total'];
}
$query="    SELECT    COUNT(*) AS num_total
                FROM      linhas_encomenda LE INNER JOIN encomendas E ON LE.id_encomenda=E.id 
                WHERE   YEAR(data_hora)=$year AND estado=1 GROUP BY E.id;";


$num_total=db_query($query);
$total=0;
foreach ($num_total as $key => $count) {
    $total+=$count['num_total'];
}

?>
<script type="text/javascript">const jArrMonths = <?php echo json_encode($stats); ?>;
const total_progresso=<?php echo json_encode($total_p); ?>;
const total_finalizado=<?php echo json_encode($total); ?>;
const jArrNames=0;
const jArrLikes=0;
const jArrViews=0;
const jArrEmails=0;</script>
<script type="text/javascript" src="charts-customs.js"></script>