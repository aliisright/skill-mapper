<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkillState extends Model
{
    protected $fillable = [
        'name'
    ];

    public function user_skill()
    {
        return $this->belongsTo('App\Models\UserSkill');
    }
}
