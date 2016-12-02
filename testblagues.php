<?php
function LineCount($fileName) {
    $fileCount = -1;
    $h = @fopen($fileName, 'r');
    if ($h) {
        while (!feof($h)) {
            fgets($h, 4096); // Voir remarque
            $fileCount++;
        }
        fclose($h);
    }

    return($fileCount);
}

$string = fopen('blagues.txt', 'r');
$line_max = LineCount("blagues.txt");
$random = rand(1,$line_max);
$i = 0;
while($i != $random) {
  $line = fgets($string,4096);
  $i++;
}
print_r($line);
fclose($string);
?>
