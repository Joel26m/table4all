<?php

namespace App\Models;

use App\Models\Rider;
use App\Models\Delivery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Collection extends Model
{
    use HasFactory;

    protected $table = 'collections';

    protected $primaryKey = 'ID'; //por defecto coge la columna que se llame id

    // public $incrementing = true; por defecto es true

    // protected $keyType = 'INT'; pordefecto se considera INT

    public $timestamps = false;


    /**
     * Get the rider that owns the Collection
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rider(): BelongsTo
    {
        return $this->belongsTo(Rider::class, 'rider');
    }
    public function provider(): BelongsTo
    {
        return $this->belongsTo(Provider::class, 'provider');
    }

    public function deliveries(): HasMany
    {
        return $this->hasMany(Delivery::class, 'collection');
    }
}
