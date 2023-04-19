<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Mahasiswa as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table="mahasiswa";

    public $timestamps= false;
    protected $primaryKey = 'id_mahasiswa';

    protected $fillable = [
        'nim',
        'nama',
        'jurusan',
        'no_handphone',
        'email',
        'tanggal_lahir',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function mahasiswa_matakuliah()
    {
        return $this->hasMany(Mahasiswa_MataKuliah::class);
    }

}
