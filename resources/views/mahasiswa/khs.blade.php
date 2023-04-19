@extends('mahasiswa.layout')

@section('content1')
<div class="container mt-3">
    <div class="text-center">
        <h4>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h4>
    </div>
    <h2 class="text-center mt-4 mb-5">KARTU HASIL STUDI (KHS)</h2>
    <div class="row">
        <div class="col">
            <strong>Name: </strong> {{$khs->mahasiswa->nama}}<br>
            <strong>NIM: </strong> {{$khs->mahasiswa->nim}}<br>
            <strong>Class: </strong> {{$khs->mahasiswa->kelas->nama_kelas}}
        </div>
        <div class="col d-flex justify-content-end align-items-end">
            <a href="{{ route('cetak_khs', $khs->mahasiswa->id_mahasiswa) }}" class="btn btn-primary">Cetak PDF</a>
        </div>
    </div>
    <br>
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
    <p>Nilai Rata-rata {{$khs->mahasiswa->nama}} : </p><br>
    <a href="{{ route('mahasiswa.index') }}" class="btn btn-success">Kembali</a>
</div>
@endsection