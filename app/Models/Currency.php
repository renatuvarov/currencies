<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    public $timestamps = false;
    protected $guarded = ['id'];
    protected $perPage = 2;

    public function getRouteKeyName(): string
    {
        return 'code';
    }
}
