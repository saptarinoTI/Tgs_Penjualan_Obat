<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Obat extends Model
{
    use HasFactory;

    protected $table = 'obat';
    protected $guarded = [];

    public function detailtransaksis(): HasMany
    {
        return $this->hasMany(DetailTransaksi::class);
    }
}
