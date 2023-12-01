<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    function hitungIPK($nilai_matkul) {
        $total_nilai = 0;
        $jumlah_matkul = count($nilai_matkul);

        foreach ($nilai_matkul as $nilai) {
 
            $total_nilai += floatval($nilai);
        }


        $ipk = $total_nilai / $jumlah_matkul;

        return $ipk;
    }

    $nilai_matkul = array();

    $counter = 1;
    while (isset($_POST["nilai_matkul$counter"])) {
        $nilai_matkul[] = $_POST["nilai_matkul$counter"];
        $counter++;
    }


    $ipk = hitungIPK($nilai_matkul);

    echo "<h2>Hasil Perhitungan IPK</h2>";
    echo "<p>Nilai IPK Anda adalah: $ipk</p>";
}
?>
