<html>

<head>
    <style>
        @page {
            margin: 10px;
        }

        body {
            margin: 10px;
            font-family: Tahoma, Geneva, sans-serif;
        }

        .center {
            margin-left: auto;
            margin-right: auto;
        }

        .responsive {
            width: auto;
            max-width: 110px;
            height: 150px;
        }
    </style>
    <title>Stiker Kantong</title>
</head>

<body>
    <?php 
    foreach ($ikan as $rikan) { ?>
        <table align="center" style="table-layout: fixed; width: 227px; border: 1px dashed ;">
            <tr>
                <td><img class="responsive" src="{{ storage_path($rikan->path_image)}}"></td>
                <td style="vertical-align:top;padding:10px;"><span style="font-size:30px"><b><?= sprintf('%04d', 1); ?></b></span><br><span style="font-size:14px"><?php echo $rikan->jenis_ikan_nama ?><br> <?php echo $rikan->ukuran ?>cm <?php echo $rikan->gender ?><br> <?php echo $rikan->breeder ?></span></td>
            </tr>
        </table>
    <?php } ?>
    <?php 
    foreach ($ikan as $rikan) { ?>
        <table align="center" style="table-layout: fixed; width: 227px; border: 1px dashed ;">
            <tr>
                <td><img class="responsive" src="{{ storage_path($rikan->path_image)}}"></td>
                <td style="vertical-align:top;padding:10px;"><span style="font-size:30px"><b><?= sprintf('%04d', 1); ?></b></span><br><span style="font-size:14px"><?php echo $rikan->jenis_ikan_nama ?><br> <?php echo $rikan->ukuran ?>cm <?php echo $rikan->gender ?><br> <?php echo $rikan->breeder ?></span></td>
            </tr>
        </table>
    <?php } ?>
    <?php 
    foreach ($ikan as $rikan) { ?>
        <table align="center" style="table-layout: fixed; width: 227px; border: 1px dashed ;">
            <tr>
                <td><img class="responsive" src="{{ storage_path($rikan->path_image)}}"></td>
                <td style="vertical-align:top;padding:10px;"><span style="font-size:30px"><b><?= sprintf('%04d', 1); ?></b></span><br><span style="font-size:14px"><?php echo $rikan->jenis_ikan_nama ?><br> <?php echo $rikan->ukuran ?>cm <?php echo $rikan->gender ?><br> <?php echo $rikan->breeder ?></span></td>
            </tr>
        </table>
    <?php } ?>
</body>

</html>