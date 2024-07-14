<?php
function helloworld($n) {
    for ($i = 1; $i <= $n; $i++) {
        if ($i % 4 == 0 && $i % 5 == 0) {
            echo "helloworld ";
        } elseif ($i % 4 == 0) {
            echo "hello ";
        } elseif ($i % 5 == 0) {
            echo "world ";
        } else {
            echo $i . " ";
        }
    }
}

helloworld(1);
echo "\n";
helloworld(2); 
echo "\n";
helloworld(3); 
echo "\n";
helloworld(4); 
echo "\n";
helloworld(5); 
echo "\n";
helloworld(6); 
?>