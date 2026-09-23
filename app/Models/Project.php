<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //colleghiamo le categorie
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
