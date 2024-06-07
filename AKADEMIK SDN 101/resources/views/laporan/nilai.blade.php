<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="Author" content="">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <!-- TITLE -->
    <title>SDN 101 &mdash; Tanjab Timur</title>
    <!-- ok -->
    <link href="{{ asset('laporan') }}/1.css" rel="stylesheet" />
    <link href="{{ asset('css/2.css') }}" rel="stylesheet">
    <!-- HEADER -->
</head>


<body onload="window.print()">
    <table border="0" style="width: 100%">
        <!-- <tbody> -->
        <tr>
            <td class="auto-style1" rowspan="3" width="101">
                <img alt="" height="100" src="{{ asset('update') }}/tanjab.jpg" width="100">
            </td>

            <td class="auto-style1">
                <center>
                    <h2 class="auto-style1">Data Nilai Siswa</h2>
                </center>
            </td>

            <td class="auto-style1" rowspan="3" width="101">
                <img alt="" height="100" src="{{ asset('update') }}/sd.png" width="100">
            </td>
        </tr>
        <tr>
            <td class="auto-style2">
                <center>Kecamatan Kec. Muara Sabak Timur, Kabupaten Kab. Tanjung Jabung Timur,
                    Provinsi Prov. Jambi</center>
            </td>
        </tr>
        </tbody>
    </table>
    <hr>
    <!-- HEADER -->

    <!-- BODY -->
    <Left><b>Nama :</b> {{ $siswa->nama }}</Left><br>

    {{-- <Left><b>Tahun :</b> {{ $nama->nama }}</Left><br> --}}
    <br>
    <table width="100%" class="tblcms2">
        <tbody>
            <tr>
                <th class="th_border cell">No</th>
                <th align="center" class="th_border cell">Mata Pelajaran</th>
                <th align="center" class="th_border cell">Nilai</th>
        </tbody>
        <tbody>
            @forelse ($laporan as $row)
                <tr class="event2">
                    <td align="center" width="50">{{ $loop->iteration }}</td>
                    <td align="center">{{ $row->jadwal_siswa->jadwal->mapel->nama ?? '-' }}</td>
                    <td align="center">{{ $row->nilai }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" align="center">BELUM ADA DATA !!!</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <!-- FOOTER -->

</body>

</html>
