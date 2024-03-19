<?php

namespace App\Models;

use App\Models\Users;
use App\Models\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rider extends Model
{
    use HasFactory;

    protected $table = 'riders';

    protected $primaryKey = 'IDuser'; //por defecto coge la columna que se llame id

    // public $incrementing = true; por defecto es true

    // protected $keyType = 'INT'; pordefecto se considera INT

    public $timestamps = false;

    /**
     * Get all of the collections for the Rider
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collections(): HasMany
    {
        return $this->hasMany(Collection::class, 'rider');
    }

    public function users() {
        return $this->belongsTo(Users::class, 'IDuser');
    }
}
