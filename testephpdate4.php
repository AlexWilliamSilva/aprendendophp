<?php

  $raw = '22.11.1968';
  $start = Datetime::createFromFormat('d.m.Y',$raw);
  echo "data de inicio: ".$start->format('Y-m-d')."<br>";

  $end = clone $start;
  $end->add(new DateInterval('P1M6D'));

  $diff = $end->diff($start);
  echo "Diferença:".$diff->format('%m mês,%d dias (total: %a dias)')."<br>";
  
  if($start < $end) {
    echo "Começa antes do fim!<br>";
  }
  
  $periodinterval = DateInterval::createFromDateString('first thursday');
  $perioditerator = new DatePeriod($start,$periodinterval,$end,DatePeriod::EXCLUDE_START_DATE);

  foreach($perioditerator as $date) {
    echo $date->format('s-m-Y')." ";

  }
?>