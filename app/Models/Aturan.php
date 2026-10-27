<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aturan extends Model
{
    use HasFactory;

    protected $table = 'aturan';

    protected $fillable = [
        'gejala_id',
        'nilai_cf_pakar',
    ];

    protected $casts = [
        'nilai_cf_pakar' => 'float',
    ];

    public function gejala()
    {
        return $this->belongsTo(Gejala::class);
    }
}
