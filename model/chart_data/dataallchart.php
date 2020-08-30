<?php

session_start();

include '../../controller/config.php';
$date = $_POST['date'];
$kesatuan = $_POST['kesatuan'];

for ($index = 1; $index < 13; $index++) {
    $query =  mysqli_query($conn, "SELECT SUM(kecepatan_tilang) AS kecepatantilang, SUM(kecepatan_teguran) AS kecepatanteguran,SUM(kelengkapan_tilang) AS kelengkapantilang, SUM(kelengkapan_teguran) AS kelengkapanteguran,SUM(surat_surat_tilang) AS surat_surattilang, SUM(surat_surat_teguran) AS surat_suratteguran,SUM(muatan_tilang) AS muatantilang, SUM(muatan_teguran) AS muatanteguran,SUM(markarambu_tilang) AS markarambutilang, SUM(markarambu_teguran) AS markarambuteguran,SUM(melawanarus_tilang) AS melawanarustilang, SUM(melawanarus_teguran) AS melawanarusteguran,SUM(sabukeselamatan_tilang) AS sabukeselamatantilang, SUM(sabukeselamatan_teguran) AS sabukeselamatanteguran,SUM(gunakanhp_tilang) AS gunakanhptilang, SUM(gunakanhp_teguran) AS gunakanhpteguran,SUM(lain_lain_tilang) AS lain_laintilang, SUM(lain_lain_teguran) AS lain_lainteguran FROM tbl_pelanggaran_r4 WHERE (tanggal BETWEEN '$date-$index-01' and '$date-$index-31') AND nama_kesatuan='$kesatuan' ORDER BY tanggal DESC");
    while ($row = mysqli_fetch_array($query)) {
        $kecepatantilang  = intval($row['kecepatantilang']);
        $kecepatanteguran = intval($row['kecepatanteguran']);
        $kelengkapantilang = intval($row['kelengkapantilang']);
        $kelengkapanteguran = intval($row['kelengkapanteguran']);
        $surat_surattilang = intval($row['surat_surattilang']);
        $surat_suratteguran = intval($row['surat_suratteguran']);
        $muatantilang = intval($row['muatantilang']);
        $muatanteguran = intval($row['muatanteguran']);
        $markarambutilang = intval($row['markarambutilang']);
        $markarambuteguran = intval($row['markarambuteguran']);
        $melawanarustilang = intval($row['melawanarustilang']);
        $melawanarusteguran = intval($row['melawanarusteguran']);
        $sabukeselamatantilang = intval($row['sabukeselamatantilang']);
        $sabukeselamatanteguran = intval($row['sabukeselamatanteguran']);
        $gunakanhptilang = intval($row['gunakanhptilang']);
        $gunakanhpteguran = intval($row['gunakanhpteguran']);
        $lain_laintilang = intval($row['lain_laintilang']);
        $lain_lainteguran = intval($row['lain_lainteguran']);
    }

    $queryDua =  mysqli_query($conn, "SELECT SUM(Helm_teguran) AS helmteguran, SUM(Helm_tilang) AS helmtilang, SUM(kecepatan_tilang) AS kecepatantilang, SUM(kecepatan_teguran) AS kecepatanteguran,SUM(kelengkapan_tilang) AS kelengkapantilang, SUM(kelengkapan_teguran) AS kelengkapanteguran,SUM(surat_surat_tilang) AS surat_surattilang, SUM(surat_surat_teguran) AS surat_suratteguran,SUM(boncenganlebih_tilang) AS boncenganlebihtilang, SUM(boncenganlebih_teguran) AS boncenganlebihteguran,SUM(markarambu_tilang) AS markarambutilang, SUM(markarambu_teguran) AS markarambuteguran,SUM(melawanarus_tilang) AS melawanarustilang, SUM(melawanarus_teguran) AS melawanarusteguran,SUM(lampuutama_tilang) AS lampuutamatilang, SUM(lampuutama_teguran) AS lampuutamateguran,SUM(gunakanhp_tilang) AS gunakanhptilang, SUM(gunakanhp_teguran) AS gunakanhpteguran,SUM(lain_lain_tilang) AS lain_laintilang, SUM(lain_lain_teguran) AS lain_lainteguran FROM tbl_pelanggaran_r2r3 WHERE (tanggal BETWEEN '$date-$index-01' and '$date-$index-31') AND nama_kesatuan='$kesatuan' ORDER BY tanggal DESC");
    while ($rowDua = mysqli_fetch_array($queryDua)) {
        $helmteguran = intval($rowDua['helmteguran']);
        $helmtilang = intval($rowDua['helmtilang']);
        $kecepatantilangdua  = intval($rowDua['kecepatantilang']);
        $kecepatantegurandua = intval($rowDua['kecepatanteguran']);
        $kelengkapantilangdua = intval($rowDua['kelengkapantilang']);
        $kelengkapantegurandua = intval($rowDua['kelengkapanteguran']);
        $surat_surattilangdua = intval($rowDua['surat_surattilang']);
        $surat_surattegurandua = intval($rowDua['surat_suratteguran']);
        $boncenganlebihtilangdua = intval($rowDua['boncenganlebihtilang']);
        $boncenganlebihtegurandua = intval($rowDua['boncenganlebihteguran']);
        $markarambutilangdua = intval($rowDua['markarambutilang']);
        $markarambutegurandua = intval($rowDua['markarambuteguran']);
        $melawanarustilangdua = intval($rowDua['melawanarustilang']);
        $melawanarustegurandua = intval($rowDua['melawanarusteguran']);
        $lampuutamatilangdua = intval($rowDua['lampuutamatilang']);
        $lampuutamategurandua = intval($rowDua['lampuutamateguran']);
        $gunakanhptilangdua = intval($rowDua['gunakanhptilang']);
        $gunakanhptegurandua = intval($rowDua['gunakanhpteguran']);
        $lain_laintilangdua = intval($rowDua['lain_laintilang']);
        $lain_laintegurandua = intval($rowDua['lain_lainteguran']);
    }
    $total[$index][] =  $kecepatantilang + $kelengkapantilang + $surat_surattilang + $muatantilang + $markarambutilang + $melawanarustilang +  $sabukeselamatantilang + $gunakanhptilang + $lain_laintilang;

    $total[$index][] = $helmteguran +  $kecepatantegurandua +  $kelengkapantegurandua  + $surat_surattegurandua  + $boncenganlebihtegurandua +  $markarambutegurandua + $melawanarustegurandua  + $lampuutamategurandua + $gunakanhptegurandua + $lain_laintegurandua;

    $totalDua[$index][] = $helmtilang + $kecepatantilangdua + $kelengkapantilangdua + $surat_surattilangdua + $boncenganlebihtilangdua + $markarambutilangdua + $melawanarustilangdua +  $lampuutamatilangdua + $gunakanhptilangdua + $lain_laintilangdua;

    $totalDua[$index][] =  $kecepatanteguran +  $kelengkapanteguran  + $surat_suratteguran  + $muatanteguran +  $markarambuteguran + $melawanarusteguran  + $sabukeselamatanteguran + $gunakanhpteguran + $lain_lainteguran;
}

