<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\AuthorDetail;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthorDetailController extends Controller
{
    use WithCSVImport;

    public function __construct()
    {
        $this->csvImportModel = AuthorDetail::class;
    }

    public function index()
    {
        abort_if(Gate::denies('author_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.author-detail.index');
    }

    public function create()
    {
        abort_if(Gate::denies('author_detail_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.author-detail.create');
    }

    public function edit(AuthorDetail $authorDetail)
    {
        abort_if(Gate::denies('author_detail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.author-detail.edit', compact('authorDetail'));
    }

    public function show(AuthorDetail $authorDetail)
    {
        abort_if(Gate::denies('author_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $authorDetail->load('owner');

        return view('admin.author-detail.show', compact('authorDetail'));
    }
}
