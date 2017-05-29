<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Project;
use App\Issue;

class IssuesController extends Controller
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
            return Issue::all();
        } else {
            return response()->json(['error' => 'Unauthorized'], 401, []);
        }
    }

    public function createIssue(Request $request)
    {
        if ($request->isJson()) {
            $data = $request->json()->all();

            $issue = Issue::create([
                'title' => $data['title'],
                'slug' => $data['slug'],
                'description' => $data['description'],
                'project_id' => $data['project_id'],
                'reporter' => $data['reporter'],
                'assignee' => $data['assignee'],
                'type' => $data['type'],
                'status' => $data['status'],
                'priority' => $data['priority']
            ]);
            return response()->json($issue, 201);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401, []);
        }
    }

    public function updateIssue(Request $request, $id)
    {
        if ($request->isJson()) {

            try {
                $issue = Issue::findOrFail($id);

                $data = $request->json()->all();

                $issue->title = $data['title'];
                $issue->slug = $data['slug'];
                $issue->description = $data['description'];
                $issue->project_id = $data['project_id'];

                $issue->reporter = $data['reporter'];
                $issue->assignee = $data['assignee'];
                $issue->type = $data['type'];
                $issue->status = $data['status'];
                $issue->priority = $data['priority'];

                $issue->save();
                return response()->json($issue, 200);
            } catch (ModelNotFoundException $e) {
                return response()->json(['error' => 'No content'], 406);
            }

        } else {
            return response()->json(['error' => 'Unauthorized'], 401, []);
        }
    }

    public function getIssue(Request $request, $id)
    {
        if ($request->isJson()) {

            try {
                $issue = Issue::findOrFail($id);
                return response()->json($issue, 200);
            } catch (ModelNotFoundException $e) {
                return response()->json(['error' => 'No content'], 406);
            }

        } else {
            return response()->json(['error' => 'Unauthorized'], 401, []);
        }

    }

    public function deleteIssue(Request $request, $id)
    {
        if ($request->isJson()) {

            try {
                $issue = Issue::findOrFail($id);
                $issue->delete();

                return response()->json($issue, 200);
            } catch (ModelNotFoundException $e) {
                return response()->json(['error' => 'No content'], 406);
            }

        } else {
            return response()->json(['error' => 'Unauthorized'], 401, []);
        }
    }
}
