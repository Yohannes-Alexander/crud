<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annualreviews extends Model
{
    use HasFactory;

    protected $table = "annualreviews";
    protected $fillable = ['ID', 'EmpID','ReviewDate'];
    public $timestamps = false;
}
