<?php 
date_default_timezone_set("Asia/Kuala_lumpur");
// echo date_default_timezone_get();
$dt = new DateTime();
        $today = $dt->format('Y-m-d H:i:s');
        echo $today;
?>