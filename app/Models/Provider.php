<?php

namespace App\Models;


use App\Models\Collection;
use App\Models\ProviderMenus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Provider extends Model
{
    use HasFactory;

    protected $table = 'providers';

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
        return $this->hasMany(Collection::class, 'provider');
    }

    public function users() {
        return $this->belongsTo(Users::class, 'IDuser');
    }
    public function menus(): HasMany
    {
        return $this->hasMany(ProviderMenus::class, 'IDProvider');
    }
}


