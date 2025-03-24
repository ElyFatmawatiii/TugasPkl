<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran'; // Pastikan sesuai dengan nama tabel di database

    protected $fillable = [
        'nama_lengkap',
        'nisn',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'asal_sekolah',
        'nomor_hp',
        'status',
        'nama_ayah',
        'nama_ibu',
        'alamat_email',
        'jurusan_pertama',
        'jurusan_kedua',
        'jurusan_ketiga',
    ];

    public $timestamps = false; // Matikan timestamps jika tabel tidak memilikinya
}
