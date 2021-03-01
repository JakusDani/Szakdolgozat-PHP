<?php
  if(!isset($_GET['url']))
  die("enter url");
  $ch = curl_init($_GET['url']); //get url http://www.xxxx.com/cru.php?url=http://www.example.com
  curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
  if(curl_exec($ch))
  {
  $info = curl_getinfo($ch);
  echo 'Took ' . $info['total_time'] . ' seconds to transfer a request to ' . $info['url'];
  }

  curl_close($ch);
?>