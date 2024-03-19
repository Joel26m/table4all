<?php

namespace App\Models;

use App\Models\Users;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Rider extends Model
{
    use HasFactory;

    protected $table = 'riders';
    protected $primaryKey = 'IDuser';
    public $timestamps = false;


    public function users() {
        return $this->belongsTo(Users::class, 'IDuser');
    }
}
