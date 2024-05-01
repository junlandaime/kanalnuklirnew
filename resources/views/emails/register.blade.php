<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verifikasi Email Dosen Anda</title>
</head>

<body>
    <h2>Hai, {{ $teacher->user->name }}</h2>
    <p>Terima kasih telah melakukan proses pada Website Kanal Nuklir, berikut password anda:
        <strong>{{ $password }}</strong>
    </p>
    <p>Jangan lupa untuk melakukan verifikasi Email Dosen <a
            href="{{ route('teacher.verify_dosen', $teacher->activate_token) }}">DISINI</a></p>
</body>

</html>
