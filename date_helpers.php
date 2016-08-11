<?php
function timpInLucru($time)
{

    $time = time() - $time; // to get the time since that moment
    $time = ($time<1)? 1 : $time;
    $tokens = array (
        31536000 => 'an',
        2592000 => 'luna',
        604800 => 'saptamana',
        86400 => 'zi',
        3600 => 'ora',
        60 => 'minut',
        1 => 'secunda'
    );

    foreach ($tokens as $unit => $text) {
        if ($time < $unit) continue;
        $numberOfUnits = floor($time / $unit);
        if($numberOfUnits>1){
            if($text == 'an'){
                $text= 'ani';
            }
            if($text == 'luna'){
                $text = 'luni';
            }
            if($text == 'saptamana'){
                $text = 'saptamani';
            }
            if($text == 'zi'){
                $text = 'zile';
            }
            if($text == 'ora'){
                $text = 'ore';
               
            }
            if($text == 'minut'){
                $text = 'minute';
            }
            if($text == 'secunda'){
                $text = 'secunde';
            }
        }
        return $numberOfUnits.' '.$text;
    }

}