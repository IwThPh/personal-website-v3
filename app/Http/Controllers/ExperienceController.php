<?php

namespace App\Http\Controllers;

use App\Experience;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Experience::all()->sortBy('start_at')
                ->jsonSerialize(), Response::HTTP_OK);
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
        $data = $this->validateExperience($request);

        //Store
        $experience = new Experience($data);
        $experience->save();

        //Append
        return response(null, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, experience $experience)
    {
        $data = $this->validateExperience($request);

        $experience->name = $data['name'];
        $experience->location = $data['location'];
        $experience->start_at = $data['start_at'];
        $experience->end_at = $data['end_at'];
        $experience->desc = $data['desc'];

        $experience->save();

        return response(null, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function destroy(experience $experience)
    {
        Project::destroy($experience);
        return response(null, Response::HTTP_OK);
    }

    /**
     * Experience Validation
     */
    protected function validateExperience(Request $request)
    {
        $rules = [
            'name' => 'required',
            'location' => 'required',
            'start_at' => 'required|date',
            'end_at' => 'nullable|date|after_or_equal:start_at',
            'desc' => 'required',
        ];

        return $this->validate($request, $rules);
    }

}
