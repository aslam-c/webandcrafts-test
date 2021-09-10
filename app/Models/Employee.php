<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Designation;

class Employee extends Model
{
    use HasFactory;

    public $fillable = ['name','email','photo','designation_id'];

    public function designation(){
        return $this->hasOne(Designation::class,'id','designation_id');
    }
}
