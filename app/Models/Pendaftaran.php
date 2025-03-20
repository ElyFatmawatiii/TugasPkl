<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran'; // Pastikan ini ada!

    protected $fillable = [
        'nama_lengkap',
        'nisn',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'asal_sekolah',
        'nomor_hp',
        'nama_ayah',
        'nama_ibu',
        'alamat_email',
        'jurusan_pertama',
        'jurusan_kedua',
        'jurusan_ketiga',
    ];
}
