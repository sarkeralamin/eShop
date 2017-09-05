<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function file()
    {
        return $this->belongsTo(File_Shop::class);
    }
}
