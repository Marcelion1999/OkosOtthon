<?php 

function test ($url)
{
    $starttime = microtime(true);
    $valid = @fsockopen($url, 80, $errno, $errstr, 30);
    $stoptime = microtime(true);
    echo (round(($stoptime-$starttime)*1000)).' ms.';
    
        if (!$valid) 
        {
        echo "Status - Failure";
        } else 
        {
        echo "Status - Success";
        }
    }
    
    test('google.com');
?>