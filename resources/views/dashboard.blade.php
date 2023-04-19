@extends('layouts.content')

@section('title', 'Dashboard')

@section('content')
<style>
  .sel {font-size: 30px;}
  .or {font-size: 35px;}
  .contents {font-size: 20px;}
  .contents .sel {font-size: 30px;}
  /*.contents .left {
    display: flex;
    justify-content: space-around;
  }

  .contents .right {
    display: flex;
    justify-content: space-around;
  }*/
</style>

<x-laravelcomp dashboard="active" index=""/>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="card-body">
      <p class="sel"><b>Selamat Datang</b></p>
      <p class="or">PENGUMUMAN:</p><hr><br><br>

      <div class="contents">
        <h1 class="sel">Pembuatan Sistem Informasi Siakad Polinema</h1><hr>
        <div class="left">
          <p><b>Biodata Developer :</b></p>
          <p>Nama : Hanif Naufal Rafandi</p>
          <p>Kelas : TI - 2G</p>
          <p>Jurusan : Teknologi Informasi</p>
          <p>Prodi : Teknik Informatika</p>
          <p>No Hp : 081235485829</p>
        </div><br>

        <div class="right">
          <p><b>Materi yang Dilalui dalam Pembuatan Sistem Informasi Siakad</b></p>
          <p>1. Pengenalan Framework Laravel</p>
          <p>2. Routing dan Controller</p>
          <p>3. View</p>
          <p>4. Model</p>
          <p>5. Authentication</p>
          <p>6. ORM</p>
          <p>7. ORM dengan Relasi</p>
          <p>8. Session & Cookies</p>
          <p>9. Upload File</p>
          <p>10. Restfull API</p>
          <p>11. Form Validation</p>
          <p>12. JWT</p>
          <p>13. Testing & Caching</p>
          <p>14. Deployment</p>
        </div>
      </div>
    </div>
  </section>
</div>

@endsection