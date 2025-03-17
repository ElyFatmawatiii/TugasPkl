<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    protected $table = 'mapel';
    // protected $primaryKey = 'kode_mapel';
    // public $incrementing = false;
    // protected $keyType = 'string';

    protected $fillable = ['kode_mapel', 'nama'];
}
