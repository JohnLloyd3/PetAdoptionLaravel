<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adoption extends Model
{
    use HasFactory;

    protected $primaryKey = 'a_id';

    protected $fillable = [
        'adopter_id',
        'pet_id',
        'adoption_date',
    ];

    public function adopter()
    {
        return $this->belongsTo(Adopter::class, 'adopter_id');
    }

    public function pet()
    {
        return $this->belongsTo(Pet::class, 'pet_id');
    }
}
