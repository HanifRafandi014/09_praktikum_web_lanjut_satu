@extends('mahasiswa.layout')
@section('content1')
<div class="container mt-5">
	<div class="row justify-content-center align-items-center">
		<div class="card" style="width: 24rem;">
			<div class="card-header">
				Edit Mahasiswa
			</div>
			<div class="card-body">
				@if ($errors->any())
				<div class="alert alert-danger">
					<strong>Whoops!</strong> There were some problems with your i
					nput.<br><br>
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif
				<form method="post" action="{{ route('mahasiswa.update', $Mahasiswa->nim) }}" enctype="multipart/form-data" id="myForm">
					@method('PUT') 
					@csrf
					<div class="form-group">
						<label for="nim">Nim</label>
						<input type="text" name="nim" class="form-control" id="nim" value="{{ $Mahasiswa->nim }}" aria-describedby="nim" >
					</div>
					<div class="form-group">
						<label for="nama">Nama</label>
						<input type="text" name="nama" class="form-control" id="nama" value="{{ $Mahasiswa->nama }}" aria-describedby="nama" >
					</div>

					<div class="form-group">
						<label for="foto" class="form-label">Foto</label>
						<div class="d-flex align-items-center">
							<img width="60px" class="rounded mx-auto d-block" src="{{ $Mahasiswa->foto==''? asset('images/default.png'): asset('storage/'.$Mahasiswa->foto) }}" alt="">
							<input class="form-control" style="margin-left: 5px;" type="file" id="foto" name="foto" value="{{ $Mahasiswa->foto }}">
						</div>
					</div>

					<div class="form-group">
						<label for="kelas">Kelas</label>
						<select class="custom-select" id="kelas" name="kelas">
							@foreach($kelas as $kls)
							<option value="{{ $kls->id }}" {{ $Mahasiswa->kelas_id == $kls->id ? 'selected' : '' }}>{{ $kls->nama_kelas }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="jurusan">Jurusan</label>
						<input type="jurusan" name="jurusan" class="form-control" id="jurusan" value="{{ $Mahasiswa->jurusan }}" aria-describedby="jurusan" >
					</div>
					
					<div class="form-group">
						<label for="no_handphone">No_Handphone</label>
						<input type="no_handphone" name="no_handphone" class="form-control" id="no_handphone" value="{{ $Mahasiswa->no_handphone }}" aria-describedby="no_handphone" >
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" name="email" class="form-control" id="email" value="{{ $Mahasiswa->email }}" aria-describedby="email" >
					</div>
					<div class="form-group">
						<label for="tanggal_lahir">Tanggal_Lahir</label>
						<input type="tanggal_lahir" name="tanggal_lahir" class="form-control" id="tanggal_lahir" value="{{ $Mahasiswa->tanggal_lahir }}" aria-describedby="tanggal_lahir" >
					</div>

					<form method="post" action="">
						<button type="submit" class="btn btn-primary" onclick="return confirm('Apakah Anda yakin ingin menyimpan perubahan ini?');">Submit</button>
						<a class="btn btn-success" href="{{ route('mahasiswa.index') }}">Kembali</a>
					</form>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection