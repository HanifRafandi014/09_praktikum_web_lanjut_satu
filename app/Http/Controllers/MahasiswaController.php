<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Kelas;
use App\Models\MataKuliah;
use App\Models\Mahasiswa_MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection\links;
use Illuminate\Support\Facades\Storage;
use PDF;


class MahasiswaController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        if (request('search')) {
            $mahasiswa = Mahasiswa::where('nim', 'LIKE', '%' . request('search') . '%')
            ->orWhere('nama', 'LIKE', '%' . request('search') . '%')
            ->orWhere('jurusan', 'LIKE', '%' . request('search') . '%')
            ->orWhere('no_handphone', 'LIKE', '%' . request('search') . '%')
            ->orWhere('email', 'LIKE', '%' . request('search') . '%')
            ->orWhere('tanggal_lahir', 'LIKE', '%' . request('search') . '%')
            ->orWhereHas('kelas', function ($query) {
                $query->where('nama_kelas', 'like', '%' . request('search') . '%');
            })->with('kelas')
            ->paginate(5);

            return view('mahasiswa.index', ['paginate' => $mahasiswa]);   
        } else {
            $mahasiswa = Mahasiswa::with('kelas')->get(); // Mengambil semua isi tabel
            $paginate = Mahasiswa::orderBy('id_mahasiswa', 'asc')->Paginate(5);
            return view('mahasiswa.index', ['mahasiswa' => $mahasiswa, 'paginate' => $paginate]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(isset($_POST['tambah'])) {
            // code untuk menambahkan data
            // setelah berhasil menambahkan data
            echo "<script>alert('Data mahasiswa berhasil ditambahkan!');</script>";
        }
        $kelas = Kelas::all();
        return view('mahasiswa.create', ['kelas' => $kelas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'foto' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'no_handphone' => 'required',
            'email' => 'required',
            'tanggal_lahir' => 'required',
        ]);

        $image_name = '';
        if ($request->file('foto')) {
            $image_name = $request->file('foto')->store('images', 'public');
        }
        $mahasiswa = new Mahasiswa;
        $mahasiswa->nim = $request->get('nim');
        $mahasiswa->nama = $request->get('nama');
        $mahasiswa->foto = $image_name;
        $mahasiswa->jurusan = $request->get('jurusan');
        $mahasiswa->no_handphone = $request->get('no_handphone');
        $mahasiswa->email = $request->get('email');
        $mahasiswa->tanggal_lahir = $request->get('tanggal_lahir');

        $kelas = new Kelas;
        $kelas->id = $request->get('kelas');

        $mahasiswa->kelas()->associate($kelas);
        $mahasiswa->save();

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('mahasiswa.index')
        ->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nim)
    {
       $Mahasiswa = Mahasiswa::with('kelas')->where('nim', $nim)->first();
       return view('mahasiswa.detail', compact('Mahasiswa'));
   }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nim)
    {
       $Mahasiswa = Mahasiswa::with('kelas')->where('nim', $nim)->first();
       $kelas = Kelas::all();
       return view('mahasiswa.edit', compact('Mahasiswa', 'kelas'));

       if(isset($_POST['edit'])) {
            // code untuk mengedit data
            // setelah berhasil mengedit data
        echo "<script>alert('Data berhasil diubah!');</script>";
    }
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nim)
    {
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'foto' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'no_handphone' => 'required',
            'email' => 'required',
            'tanggal_lahir' => 'required',
        ]);

        //fungsi eloquent untuk mengupdate data inputan kita
        $mahasiswa = Mahasiswa::with('kelas')->where('nim', $nim)->first();

        if ($mahasiswa->foto && file_exists(storage_path('app/public/' . $mahasiswa->foto))) {
            \Storage::delete('public/' . $mahasiswa->foto);
        }

        $image_name = $request->file('foto')->store('images', 'public');
        $mahasiswa->foto = $image_name;

        $mahasiswa->nim = $request->get('nim');
        $mahasiswa->nama = $request->get('nama');
        $mahasiswa->jurusan = $request->get('jurusan');
        $mahasiswa->email = $request->get('email');
        $mahasiswa->tanggal_lahir = $request->get('tanggal_lahir');

        $kelas = new Kelas;
        $kelas->id = $request->get('kelas');

        $mahasiswa->kelas()->associate($kelas);
        $mahasiswa->save();

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('mahasiswa.index')
        ->with('success', 'Mahasiswa Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nim)
    {
        $Mahasiswa = Mahasiswa::where('nim',$nim)->first()->delete();
        return redirect()->route('mahasiswa.index')
        ->with('success', 'Mahasiswa Berhasil Dihapus');
    }

    public function khs($id)
    {
        $khs = Mahasiswa_MataKuliah::where('mahasiswa_id', $id)
        ->with('matakuliah')->get();
        $khs->mahasiswa = Mahasiswa::with('kelas')
        ->where('id_mahasiswa', $id)->first();

        return view('mahasiswa.khs', compact('khs'));
    }

    public function cetak_khs($id)
    {
        $mahasiswa = Mahasiswa::all();
        $khs = Mahasiswa_MataKuliah::where('mahasiswa_id', $id)
        ->with('matakuliah')->get();
        $khs->mahasiswa = Mahasiswa::with('kelas')
        ->where('id_mahasiswa', $id)->first();

        $pdf = PDF::loadview('mahasiswa.khs_pdf', ['khs' => $khs]);
        $pdf->setPaper('A4', 'portrait');
        return $pdf->stream();
    }
}
