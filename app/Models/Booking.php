<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'nama_alat',
        'tanggal_sewa',
        'tanggal_kembali',
    ];
    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

}
