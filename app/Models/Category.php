<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //colleghiamo i progetti
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
