<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'braintree_plan',
        'cost',
        'description',
    ];

    //Permet de renvoyer le plan via le slug au lieu de l'id
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
