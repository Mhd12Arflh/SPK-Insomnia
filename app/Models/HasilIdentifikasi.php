<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilIdentifikasi extends Model
{
    use HasFactory;

    protected $table = 'hasil_identifikasi';

    protected $fillable = [
        'nama_user',
        'usia',
        'jenis_kelamin',
        'nilai_cf_combine',
        'persentase',
        'tingkat_insomnia_id',
        'tanggal',
    ];

    protected $casts = [
        'nilai_cf_combine' => 'float',
        'persentase' => 'float',
        'tanggal' => 'date',
    ];

    public function tingkatInsomnia()
    {
        return $this->belongsTo(TingkatInsomnia::class);
    }

    public function detail()
    {
        return $this->hasMany(HasilIdentifikasiDetail::class);
    }
}
