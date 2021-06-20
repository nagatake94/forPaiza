<?php

function ChooseSmallestNum(): int
{
    $a = fgets(STDIN);
    $b = fgets(STDIN);
    $c = fgets(STDIN);
    $d = fgets(STDIN);
    $e = fgets(STDIN);

    $array = array((int)$a, (int)$b, (int)$c, (int)$d, (int)$e);
    return min($array);
}
