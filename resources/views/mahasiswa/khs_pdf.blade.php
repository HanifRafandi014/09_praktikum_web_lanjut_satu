@extends('mahasiswa.layout')

@section('content1')
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th{
            font-size: 9pt;
        }
    </style>

    <div class="container mt-3">
        <div class="text-center">
            <h4>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h4>
        </div>
        <h2 class="text-center mt-4 mb-5">KARTU HASIL STUDI (KHS)</h2>
        <strong>Name: </strong> {{$khs->mahasiswa->nama}}<br>
        <strong>NIM: </strong> {{$khs->mahasiswa->nim}}<br>
        <strong>Class: </strong> {{$khs->mahasiswa->kelas->nama_kelas}}<br><br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Mata Kuliah</th>
                    <th scope="col">SKS</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Nilai Angka</th>
                    <th scope="col">Nilai Huruf</th>
                </tr>
            </thead>
            <tbody>
                @foreach($khs as $mk)
                <tr>
                    <td>{{$mk->matakuliah->nama_matkul}}</td>
                    <td>{{$mk->matakuliah->sks}}</td>
                    <td>{{$mk->matakuliah->semester}}</td>
                    <td>{{$mk->nilai_angka}}</td>
                    <td>{{$mk->nilai_huruf}}</td>
                </tr>
                @endforeach
            </tbody>
        </table><br>

        <p>Nilai Rata-rata {{$khs->mahasiswa->nama}} : </p>
    </div>
    @endsection
</body>