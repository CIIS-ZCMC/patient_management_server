<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Patient;

class PatientBiometric extends Model
{
    use HasFactory;
    
    protected $fillable = [
        "finger_1",
        "finger_2",
        "finger_3"
    ]; 

    public function patient()
    {
        return $this -> belongsTo(Patient::class);
    }
}
