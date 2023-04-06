<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\JournalDetail;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class JournalDetailController extends Controller
{
    use WithCSVImport;

    public function __construct()
    {
        $this->csvImportModel = JournalDetail::class;
    }

    public function index()
    {
        abort_if(Gate::denies('journal_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.journal-detail.index');
    }

    public function create()
    {
        abort_if(Gate::denies('journal_detail_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.journal-detail.create');
    }

    public function edit(JournalDetail $journalDetail)
    {
        abort_if(Gate::denies('journal_detail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.journal-detail.edit', compact('journalDetail'));
    }

    public function show(JournalDetail $journalDetail)
    {
        abort_if(Gate::denies('journal_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $journalDetail->load('owner');

        return view('admin.journal-detail.show', compact('journalDetail'));
    }
}
