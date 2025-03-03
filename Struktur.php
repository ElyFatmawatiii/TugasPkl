<?php

// Logika IF
echo "<h3>Struktur Logika IF</h3>";
$umur = 20;
if ($umur >= 18) {
    echo "Anda sudah dewasa.<br>";
} elseif ($umur >= 13) {
    echo "Anda seorang remaja.<br>";
} else {
    echo "Anda masih anak-anak.<br>";
}

// Logika Switch
echo "<h3>Struktur Logika Switch</h3>";
$warna = "merah";
switch ($warna) {
    case "merah":
        echo "Warna favorit Anda adalah merah.<br>";
        break;
    case "biru":
        echo "Warna favorit Anda adalah biru.<br>";
        break;
    case "hijau":
        echo "Warna favorit Anda adalah hijau.<br>";
        break;
    default:
        echo "Warna favorit Anda tidak terdaftar.<br>";}
?>