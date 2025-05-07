<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Hashtag Dashboard</title>
  <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no' />

  <!-- Demo Dependencies -->
<!-- Here some feedback:
1) Tag favorite — we should add a conversion trend line (Hashtag Open  Tag Favorite)
2) Hashtag action — we should add a conversion trend line (Hashtag Open  Hashtag Action)
3) Remove ‘in Explore’ from Hashtag Open  Content Open title -->


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!--   <script src="https://code.highcharts.com/highcharts.js"></script> -->
<!-- <script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script> -->
  <script src="js-func.js" type="text/javascript"></script> 

<script src="charts.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.28.0/js/jquery.tablesorter.min.js"></script>


</head>
<?php include 'requests.php';
include 'functions.php';
?>
<style type="text/css">
.first_row
{

  background-color: #f7f7f7; 
  padding-top: 30px; 
    padding-right: 10px; 

}

.chart_style
{
  box-shadow: 3px 3px 10px #888888;
}

#myTable
{
  box-shadow: 3px 3px 10px #888888;
}

.myInputs
{
  box-shadow: 3px 3px 10px #888888;
}

.tbl
{
  box-shadow: 3px 3px 10px #888888;
}

</style>
<h3 style="padding-left: 40px;">Hashtag Dash</h3>
<div class="main" style="background-color: #f7f7f7;" >
<style type="text/css">
@import 'https://code.highcharts.com/css/highcharts.css';

.highcharts-title {
font-weight: bold;
}
</style>
<!-- 
<div style="background-color: white; text-align: center; padding: 10px; margin-top: 10px;" class="header">
  <h2 style="font-weight: bold; padding: 15px; padding-top: 25px;">Short Overview of Explore</h2> -->


  <div class="container-fluid main">

  <ul class="nav nav-tabs" style="padding-top: 20px;margin-left: 20px">
    <li class="active"><a data-toggle="tab" href="#home">General</a></li>
    <li><a data-toggle="tab" href="#detailed">Tags Info</a></li>

  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">

    <div class="row first_row">
             <div class="col-sm-12" style="padding-left: 35px">
        <div id="hashtag_open_content_open"  class='chart_style' >
          <script type="text/javascript">
        hashtag_open_content_open(<?php print_r($dates.",");print_r(json_encode($trend_chart_value_step_1_int_Hashtag_Open_Content_Open).","); print_r(json_encode($trend_chart_value_step_2_int_Hashtag_Open_Content_Open).",");
              print_r(json_encode($trend_chart_value_value_int_Hashtag_Open_Content_Open)."");?>);
        </script>
        </div>
      </div>
    </div>
        <br>
    <div class="row second_row" style="padding-right: 10px;padding-left: 20px">
  <div class="col-sm-6">

      <div id="hashtag_follow"  class='chart_style'>
                 <script type="text/javascript">
        hashtag_follow(<?php print_r($dates.",");print_r(json_encode($trend_chart_value_step_2_int_Hashtag_Favorite).",");
        print_r(json_encode($trend_chart_value_value_int_Hashtag_Favorite).""); ?>);
        </script>
      </div>

  </div>
      <div class="col-sm-6">
        <div id="hashtag_action"  class='chart_style' >
          <script type="text/javascript">
        hashtag_action(<?php print_r($dates.",");print_r(json_encode($trend_chart_value_step_2_int_Hashtag_Action).",");
        print_r(json_encode($trend_chart_value_value_int_Hashtag_Action)."");
        ?>);
        </script>
        </div>
      </div>
    </div>
<br>
     <div class="row third_row" style="padding-right: 10px;" >
  <div class="col-sm-12" style="padding-left: 35px">
        <div id="hashtag_open_ed"  class='chart_style' >
          <script type="text/javascript">
        hashtag_open_ed(<?php print_r($dates.",");print_r(json_encode($trend_chart_value_step_2_int_Hashtag_Open_ED).","); print_r(json_encode($trend_chart_value_value_int_Hashtag_Open_ED).",");?>);
        </script>
        </div>
  </div>



      <!-- 3rd row class close -->

     </div>
     <br>
<div class="row table" style="height: 50px; padding-left: 20px; font-size: 12px" >
  <div class="col-sm-12">
<table id="TopsTable" class="tablesorter tbl" style="font-size: 12px; ">
<thead>
  <tr><th colspan="15" style="text-align: center;">Top 20 Tags </th></tr>
  <tr><th>Top</th>
<?php 
  $connection = pg_connect ("host=192.168.0.0 dbname=db user=user password=12345");
   // TO_CHAR(NOW() :: DATE, 'Mon dd, yyyy');
  $query_tops="select * from hashtag_tops order by  top asc";
  $query_tops_dates="select TO_CHAR(date,'Mon dd') from (select to_date(column_name, 'MonDDYYYY') as date from (SELECT *
FROM information_schema.columns
where table_name   = 'hashtag_tops') as a where column_name!='top' order by date desc) as a";

  $query_tops_connection = pg_query ($connection,$query_tops);


  $query_tops_connection_dates= pg_query ($connection,$query_tops_dates);

while($row = pg_fetch_row($query_tops_connection_dates)) {
  foreach ($row as $rwik) {
                print_r("<td style='padding: 12px; background-color: white'><b>".strtoupper(str_replace("_"," ",$rwik))."</b></td>") ;# code...
               };  
                        
};
    print_r("</tr>");
echo '</thead>';

while($row = pg_fetch_row($query_tops_connection)) {
                   echo "<tr>";


foreach ($row as $rwk) {
print_r("<td style='padding-left: 8px'>".$rwk."</td>");  # code...
};
              echo "</tr>" ;# code...


                 
};


// print_r($get_data);
 ?>
</table>
</div>
</div>



<div class="row footer" style="height: 50px; padding-left: 20px; padding-top: 12px; font-size: 12px" >

  <div class="col-sm-12">
 <p style="padding-top: 14px; padding-bottom: 15px;"> *For zooming your desired part of chart just click on place that you want to zoom, hold and move.</p>
</div>
</div>
    </div>
   <?php include 'tags_detailed.php';
?>

</div>

</div>
      <!-- container class close -->
</div>

</div> 
</div>

</div>
  <!-- main class close -->
</body>
</html>




