<?php
$str = <<<EOD
Пример строки, охватывающей несколько
строчек, с использованием
heredoc-синтаксиса
EOD;
// Здесь идентификатор – EOD. Ниже
// идентификатор EOT
$name = 'Вася';
echo <<<EOT
Меня зовут "$name". 
EOT;
// это выведет "Меня зовут "Вася"."
?>
