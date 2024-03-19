<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admins';
    protected $primaryKey = 'IDuser';
    public $timestamps = false;

    public function users() {
        return $this->belongsTo(Users::class, 'IDuser');
    }
}
