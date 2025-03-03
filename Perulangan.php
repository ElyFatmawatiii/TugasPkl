<?php

// For
echo "<h3>Perulangan For</h3>";
for ($i = 1; $i <= 5; $i++) {
    echo "Perulangan ke-" . $i . "<br>";
}

// Foreach
echo "<h3>Perulangan Foreach</h3>";
$buah = ["Apel", "Mangga", "Pisang", "Jeruk"];
foreach ($buah as $b) {
    echo "Buah: " . $b . "<br>";}

// While
echo "<h3>Perulangan While</h3>";
$j = 1;
while ($j <= 3) {
    echo "Iterasi ke-" . $j . "<br>";
    $j++;
}

?>
