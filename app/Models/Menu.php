<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menus';
    protected $primaryKey = 'ID'; // Asegúrate de que 'ID' es el nombre correcto de la columna
    public $timestamps = false;

    public function providers() {
        return $this->belongsToMany(Provider::class, 'ProviderMenus', 'IDMenu', 'IDProvider')
                    ->withPivot('quantity');
    }
}
