<!DOCTYPE html>
<html>

<head>
    <title>invoice</title>
    <style type="text/css">
        @page {
            margin-top: 0px;
        }

        body {
            margin: 0px;
        }

        .invoice-box {
            max-width: 1200px;
            width: 100%;
            margin: 10px;
            padding: 0px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 12px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 10px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
            text-align: center;
        }

        .invoice-box table tr.heading2 td {
            background: #00e600;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
            color: whitesmoke;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>
    @php $no=1;
    $jum=count($header);
    @endphp
    @foreach($header as $rh)
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="information">
                <td colspan="6">
                    <table>
                        <tr>
                            <th>
                                {{ config('app.name')}} <br>
                                Gedung Serba Guna<br>
                                Kediri - Jawa Timur
                            </th>
                            <td>
                                <b> {{ $rh->code }} </b><br>
                                Handling : {{ $rh->nama_handling }}<br>
                                Kota : {{ $rh->kota_handling }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            @php $tmp='';
            $total=0;
            $totalterbayar=0;
            @endphp
            @foreach($rh->ikan as $ikan)
            @php $owner=$ikan->nama_pemilik .' / '.$ikan->kota_pemilik; @endphp
            @if($tmp<>$owner)
                <tr class="heading">
                    <td colspan="6">
                        Owner :{{ $owner }}
                    </td>
                </tr>
                <tr class="heading">
                    <td>
                        No Ikan
                    </td>
                    <td style="text-align: left;">
                        Variety
                    </td>
                    <td align="center">
                        Size
                    </td>
                    <td style="text-align: right;">
                        Price
                    </td>
                    <td style="text-align: right;">
                        Terbayar
                    </td>
                    <td style="text-align: right;">
                        Kurang
                    </td>
                </tr>
                <!-- detail item -->
                @php $sub=0;
                $subterbayar=0;
                @endphp
                @foreach($rh->ikan as $detail)
                @php $ownerdetail=$detail->nama_pemilik .' / '.$detail->kota_pemilik; @endphp
                @if($owner==$ownerdetail)
                @php $sub+=$detail->biaya; @endphp
                <tr class="item">
                    <td style="text-align: center;">
                        {{ $detail->register->id }}
                    </td>
                    <td style="text-align: left;">
                        {{ $detail->jenis_ikan_nama}} ({{ $detail->gender}}, {{ $detail->breeder}} )
                    </td>
                    <td align="center">
                        {{ $detail->ukuran }} cm
                    </td>
                    <td align="right">
                        Rp. {{ formatAngka($detail->biaya) }}
                    </td>
                    <td align="right">
                        @php $terbayar=0; @endphp
                        @if($jenis<>'bayar')
                        @foreach($detail->Terbayar as $tb )
                        @php $terbayar+=$tb->nominal;
                        $subterbayar+=$tb->nominal;
                        @endphp
                        @endforeach
                        @endif
                        Rp. {{ formatAngka($terbayar) }}

                    </td>
                    <td align="right">
                        Rp. {{ formatAngka(($detail->biaya - $terbayar)) }}
                    </td>
                </tr>
                @endif
                @endforeach
                <tr class="item">
                    <td style="text-align: center;">

                    </td>
                    <td style="text-align: left;">

                    </td>
                    <td align="center">
                        <b>Sub Total</b>
                    </td>
                    <td align="right">
                        <b> Rp. {{ formatAngka($sub) }}</b>
                    </td>
                    <td align="right">
                        <b>Rp. {{ formatAngka($subterbayar) }} </b>
                    </td>
                    <td align="right">
                        <b>Rp. {{ formatAngka(($sub - $subterbayar)) }}</b>
                    </td>
                </tr>

                @php $total+=$sub;
                $totalterbayar+=$subterbayar;
                @endphp

                @endif
                @php $tmp=$owner; @endphp
                @endforeach
                <tr class="total">
                    <td colspan="5" align="right">
                        <b>Total Tagihan</b>
                    </td>
                    <td align="right">
                        <b> Rp. {{ formatAngka($total)}}</b>
                    </td>
                </tr>
                <tr class="total">
                    <td colspan="5" align="right">
                        <b>Total Terbayar</b>
                    </td>
                    <td align="right">
                        <b> Rp. {{ formatAngka($totalterbayar)}}</b>
                    </td>
                </tr>
                <tr class="total">
                    <td colspan="5" align="right">
                        <b>Total yang harus di bayar</b>
                    </td>
                    <td align="right">
                        <b> Rp. {{ formatAngka($total-$totalterbayar)}}</b>
                    </td>
                </tr>

        </table>
    </div>

    @if($jum>1 && $jum<>$no)
        <div class="page-break"></div>
        @endif

        @php $no++ @endphp
        @endforeach
</body>

</html>