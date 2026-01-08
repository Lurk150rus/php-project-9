<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UrlCheck extends Model
{
    protected $fillable = ['status_code', 'h1', 'title', 'description', 'url_id'];
    public function url()
    {
        return $this->belongsTo(Url::class);
    }
}
