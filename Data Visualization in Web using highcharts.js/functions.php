<?php include 'main_new.php';
  ini_set('display_errors', 1);
error_reporting(~0);
  $connection = pg_connect ("host=173.244.222.44 dbname=dwh user=dwh password=4F51hnXVMZoDcHrLvf");

  // $month= "select extract(month from max(month)) as month_max,extract(month from min(month)) as month_min from (select CAST(month AS date) as month from weeeekly) as a";
// $month = pg_query ($connection , $month);
// $month=pg_fetch_all($month);
// $month_max=array_column($month, "month_max");
// $month_min=array_column($month, "month_min");
$months = array(
    'Jan', 'Feb', 'Mar', 'Apr', 'May',
    'Jun', 'Jul', 'Aug', 'Sep',
    'Oct', 'Nov', 'Dec'
    );

function monthNumToName($monthnum) {
  $months =array(
    'Jan', 'Feb', 'Mar', 'Apr', 'May',
    'Jun', 'Jul', 'Aug', 'Sep',
    'Oct', 'Nov', 'Dec'
    );

 return $months[$monthnum - 1];
 };  


$connection = pg_connect ("host=173.244.222.44 dbname=dwh user=dwh password=4F51hnXVMZoDcHrLvf");

function num_format($full_num)
{
if ($full_num < 1000000) {
    // Anything less than a million
    $full_num = round(number_format($full_num / 1000, 0),0) . 'K';
} else if ($full_num < 1000000000) {
    // Anything less than a billion
    $full_num= round(number_format($full_num / 1000000, 0),0) . 'M';
} else {
    // At least a billion
    $full_num = round(number_format($full_num / 1000000000, 0),0) . 'B';
}
return $full_num;
};

function compareByTimeStamp($time1, $time2)
{
    if (strtotime($time1) > strtotime($time2))
        return 1;
    else if (strtotime($time1) < strtotime($time2)) 
        return -1;
    else
        return 0;
};
?>
