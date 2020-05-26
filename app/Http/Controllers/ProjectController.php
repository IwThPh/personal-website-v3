<?php

namespace App\Http\Controllers;

use App\Image;
use App\Project;
use App\Skill;
use App\Social;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Project::all()->sortBy("rank")->jsonSerialize(), Response::HTTP_OK);
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
        //Validation
        $data = $this->validateProject($request);
        $project = new Project($data);
        $project->save();

        $this->syncSkills($project, $data);
        $this->newImages($project, $request);
        $this->newSocials($project, $data);
        $this->newSkills($project, $data);

        //Store
        $project->save();

        //Appends
        return response(null, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $data = $this->validateProject($request);

        $project->name = $data['name'];
        $project->brief = $data['brief'];
        $project->desc = $data['desc'];
        $project->rank = $data['rank'];

        $this->syncSkills($project, $data);
        $this->syncImages($project, $data);
        $this->newImages($project, $request);
        $this->newSocials($project, $data);
        $this->newSkills($project, $data);

        $project->save();

        return response(null, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        Project::destroy($id);
        return response(null, Response::HTTP_OK);
    }

    /**
     * Project Validation
     */
    protected function validateProject(Request $request)
    {
        $rules = [
            'name' => 'required',
            'brief' => 'required',
            'desc' => 'required',
            'rank' => 'required|integer',
            'skill_ids.*' => 'exists:skills,id',
            'skills.*.name' => 'sometimes|required|string',
            'socials.*.name' => 'sometimes|required|string',
            'socials.*.ref' => 'sometimes|required|url',
            'socials.*.fa' => 'sometimes|required|string',
            'image_ids.*' => 'exists:images,id',
            'images.*' => 'file',
        ];

        return $this->validate($request, $rules);
    }

    /**
     * Add New Skills
     */
    protected function newSkills(Project $project, array $data)
    {
        if (Arr::has($data, 'skills')) {
            foreach ($data['skills'] as $s) {
                $skill = new Skill($s);
                $skill->save();
                $project->skills()->save($skill);
            }
        }

    }

    /**
     * Add New Socials
     */
    protected function newSocials(Project $project, array $data)
    {
        if (Arr::has($data, 'socials')) {
            foreach ($data['socials'] as $s) {
                $social = new Social($s);
                $social->save();
                $project->socials()->save($social);
            }
        }
    }

    /**
     * Add New Images
     */
    protected function newImages(Project $project, Request $request)
    {
        if ($request->images) {
            foreach ($request->images as $i) {
                $size = getimagesize($i);
                $image = [
                    'filename' => $i->hashName(),
                    'name' => $i->getClientOriginalName(),
                    'width' => $size[0],
                    'height' => $size[1],
                ];
                $image = new Image($image);
                $image->save();
                $i->storePublicly('public/images/');
                $project->images()->save($image);
            }
        }
    }

    /**
     * Sync Skills
     */
    protected function syncSkills(Project $project, array $data)
    {
        if (!Arr::has($data, 'skill_ids')) {
            $data['skill_ids'] = [];
        }

        $project->skills()->sync($data['skill_ids']);
    }

    /**
     * Sync Images
     */
    protected function syncImages(Project $project, array $data)
    {
        if (!Arr::has($data, 'image_ids')) {
            $data['image_ids'] = [];
        }

        $project->images()->sync($data['image_ids']);
    }

}
