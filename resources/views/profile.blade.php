<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css')}}">
</head>
<body>
    
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card" style="width: 18rem; position: relative;">
            <img src="{{ asset('assets/img/bg.jpg') }}" class="bg" alt="Background Photo">
            <img src="{{ asset('upload/img/' . $user->foto) }}" class="pp" alt="PP">

            <div class="card-body">
                <h5 class="card-title d-flex justify-content-center mt-2">{{ $user->nama }}</h5>
                <h5 class="card-title d-flex justify-content-center mt-3">{{ $user->nama_kelas ?? 'Kelas tidak ditemukan' }}</h5>
                <h5 class="card-title d-flex justify-content-center mt-3">{{ $user->ipk }}</h5>
                <a href="{{ route('users.index') }}" class="btn btn-primary card-link d-flex justify-content-center mt-5">Kembali</a>
            </div>
        </div>
    </div>

</body>
</html>
