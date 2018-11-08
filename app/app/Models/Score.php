<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $fillable = [
        'score',
    ];
    public function user_skills()
    {
        return $this->hasMany('App\Models\UserSkill');
    }
}