for ($i = 1; $i < 13; $i++) {
    $tilang[] = $total[$i][0] + $totalDua[$i][0];
    $teguran[] = $total[$i][1] + $totalDua[$i][1];
}

$jsonTilang = json_encode($tilang);
$jsonTeguran = json_encode($teguran);

?>

<div class="au-card m-b-30">
    <div class="au-card-inner">
        <h3 class="title-2 m-b-40">Data Pelanggaran Kesatuan <?= $kesatuan; ?> Tahun <?= $date; ?></h3>
        <canvas id="AllData"></canvas>
    </div>
</div>

<script>
    //bar chart
    var ctx = document.getElementById("AllData");
    if (ctx) {
        ctx.height = 200;
        var myChart = new Chart(ctx, {
            type: 'bar',
            defaultFontFamily: 'Poppins',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July", "Agustus", "September", "Oktober", "November", "Desember"],
                datasets: [{
                        label: "Teguran",
                        data: <?= $jsonTeguran; ?>,
                        borderColor: "rgba(0, 123, 255, 0.9)",
                        borderWidth: "0",
                        backgroundColor: "rgba(0, 123, 255, 0.5)",
                        fontFamily: "Poppins"
                    },
                    {
                        label: "Tilang",
                        data: <?= $jsonTilang; ?>,
                        borderColor: "rgba(0,0,0,0.09)",
                        borderWidth: "0",
                        backgroundColor: "rgba(0,0,0,0.07)",
                        fontFamily: "Poppins"
                    }
                ]
            },
            options: {
                legend: {
                    position: 'top',
                    labels: {
                        fontFamily: 'Poppins'
                    }

                },
                scales: {
                    xAxes: [{
                        ticks: {
                            fontFamily: "Poppins"

                        }
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            fontFamily: "Poppins"
                        }
                    }]
                }
            }
        });
    }
</script>