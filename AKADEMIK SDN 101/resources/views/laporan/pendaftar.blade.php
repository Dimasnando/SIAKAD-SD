<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="Author" content="">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <!-- TITLE -->
    <title>SMAN 10 &mdash; Muaro Jambi</title>
    <!-- ok -->
    <link href="{{ asset('laporan') }}/1.css" rel="stylesheet" />
    <link href="{{ asset('css/2.css') }}" rel="stylesheet">
    <!-- HEADER -->
</head>

{{-- <body onload="window.print()"> --}}

<body onload="window.print()">
    <table border="0" style="width: 100%">
        <!-- <tbody> -->
        <tr>
            <td class="auto-style1" rowspan="3" width="101">
                <img alt="" height="100" src="{{ asset('update') }}/prov.png" width="100">
            </td>

            <td class="auto-style1">
                <center>
                    <h2 class="auto-style1">Data Siswa Baru Tahun {{ $thn }}</h2>
                </center>
            </td>

            <td class="auto-style1" rowspan="3" width="101">
                <img alt="" height="100" src="{{ asset('update') }}/logo.png" width="100">
            </td>
        </tr>
        <tr>
            <td class="auto-style2">
                <center>Jln. Lintas Petaling, Km.14. RT.14 Desa Kebon IX Kec. Sungai Gelam, Kab. Muaro Jambi, Prov.
                    Jambi, Kode Pos : 36373</center>
            </td>
        </tr>
        </tbody>
    </table>
    <hr>
    <!-- HEADER -->

    <!-- BODY -->
    <br>
    <table width="100%" class="tblcms2">
        <tbody>
            <tr>
                <th class="th_border cell">No</th>
                <th align="center" class="th_border cell">Nama Pendaftar</th>
                <th align="center" class="th_border cell">Asal Sekolah</th>
                <th align="center" class="th_border cell">NIS</th>
                <th align="center" class="th_border cell">Ho HP</th>
                <th align="center" class="th_border cell">Alamat Rumah</th>
        </tbody>
        <tbody>
            @forelse ($daftar as $row)
                <tr class="event2">
                    <td align="center" width="50">{{ $loop->iteration }}</td>
                    <td align="center">{{ $row->nama }}</td>
                    <td align="center">{{ $row->asal_skolah }}</td>
                    <td align="center">{{ $row->nis }}</td>
                    <td align="center">{{ $row->hp }}</td>
                    <td align="center">{{ $row->alamat }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" align="center">BELUM ADA DATA !!!</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>

</html>
