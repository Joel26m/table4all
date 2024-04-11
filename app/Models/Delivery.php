<?php

namespace App\Models;


use App\Models\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Delivery extends Model
{
    use HasFactory;

    protected $table = 'deliveries';

    protected $primaryKey = 'ID'; //por defecto coge la columna que se llame id

    // public $incrementing = true; por defecto es true

    // protected $keyType = 'INT'; pordefecto se considera INT

    public $timestamps = false;

    /**
     * Get all of the collections for the Rider
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function deliverieCollections(): BelongsTo
    {
        return $this->belongsTo(Collection::class, 'collection');
    }
}