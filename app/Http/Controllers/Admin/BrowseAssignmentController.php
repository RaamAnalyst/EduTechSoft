<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\BrowseAssignment;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BrowseAssignmentController extends Controller
{
    use WithCSVImport;

    public function __construct()
    {
        $this->csvImportModel = BrowseAssignment::class;
    }

    public function index()
    {
        abort_if(Gate::denies('browse_assignment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.browse-assignment.index');
    }

    public function create()
    {
        abort_if(Gate::denies('browse_assignment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.browse-assignment.create');
    }

    public function edit(BrowseAssignment $browseAssignment)
    {
        abort_if(Gate::denies('browse_assignment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.browse-assignment.edit', compact('browseAssignment'));
    }

    public function show(BrowseAssignment $browseAssignment)
    {
        abort_if(Gate::denies('browse_assignment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $browseAssignment->load('categories', 'tags', 'owner');

        return view('admin.browse-assignment.show', compact('browseAssignment'));
    }

    public function storeMedia(Request $request)
    {
        abort_if(Gate::none(['browse_assignment_create', 'browse_assignment_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('size')) {
            $this->validate($request, [
                'file' => 'max:' . $request->input('size') * 1024,
            ]);
        }

        $model                     = new BrowseAssignment();
        $model->id                 = $request->input('model_id', 0);
        $model->exists             = true;
        $media                     = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));
        $media->wasRecentlyCreated = true;

        return response()->json(compact('media'), Response::HTTP_CREATED);
    }
}
