<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;
    protected $fillable = ['kode', 'nama', 'kategori'];
    protected $table = 'produk';
    public $timestamps = false;
}
