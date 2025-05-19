<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adopter extends Model
{
    use HasFactory;

    protected $primaryKey = 'a_id';

    protected $fillable = [
        'u_id',
        'firstname',
        'lastname',
        'username',
        'email',
        'contact_number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'u_id');
    }
}
