<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class datPeserta extends Model
{
    protected $fillable = [
        'id_sekolah',
        'id_events',
        'namaLengkap',
        'id_posisi',
        'NIK',
        'nomor_jersey',
        'tgl_lahir',
        'nama_ayah',
        'nama_ibu',
        'status',
        'nomor_handphone',
        'alamat',
        'email',
        'path_kk',
        'path_akte',
        'path_ijazah',
        'path_biodata_lapor',
        'path_surat_keterangan_ortu',
        'path_photo',
        'created_by',
        'create_by',
    ];
}
