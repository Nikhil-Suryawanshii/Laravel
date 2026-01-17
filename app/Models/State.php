<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'states';

    protected $fillable = [
        'country_id',
        'name'
    ];

    public $timestamps = true;

    public function cities() {
        return $this->hasMany(City::class);
    }
}
