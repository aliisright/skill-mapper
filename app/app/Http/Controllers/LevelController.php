<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = Level::all();
        if (!$levels || count($levels) === 0) {
            return response()->json([
                'message' => 'No levels found'
            ]);
        }
        return $levels;
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
        $level = Level::create([
            'level' => $request->input('level')
        ]);
        if (!$level) {
            return response()->json([
                'message' => 'a problem has occured, the level wasn\'t created'
            ]);
        }
        return $level;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $level = Level::find($id);
        if(!$level) {
            return response()->json([
                'message' => 'level not found'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function edit(Level $level)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $level = Level::find($id);
        if(!$level) {
            return response()->json([
                'message' => 'Level not found'
            ]);
        }
        return $level->update([
            'level' => $request->input('level')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $level = Level::find($id);
        if(!$level) {
            return response()->json([
                'message' => 'Level not found'
            ]);
        }
        $level->delete();
        return response()->json([
            'message' => 'Level has been successfully deleted'
        ]);
    }
}
