<?php
  $ch=curl_init();
  curl_setopt($ch,CURLOPT_URL,'http://hume.co.kr/s2/');
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
  curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true);

  curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
  echo $result=curl_exec($ch);
?>
