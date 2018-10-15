<!DOCTYPE html>
<html>
<head>
        <title>
                
Dashboard
        </title>
<!--                 <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
 -->
        <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<!-- Additional files for the Highslide popup effect -->
<script src="https://www.highcharts.com/media/com_demo/js/highslide-full.min.js"></script>
<script src="https://www.highcharts.com/media/com_demo/js/highslide.config.js" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="https://www.highcharts.com/media/com_demo/css/highslide.css"/>


</head>
<!-- 1) Add border arround cell
2) Add Dates
3) Add unique ED users to graph
4) Remove bold from numbers
5) Add conditional formating if possible
6) Add calendar -->

<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
body 
.main
{
    font-family: "Lucida Grande", sans-serif;
}

.sidenav {
    width: 130px;
    position: fixed;
    z-index: 1;
    top: 0px;
    left: 10px;
    background: #eee;
    overflow-x: hidden;
    padding: 8px 0;
        font-family: "Lucida Grande", sans-serif;

}

.sidenav a {
    padding: 6px 8px 6px 16px;
    text-decoration: none;
    font-size: 14px;
    color: #78b5ee;
    display: block;
}

.sidenav a:hover {
    color: #064579;
}

.main {
/*    margin-left: 140px;  Same width as the sidebar + left position in px 
*/   
/* padding: 0px 10px;
*/   height: 100%;
    width: 100%;
    box-sizing: border-box;
    font-style:  "Lucida Grande", sans-serif;
        box-sizing: border-box;


}


@media screen and (max-height: 100%) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
}
* {
  box-sizing: border-box;
}

.myInputs {
  background-image: url('searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 16px;
  padding-left: 40px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: white;
}
.sec_head 
{
    text-align: left;
    font-size: 15px;
}

.header 
{
      cursor: pointer;

}
a {
    text-decoration: none;
    padding-bottom: 3px;
/*    border-bottom: 1px solid    #4682B4;
*/    color:  #4682B4
}
a {
    text-decoration: none;
    padding-bottom: 3px;
/*    border-bottom: 1px solid    #4682B4;
*/    color:  #4682B4
}

.tbl {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 16px;
  padding-left: 40px;
}

.tbl th, .tbl td {
  text-align: left;
  padding: 4px;
}

.tbl tr {
  border-bottom: 1px solid #ddd;
}

.tbl tr.header, .tbl tr:hover {
  background-color: white;
}

.tbl th 
{
  background-color: white;
}
</style>
</head>
<body>

<!-- <div class="sidenav">
 --><!--   <div style="display: inline-block; margin-left: 14px; margin-top: 4px; margin-bottom: 2px;"><img src="https://cdn110.picsart.com/216288961002202.png"  width="100px" align="center"></div>
  <a href="sparkline.php">KPI</a>
  <a href="index.php">DAU trend in World</a>
  <a href="mixed_chart.php">Mixed Chart</a>
  <a href="all.php">Experiment Results</a>
  <a href="all.php">Dashboard Request</a>

</div>
 -->

  

</html>

