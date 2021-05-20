<?php

namespace App\Models\Record;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'contact1',
        'contact2',
        'type',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'hospital_id');
    }
}