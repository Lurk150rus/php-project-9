<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UrlCheck extends Model
{
    public function url()
    {
        return $this->belongsTo(Url::class);
    }
}
