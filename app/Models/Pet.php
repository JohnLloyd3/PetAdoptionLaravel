<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $primaryKey = 'p_id';

    protected $fillable = [
        'u_id',
        'p_name',
        'p_size',
        'p_age',
        'p_breed',
        'p_type',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'u_id');
    }
}
