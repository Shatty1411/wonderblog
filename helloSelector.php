<?php
$a = 0;
$b = &$a;
$b++;
echo '$a == ', $a, '<br />';