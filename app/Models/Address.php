<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Address;
use App\Models\Patient;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        "bldg_no",
        "street",
        "barangay",
        "city",
        "country",
        "zipcode"
    ]; 

    public function patient()
    {
        return $this -> belongsTo(Patient::class);
    }
}
