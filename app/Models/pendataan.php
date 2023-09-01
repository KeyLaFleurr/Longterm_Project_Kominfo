<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pendataan extends Model
{
    use HasFactory;
    protected $primarykey = "id";
    protected $fillable = [
        'id',
        'tanggal',
        'nomor_bidang',
        'nomor_surat',
        'asal_surat',
        'perihal',
        'disposisi_kabid',
        'seksi',
        'dokumen',
    
      
    ];
    protected $table = 'pendataan';
    public $timestamps = false;
}
