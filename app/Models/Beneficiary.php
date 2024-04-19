<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
{
    use HasFactory;

    protected $table = 'beneficiary';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    // public function users() {
    //     return $this->belongsTo(Users::class, 'IDuser');
    // }
}