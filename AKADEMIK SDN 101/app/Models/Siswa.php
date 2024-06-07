<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Siswa extends Model
{
    use Uuid;
    use HasFactory;
    protected $guarded = [];
    public function nilai()
    {
        // return $this->hasMany(Nilai::class)->orderBy('jenis', 'asc');
        return $this->hasMany(Nilai::class);
    }
}
