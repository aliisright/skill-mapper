<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Skill;

class UserSkill extends Model
{
    use SoftDeletes;

    protected $table = 'user_skill';
        
    protected $fillable = [
        'user_id', 'skill_id', 'score_id', 'state_id'
    ];

    protected $dates = ['deleted_at'];

    public function score()
    {
        return $this->belongsTo('App\Models\Score');
    }

    public function skill_state()
    {
        return $this->hasOne('App\Models\SkillState');
    }

    // status
    public function isLocked()
    {
        return $this->state_id = 3;
    }

    public function isUnlocked()
    {
        return $this->state_id = 3;
    }

    public function isValidated()
    {
        return $this->state_id = 3;
    }

    // children
    public function children()
    {
        $skills = Skill::where('parent_id', $this->skill_id);
        $skillIds = [];
        foreach ($skills as $skill) {
            $skillIds[] = $skill->id;
        }
        $userSkills = Self::whereIn('id', $skillIds)->get();
        return $userSkills;
    }

    private function getChildren()
    {
        return Skill::where('parent_id', $this->skill_id);
    }

    // actions
    public function validate()
    {
        if($this->state === 2) {
            $this->update(['state_id' => 3]);
            return response()->json([
                'message' => $this->skill->name . ' skill have been validated'
            ]);
        }
        return response()->json([
            'message' => 'A problem has occured'
        ]);
    }

    public function unvalidate()
    {
        if ($this->state === 3) {
            $this->update(['state_id' => 2]);
            return response()->json([
                'message' => 'subskill have been unvalidated'
            ]);
        }
        return response()->json([
            'message' => 'A problem has occured'
        ]);
    }

    public function unlockChildren()
    {
        $children = $this->getChildren();
        $children->update(['state_id' => 2]);
        return response()->json([
            'message' => 'subskills have been unlocked'
        ]);
    }

    public function lockChildren()
    {
        $children = $this->getChildren();
        $children->update(['state_id' => 2]);
        return response()->json([
            'message' => 'subskills have been locked'
        ]);
    }
}
