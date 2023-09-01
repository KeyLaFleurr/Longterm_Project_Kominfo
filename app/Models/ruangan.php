<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ruangan extends Model
{
    use HasFactory;
    protected $primarykey = "id";
    protected $fillable = [
        'id',
        'Nama',
        'waktu',
        'Jabatan',
        'Instansi',
        'NIP',
        'Tujuan',
        'Jenis_kelamin',
        'No_telephone',
    ];
    protected $table = 'ruangan';
    public $timestamps = false;
}
