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

    <title>Kartu Ikan</title>
</head>

<body>
    <table style="table-layout: fixed; width: 100%;">
        <tr style="vertical-align:top;">
            <td>
                {{ config('app.name')}} <br>
                Gedung Serba Guna<br>
                Kediri - Jawa Timur
            </td>
            <td></td>
            <td>
                <b> {{ $pendaftaran->code }} </b><br>
                Handling : {{ $pendaftaran->nama_handling }}<br>
                Kota : {{ $pendaftaran->kota_handling }}
            </td>
        </tr>
    </table>
    <hr>
    <?php
    // dd($pendaftaran->ikan->toArray());
    $kolom  = 5;
    $gambar = array_chunk($pendaftaran->ikan->toArray(), $kolom);
    echo '<table style="table-layout: fixed; width: 100%;">';
    foreach ($gambar as $chunk) {
        echo '<tr >';
        foreach ($chunk as $ikane) {
        
            echo '<td valign="top" width="150px">'; ?>
            <table style=" font-size:12px">
                <tr>
                    <td valign="top"><img class="responsive" src="{{ storage_path($ikane['path_image']) }}"></td>
                </tr>
                <tr>
                    <td>ID : <b>1</b></td>
                </tr>
                <tr>
                    <td valign="top"><?php echo $ikane['jenis_ikan_nama'] ?> / <?php echo $ikane['ukuran'] ?> cm </td>
                </tr>
                <tr>
                    <td valign="top"><?php echo $ikane['gender'] ?> / <?php echo $ikane['breeder'] ?> </td>
                </tr>
                <tr>
                    <td valign="top">Owner : <?php echo $ikane['nama_pemilik'] ?> </td>
                </tr>
            </table>
    <?php echo '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
    ?>
</body>

</html>