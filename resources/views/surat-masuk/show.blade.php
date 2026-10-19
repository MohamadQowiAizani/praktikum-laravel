<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Surat Masuk</title>
</head>
<body>
    <h1>Halaman Detail Surat Masuk</h1>
    @if($SuratMasukShow)

    <p>
        <strong>Nomor Surat</strong>{{$SuratMasukShow['nomor_surat']}}
        <strong>Tanggal</strong>{{$SuratMasukShow['tanggal']}}
        <strong>Pengirim</strong>{{$SuratMasukShow['pengirim']}}
        <strong>Perihal</strong>{{$SuratMasukShow['perihal']}}
    </p>
    @else
    <p>data tidak ditemukan</p>
    @endif
        
</body>
</html>