<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\UserSkill;
use App\Models\Level;
use Illuminate\Http\Request;
use Auth;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $type = $request->input('type', '');
        // if ($type === 'user_skill') {
        //     // return Auth::user()->skills;
        //     return UserSkill::all();
        // }
        // return Skill::all();
        return UserSkill::all();
    }

    /**
     * Getting data/relations of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSkillData($id)
    {
        return UserSkill::find($id)->children;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $parent_id = $request->input('parent_id', '');
        $type = $request->input('type', '');

        if (empty($parent_id) && empty($type)) {
            $level = Level::firstOrCreate(['level' => 1]);
            Skill::create(
                [
                    'name' => $request->input('name'),
                    'icon_path' => $request->input('icon_path'),
                    'level_id' => $level->id,
                ]
            );
        }
        if (empty($parent_id) && $type === 'user_skill') {
            UserSkill::create(
                ['user_id' => Auth::id()],
                [
                    'skill_id' => $request->input('skill_id'),
                    'score_id' => $request->input('score_id'),
                    'state_id' => $request->input('state_id'),
                ]
            );
        }
        if (!empty($parent_id)) {
            $parentSkill = Skill::find($parent_id);
            $level = Level::firstOrCreate(['level' => $parentSkill->level_id + 1]);            
            Skill::create(
                [
                    'name' => $request->input('name'),
                    'icon_path' => $request->input('icon_path'),
                    'parent_id' => $request->input('parent_id'),
                    'level_id' => $level->id,
                ]
            );
        }
        // return response()->json([
        //     'success' => false,
        //     'message' => 'unprocessable entity',
        // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        // $type = $request->input('type', '');

        // if ($type === 'user_skill') {
        //     return UserSkill::find($id);
        // }
        // return Skill::find($id);
        return Skill::find($id)->parent;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Skill $skill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $parent_id = $request->input('parent_id', '');
        $type = $request->input('type', '');
        $action = $request->input('action', '');

        if ($type === 'user_skill') {
            $userSkill = UserSkill::where('user_id', Auth::id())->where('id', $id)->first();

            if ($action === 'validate') {
                $userSkill->validate();
                $userSkill->unlockChildren();             
            }
            if ($action === 'unvalidate') {
                $userSkill->unvalidate();
                $userSkill->lockChildren();             
            }
            return $userSkill->update([
                'skill_id' => $request->input('skill_id'),
                'score_id' => $request->input('score_id'),
            ]);
        }

        $skill = Skill::where('id', $id)->first();
        if (!empty($parent_id)) {
            $parentSkill = Skill::find($parent_id);
            $parentLevel = $parentSkill->level_id;
            $levelId = Level::where('level', $parentSkill->level_id + 1)->first()->id;
            return $skill->update([
                'name' => $request->input('name'),
                'icon_path' => $request->input('icon_path'),
                'parent_id' => $request->input('parent_id'),
                'level_id' => $levelId,
            ]);
        }
        return $skill->update([
            'name' => $request->input('name'),
            'icon_path' => $request->input('icon_path'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $type = $request->input('type', '');
        
        if ($type === 'user_skill') {
            $userSkill = UserSkill::where('user_id', Auth::id())->where('id', $id)->first();
            $userSkill->delete();
            return response()->json([
                'success' => true,
                'message' => 'The user skill has been successfully deleted'
            ]);
        }
        $skill = Skill::where('id', $id)->first();
        $skill->delete();
        return response()->json([
            'success' => true,
            'message' => 'The skill has been successfully deleted'
        ]);
    }
}
