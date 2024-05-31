<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technologie extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'description'];

    public function project(){
        return $this->belongsToMany(Project::class);
    }

}
