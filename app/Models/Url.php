<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    protected $fillable = ['name'];

    public function checks()
    {
        return $this->hasMany(UrlCheck::class);
    }
}
