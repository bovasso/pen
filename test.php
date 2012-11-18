<?php

$g1 = array(1,2,3,4,5);
$g2 = array(6,7,8,9);

$group = array();
$pairing = array();

if (count($g1) > count($g2) ) {
    $big = $g1;
}else{
    $small = $g2;
}

for($i=0; count($g1) > count($g2); $i++){
        $element1 = each($g1);
        array_shift($g1);
        $element2 = each($g2);
        array_shift($g2);
        if(empty($element2)) {            
            $pairing[$i] = array($element1['value'], $pairing[$i - 1][1]); 
        }else{
            $pairing[$i] = array($element1['value'], $element2['value']);                        
        }                    
}

var_dump($pairing);

