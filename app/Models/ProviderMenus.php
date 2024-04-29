<?php

namespace App\Models;


use App\Models\Menu;
use App\Models\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProviderMenus extends Model
{
    use HasFactory;

    protected $table = 'providermenus';

    protected $primaryKey = 'IDprovider'; //por defecto coge la columna que se llame id

    // public $incrementing = true; por defecto es true

    // protected $keyType = 'INT'; pordefecto se considera INT

    public $timestamps = false;

    /**
     * Get all of the collections for the Rider
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    // public function collections(): HasMany
    // {
    //     return $this->hasMany(Menus::class, 'IDMenu');
    // }

    public function Providers() 
    {
        return $this->belongsTo(Provider::class, 'IDProvider');
    }

    public function menus()
    {
        return $this->hasMany(Menu::class, 'ID');
    }
}


