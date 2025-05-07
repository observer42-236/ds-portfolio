<?php
  ini_set('display_errors', 1);
error_reporting(~0);
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
  $connection = pg_connect  ("host=192.168.0.0 dbname=db user=db password=12345");
   
  $query_dates="select distinct date from hashtag_dash_new order by date";

  $query_names="select distinct metric_name from hashtag_dash_new";

  $query_dates_connection = pg_query ($connection,$query_dates);
  
  $query_names_connection = pg_query ($connection,$query_names);

  // $query_cols_connection=pg_fetch_all($query_cols_connection);

while($row = pg_fetch_row($query_dates_connection)) {
    $dates[] =$row[0];             
};
while($row = pg_fetch_row($query_names_connection)) {
    $metric_names[] =$row[0];             
};
$metric=str_replace(" ", "_", $metric_names);
$metric=str_replace(" ", "_", $metric);
$metric=str_replace("-->", "_", $metric);
$metric=str_replace("/", "_", $metric);
// print_r($metric);
$i=0;
  foreach ($metric_names as $metric_tbl) {
  	# code...
  
  $query_cols="select distinct date, step_1, step_2, metric_name, value from hashtag_dash_new  where metric_name='$metric_tbl' order by date";

  $query_cols_connection = pg_query ($connection,$query_cols);
  ${"trend_chart_".$metric[$i]}=pg_fetch_all($query_cols_connection);
// print_r( ${"trend_chart_".$metric[$i]});

  // $query_cols_connection_1=pg_fetch_all($query_cols_connection);
  // print_r(  $query_cols_connection_1);

${"trend_chart_value_step_1_".$metric[$i]}=array_column(${"trend_chart_".$metric[$i]},"step_1");
${"trend_chart_value_step_2_".$metric[$i]}=array_column(${"trend_chart_".$metric[$i]},"step_2");
${"trend_chart_value_".$metric[$i]}=array_column(${"trend_chart_".$metric[$i]},"value");

${"trend_chart_value_date_".$metric[$i]}=array_column(${"trend_chart_".$metric[$i]},"date");

${"trend_chart_value_step_1_int_".$metric[$i]}=[];
${"trend_chart_value_step_2_int_".$metric[$i]}=[];
${"trend_chart_value_value_int_".$metric[$i]}=[];

foreach (${"trend_chart_value_step_1_".$metric[$i]} as $vlu) {
 array_push(${"trend_chart_value_step_1_int_".$metric[$i]}, round(floatval($vlu),1));    # code...

 };

foreach (${"trend_chart_value_step_2_".$metric[$i]} as $vlu) {
 array_push(${"trend_chart_value_step_2_int_".$metric[$i]}, round(floatval($vlu),1));    # code...

 };


foreach (${"trend_chart_value_".$metric[$i]} as $vlu) {
 array_push(${"trend_chart_value_value_int_".$metric[$i]}, round((floatval($vlu)*100),2));    # code...

 };
 $i++;

};

// $dates=json_encode($dates);
$date=[];
foreach ($dates as $dt) {
	  $dt= date('M d',strtotime($dt));
      array_push($date, $dt);
}
$dates=json_encode($date);
$value_ED_Hashtag_DAU=[];
foreach ($trend_chart_value_value_int_Hashtag_Open_ED as $vlu) {
 array_push($value_ED_Hashtag_DAU, round($vlu/100,3));    # code...

 };

?>
