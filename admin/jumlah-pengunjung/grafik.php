<?php
    include('../../utils/DB-Connection.php');
    $tahun = $_REQUEST['tahun'];
    $sql = "SELECT jp.id_informasi, i.nama_toko FROM jumlah_pengunjung jp INNER JOIN informasi i ON i.id_informasi = jp.id_informasi GROUP BY i.id_informasi";
    $result = mysql_query($sql) or die(mysql_error());
?>

<div id="container"></div>

<script>
    $(function () {
        $('#container').highcharts({
            title: {
                text: 'Jumlah Pengunjung',
                x: -20 //center
            },
            subtitle: {
                text: 'Toko Buku Online',
                x: -20
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: 'Pengunjung'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: ' Orang'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [
                <?php
                    while ($row = mysql_fetch_array($result)) {
                        $namaToko = "'".$row[1]."'";
                        $sqlJumlahPengunjung = "SELECT * FROM jumlah_pengunjung WHERE id_informasi='".$row[0]."' AND tahun_jumlah_pengunjung='".$tahun."'";
                        $resultJumlahPengunjung = mysql_query($sqlJumlahPengunjung) or die(mysql_error());
                ?>   
                {
                    name: <?php echo $namaToko ?>,
                    data: [
                        <?php
                            while($rowJumlahPengunjung = mysql_fetch_array($resultJumlahPengunjung)){
                                $jumlahPengunjungToko = $rowJumlahPengunjung[3];        
                        ?>
                        <?php echo $jumlahPengunjungToko?>,
                        <?php
                            }
                        ?>
                    ]},
                <?php   
                    }
                ?>
            ]
        });
    });
</script>