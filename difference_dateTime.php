<?php
echo difference_dateTime('2017-09-24 02:35:35',$timeZone = 'Asia/Riyadh',$print_ago = true);

function difference_dateTime($oldTimestamp,$timeZone = null , $print_ago = false){
  $old = new DateTime($oldTimestamp,new DateTimeZone($timeZone));
  $now = new DateTime('now',new DateTimeZone($timeZone));

  $unit = '';
  $value = '';
  $diff = $now->diff($old);

  switch (true) {
    case $diff->y > 0:
      $value = $diff->y  ;
      $unit  = ($diff->y > 1) ? 'years'  : 'year'  ;
      break;

    case $diff->m > 0:
      $value = $diff->m ;
      $unit  = ($diff->m > 1) ? 'months' : 'month';
      break;

    case $diff->d > 0:
      $value = $diff->d  ;
      $unit  = ($diff->d > 1) ? 'days' : 'day';
      break;

    case $diff->h > 0:
      $value = $diff->h  ;
      $unit  = ($diff->h > 1) ? 'hours' : 'hour';
      break;

    case $diff->i > 0:
      $value = $diff->i  ;
      $unit  = ($diff->i > 1) ? 'minutes' : 'minute';
      break;

    case $diff->s > 0 :
      $value = $diff->s;
      $unit  = ($diff->s > 1) ? 'seconds' : 'second';
      break;
    default:
       return 'Now';
      break;
  }
    if ($print_ago)
      $unit .= ' ago';

    return  $value. ' '.$unit;
}
