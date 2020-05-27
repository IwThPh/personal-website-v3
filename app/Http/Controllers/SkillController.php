<?php

namespace App\Http\Controllers;

use App\skill;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Skill::all()->jsonSerialize(), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validation
        $data = $this->validateSkill($request);

        //Store
        $skill = new Skill($data);
        $skill->save();

        //Append
        return response(null, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, skill $skill)
    {
        $data = $this->validateSkill($request);

        $skill->name = $data['name'];

        $skill->save();

        return response(null, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(skill $skill)
    {
        Skill::destroy($skill);
        return response(null, Response::HTTP_OK);
    }

    /**
     * Skill Validation
     */
    protected function validateSkill(Request $request)
    {
        $rules = [
            'name' => 'required',
        ];

        return $this->validate($request, $rules);
    }
}
