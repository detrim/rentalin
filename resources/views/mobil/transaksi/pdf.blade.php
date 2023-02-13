<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title></title>

    <style>
        .table {
            border-collapse: collapse;
            border: 1px solid black;
            font-size: 7px;
        }

        .font {
            font-size: 10px;
        }

        .hr {

            border: 1px solid black;
            border-color: black;
            margin-top: -1px;

        }

        .head {
            margin-top: -2px;
        }

        .turun {
            margin-top: 2px;
        }

        .turunn {
            margin-top: 10px;
        }

        .turunnn {
            margin-top: 30px;
        }

        .naik {
            margin-top: -96px;
        }

        .total {
            border-top: 5px double #8e8e8e;
        }

        body {
            font-size: 10px;
        }
    </style>
</head>

<body>
    <h2 class="head">RENTALIN, inc</h2>
    <span>Jl. Meruya Selatan, Kec. Kembangan, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11610</span>
    <p class="hr"></p>
    <center>
        <h2 class="turunn">LAPORAN RENTALIN</h2>
        <p class="turun">Periode : {{ date('d/m/Y', strtotime($tgl1)) }} sd
            {{ date('d/m/Y ', strtotime($tgl2)) }}</p>
    </center>


    <strong class="font">{{ date('d/m/Y') }}</strong>
    <table rules="" align="center" border="1" class="table" width="100%">
        <thead>
            <tr class="text-center">
                <th width="30" rowspan="2">No</th>
                <th rowspan="2">Kode</th>
                <th rowspan="2">Nama</th>
                <th rowspan="2">No Telp</th>
                <th rowspan="2">Nik</th>
                <th colspan="3">Tanggal</th>
                <th rowspan="2">Hari</th>
                <th rowspan="2">Faktur</th>
                <th rowspan="2">Status</th>
                <th rowspan="2">Total Deposit</th>
                <th rowspan="2">Pembayaran</th>
                <th rowspan="2">Total Pembayaran</th>
            </tr>
            <tr>
                <th>Sewa</th>
                <th>Kembali</th>
                <th>Deposit</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($data as $tm)
                @if ($tm->total_dp == $tm->total_pembayaran)
                    @php
                        $deposit = 'Lunas';
                    @endphp
                @else
                    @php
                        $deposit = '50 %';
                    @endphp
                @endif

                <tr class="text-center" align="center">
                    <td align="center">{{ $loop->iteration }}</td>
                    <td>{{ $tm->kode }}</td>
                    <td>{{ $tm->nama }}</td>
                    <td>{{ $tm->no_telp }}</td>
                    <td>{{ $tm->nik }}</td>
                    <td>{{ date('d/m/Y H:i', strtotime($tm->tgl_sewa)) }}</td>
                    <td>{{ date('d/m/Y H:i', strtotime($tm->tgl_kembali)) }}</td>
                    <td>{{ date('d/m/Y', strtotime($tm->tgl_dp)) }}</td>
                    <td>{{ $tm->hari }} Hari</td>
                    <td>{{ $tm->faktur }}</td>
                    <td>{{ $tm->status }}</td>
                    <td>Rp.
                        {{ number_format($tm->total_dp, 0, ',', '.') }}</td>
                    <td>{{ $deposit }}</td>
                    <td>Rp.
                        {{ number_format($tm->total_pembayaran, 0, ',', '.') }}</td>

                </tr>
            @endforeach
        <tfoot>
            <tr class="text-center">
                <th colspan="11" align="right">Total Pendapatan </th>
                <th>Rp.
                    {{ number_format($pendapatan, 0, ',', '.') }}</th>
                <th></th>
                <th></th>
            </tr>
        </tfoot>
        </tbody>
    </table>
    <br>




</body>

</html>
