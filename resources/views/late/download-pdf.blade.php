<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1><b>SURAT PERNYATAAN</b></h1>
    <h2><b>TIDAK AKAN DATANG TERLAMBAT KE SEKOLAH</b></h2>

    <p>Yang bertanda tangan dibawah ini:</p>
    <p>NIS : {{ $student['nis'] }}</p>
    <p>Nama : {{ $student['name'] }}</p>
    <p>Rombel : {{ $student['rombel']['rombel'] }}</p>
    <p>Rayon : {{ $student['rayon']['rayon'] }}</p>

    <p>Dengan ini menyatakan bahwa saya telah melakukan pelanggaran tata tertib sekolah, yaitu datang ke sekolah sebanyak <b>3 kali</b> yang mana hal tersebut masuk ke dalam pelanggaran kedisiplinan. Saya berjanji tidak akan terlambat datang ke sekolah lagi.Apabila saya terlambat datang ke sekolah lagi saya siap diberikan sanksi yang sesuai dengan peraturan sekolah.</p>

    <p>Demikian surat pernyataan terlambat ini saya buat dengan penuh penyesalan</p>

    <p>Peserta didik,</p>
    <p>{{ $student['name'] }}</p>
    
    <p>Bogor, {{ Carbon\Carbon::now()->formatLocalized('%d %B %Y') }}</p>
    <p>Orang Tua/Wali Peserta didik</p>
    <p>(.................)</p>
    <p>Pembimbing siswa:</p>
    <p>{{ $student['rayon']['user']['name'] }}</p>

    <p>Kesiswaan, </p>
    <p>(....................    )</p>
</body>
</html>