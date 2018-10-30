     <script src="tabletwocsv.js" type="text/javascript"></script> 

 <div id="detailed" class="tab-pane fade">

<div style="padding-top: 30px; padding-left: 20px;padding-right: 5px">
<input type="text" id="myInput" class="myInputs" onkeyup="myFunction1()" placeholder="Search for tags..." title="Type in a name" style="background-image: url('https://cdn2.iconfinder.com/data/icons/ourea-icons/256/Search_256x256-32.png');    background-size: 20px;
">
<input type="text" id="myInputD"  class="myInputs" onkeyup="myFunction2()" placeholder="Search for Dates..." title="Type in a name" style="background-image: url('https://cdn1.iconfinder.com/data/icons/seo-pack-1/512/seo-21-512.png');    background-size: 20px; background-repeat:no-repeat; width: 94%;
">

<table id="myTable" class="tablesorter">
  <thead>
  <tr class="header" style="font-size: 18px;">
    <th>Rank <img src="http://freevector.co/wp-content/uploads/2013/01/3479-scroll-vertical-arrows1.png" style="opacity: 0.3; width: 20px"></th>
    <th style="width:15%;">Tag <img src="http://freevector.co/wp-content/uploads/2013/01/3479-scroll-vertical-arrows1.png" style="opacity: 0.3; width: 20px"></th>
    <th>Platform <img src="http://freevector.co/wp-content/uploads/2013/01/3479-scroll-vertical-arrows1.png" style="opacity: 0.3; width: 20px"></th>
    <th>Views <img src="http://freevector.co/wp-content/uploads/2013/01/3479-scroll-vertical-arrows1.png" style="opacity: 0.3; width: 20px"></th>
    <th>Clicks <img src="http://freevector.co/wp-content/uploads/2013/01/3479-scroll-vertical-arrows1.png" style="opacity: 0.3; width: 20px"></th>
    <th>Social<img src="http://freevector.co/wp-content/uploads/2013/01/3479-scroll-vertical-arrows1.png" style="opacity: 0.3; width: 20px"></th>
    <th>ED<img src="http://freevector.co/wp-content/uploads/2013/01/3479-scroll-vertical-arrows1.png" style="opacity: 0.3; width: 20px"></th>
    <th>CTR<img src="http://freevector.co/wp-content/uploads/2013/01/3479-scroll-vertical-arrows1.png" style="opacity: 0.3; width: 20px;"></th>
    <th>Date<img src="http://freevector.co/wp-content/uploads/2013/01/3479-scroll-vertical-arrows1.png" style="opacity: 0.3; width: 20px;"></th>

  </tr>
  </thead>
  <tbody>

<?php 
  $connection = pg_connect ("host=192.168.0.0 dbname=db user=db password=12345");
   // TO_CHAR(NOW() :: DATE, 'Mon dd, yyyy');
  $query_details="select Row_Number() over(order by sum(clicks) desc) as rank, tag_name, platform, to_char(sum(views), 'FM999,999,999,990D')  as views, to_char(sum(clicks),'FM999,999,999,990D') as clicks,  to_char(sum(social_interactions),'FM999,999,999,990D') as social_interactions,to_char(sum(ed),'FM999,999,999,990D') as ED, concat(round((sum(clicks)/sum(views))*100,2),'%') as ctr,
  concat( TO_CHAR(min(date),'Mon dd'),'-',TO_CHAR(max(date),'Mon dd')) as date 
  from hashtags_detailed_dash_new group by tag_name,platform order by rank asc";

  $query_details_connection = pg_query ($connection,$query_details);

  $get_data=pg_fetch_all($query_details_connection);


while($row = pg_fetch_row($query_details_connection)) {
  print_r("<tr class='hideik'>");
  foreach ($row as $rwik) {
                print_r("<td>".$rwik."</td>") ;# code...
               };  
    print_r("<tr>");
                        
};
// print_r($get_data);
 ?>
 </tbody>
</table>
<script>
  $(document).ready(function(){ 
    $("#myTable").tablesorter();
}); 
function myFunction1() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
};

function myFunction2() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInputD");
  filter = input.value.toUpperCase().replace(/ /g,"") ;
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[8];
    if (td) {
      if (td.innerHTML.replace(/ /g,"") .toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
        // console.log(input);
        // console.log(filter);
        // console.log(td);
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
};

$(document).ready(function() {
 
  $('#myTable').each(function() {
    var $table = $(this);
 
    var $button = $("<img src='https://www.cumbriachristianlearning.org.uk/site/wp-content/uploads/2017/10/Download-button.png'>");
    $button.text("Export to spreadsheet");
    $button.css({"width": "50px", "cursor":"pointer", "padding-left": "12px"});;
    $button.insertBefore($table);
    $button.click(function() {
      var csv = $table.table2csv({delivery:'value'});
//       window.location.href = 'data:text/csv;charset=UTF-8,'
//                             + encodeURIComponent(csv);
    });
  });
})
    
</script>


<div class="row footer" style="height: 50px; padding-left: 20px; padding-top: 12px; font-size: 12px"; >
  <div class="col-sm-12">
 <p></p>
</div>
