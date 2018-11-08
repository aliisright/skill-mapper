<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkillGoal extends Model
{
    protected $table = 'skill_goals';

    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'user_skillgoal', 'skillgoal_id', 'user_id');
    }

    public function skill()
    {
        return $this->belongsTo('App\Models\Skill');
    }
}
