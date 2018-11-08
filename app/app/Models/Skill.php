<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\UserSkill;

class Skill extends Model
{
    protected $fillable = [
        'name', 'icon_path', 'level_id', 'parent_id'
    ];

    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'user_skill');
    }

    public function skill_goals()
    {
        return $this->hasMany('App\Models\SkillGoal');
    }

    public function level()
    {
        return $this->belongsTo('App\Models\Level');
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\Skill', 'parent_id', 'id');
    }

    public function children()
    {
        return $this->hasMany('App\Models\Skill', 'parent_id', 'id');
    }
}
