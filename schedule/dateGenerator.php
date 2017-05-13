<?php
  function dateGenerator($op){
    $tommorow= mktime(0,0,0,date("m"),date("d")+$op,date("y"));
    echo date("Y/m/d/N/D",$tommorow);
  }

?>
