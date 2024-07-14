<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluasi Kinerja</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Evaluasi Kinerja Pegawai</h1>

        <form action="{{ route('evaluate.performance') }}" method="POST" class="mt-4">
            @csrf
            <div class="form-group">
                <label for="hasil_kerja">Hasil Kerja:</label>
                <select name="hasil_kerja" id="hasil_kerja" class="form-control">
                    <option value="diatas ekspektasi">Diatas Ekspektasi</option>
                    <option value="sesuai ekspektasi">Sesuai Ekspektasi</option>
                    <option value="dibawah ekspektasi">Dibawah Ekspektasi</option>
                </select>
            </div>
            <div class="form-group">
                <label for="perilaku">Perilaku:</label>
                <select name="perilaku" id="perilaku" class="form-control">
                    <option value="diatas ekspektasi">Diatas Ekspektasi</option>
                    <option value="sesuai ekspektasi">Sesuai Ekspektasi</option>
                    <option value="dibawah ekspektasi">Dibawah Ekspektasi</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Evaluasi</button>
        </form>

        <div class="row mt-4 justify-content-between">
            <div class="col-md-6 text-center">
                <img src="{{ asset('images/matrix.png') }}" alt="Matrix Kinerja" class="img-fluid">
            </div>
            <div class="col-md-5 text-center align-self-center">
                @if(isset($predikat))
                    <h2>Predikat Kinerja: <span class="badge badge-success">{{ $predikat }}</span></h2>
                @endif
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
