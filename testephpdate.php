<?php

  $raw = '22.11.1968';
  $start = Datetime::createFromFormat('d.m.Y',$raw);
  echo "data de inicio: ".$start->format('Y-m-d')."<br>";
  
?>