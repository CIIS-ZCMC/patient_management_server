<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Address;
use App\Models\PatientBiometric;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        "first_name",
        "middle_name",
        "last_name",
        "extension_name",
        "dob",
        "sex",
        "contact",
        "religion",
        "ethnicity",
        "image_url"
    ]; 

    public function address()
    {
        return $this -> hasOn(Address::class);
    }

    public function biometric()
    {
        return $this -> belongsTo(PatientBiometric::class);
    }
}
