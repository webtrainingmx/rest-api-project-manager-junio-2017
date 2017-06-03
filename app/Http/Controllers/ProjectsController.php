<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Project;
use App\User;

class ProjectsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function getAll(Request $request)
    {
        if ($request->isJson()) {
            return Project::all();
        } else {
            return response()->json(['error' => 'Unauthorized'], 401, []);
        }
    }

    public function createProject(Request $request)
    {
        if ($request->isJson()) {
            $data = $request->json()->all();
            $userExists = User::where("id", $data['user_id'])->exists();

            if ($userExists === FALSE) {
                return response()->json(['error' => 'Invalid parameters'], 406);
            }

            $project = Project::create([
                'title' => $data['title'],
                'slug' => $data['slug'],
                'description' => $data['description'],
                'user_id' => $data['user_id']
            ]);
            return response()->json($project, 201);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401, []);
        }
    }

    public function updateProject(Request $request, $id)
    {
        if ($request->isJson()) {

            try {
                $project = Project::findOrFail($id);

                $data = $request->json()->all();

                $project->title = $data['title'];
                $project->slug = $data['slug'];
                $project->description = $data['description'];
                $project->user_id = $data['user_id'];

                $project->save();
                return response()->json($project, 200);
            } catch (ModelNotFoundException $e) {
                return response()->json(['error' => 'No content'], 406);
            }

        } else {
            return response()->json(['error' => 'Unauthorized'], 401, []);
        }
    }

    public function getProject(Request $request, $id)
    {
        if ($request->isJson()) {

            try {
                $project = Project::findOrFail($id);
                return response()->json($project, 200);
            } catch (ModelNotFoundException $e) {
                return response()->json(['error' => 'No content'], 406);
            }

        } else {
            return response()->json(['error' => 'Unauthorized'], 401, []);
        }

    }

    public function deleteProject(Request $request, $id)
    {
        if ($request->isJson()) {

            try {
                $project = Project::findOrFail($id);
                $project->delete();

                return response()->json($project, 200);
            } catch (ModelNotFoundException $e) {
                return response()->json(['error' => 'No content'], 406);
            }

        } else {
            return response()->json(['error' => 'Unauthorized'], 401, []);
        }
    }
}
