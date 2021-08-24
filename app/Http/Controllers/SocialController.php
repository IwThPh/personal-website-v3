<?php

namespace App\Http\Controllers;

use App\Social;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Social::all()->jsonSerialize(), Response::HTTP_OK);
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
        $data = $this->validateSocial($request);

        //Store
        $social = new Social($data);
        $social->save();

        //Append
        return response(null, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Social $social)
    {
        $data = $this->validateSocial($request);

        $social->name = $data['name'];
        if (Arr::has($data, 'project_id')) {
            $social->project_id = $data['project_id'];
        }
        $social->ref = $data['ref'];
        $social->fa = $data['fa'];

        $social->save();

        return response(null, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function destroy(Social $social)
    {
        $social->delete();
        return response(null, Response::HTTP_OK);
    }

    /**
     * Social Validation
     */
    protected function validateSocial(Request $request)
    {
        $rules = [
            'name' => 'required',
            'project_id' => 'nullable|exists:projects,id',
            'ref' => 'required|url',
            'fa' => 'required',
        ];

        return $this->validate($request, $rules);
    }
}
