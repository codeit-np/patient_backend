<?php

namespace App\Models\Record;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientFollowup extends Model
{
    use HasFactory;

    protected $guarded = ['id','patient_id'];
}