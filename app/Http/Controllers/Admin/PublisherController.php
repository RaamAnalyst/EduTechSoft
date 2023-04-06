<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\Publisher;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PublisherController extends Controller
{
    use WithCSVImport;

    public function __construct()
    {
        $this->csvImportModel = Publisher::class;
    }

    public function index()
    {
        abort_if(Gate::denies('publisher_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.publisher.index');
    }

    public function create()
    {
        abort_if(Gate::denies('publisher_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.publisher.create');
    }

    public function edit(Publisher $publisher)
    {
        abort_if(Gate::denies('publisher_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.publisher.edit', compact('publisher'));
    }

    public function show(Publisher $publisher)
    {
        abort_if(Gate::denies('publisher_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $publisher->load('owner');

        return view('admin.publisher.show', compact('publisher'));
    }
}
