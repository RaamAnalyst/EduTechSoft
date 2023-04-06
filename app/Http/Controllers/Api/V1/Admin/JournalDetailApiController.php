<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJournalDetailRequest;
use App\Http\Requests\UpdateJournalDetailRequest;
use App\Http\Resources\Admin\JournalDetailResource;
use App\Models\JournalDetail;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class JournalDetailApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('journal_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new JournalDetailResource(JournalDetail::with(['owner'])->get());
    }

    public function store(StoreJournalDetailRequest $request)
    {
        $journalDetail = JournalDetail::create($request->validated());

        return (new JournalDetailResource($journalDetail))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(JournalDetail $journalDetail)
    {
        abort_if(Gate::denies('journal_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new JournalDetailResource($journalDetail->load(['owner']));
    }

    public function update(UpdateJournalDetailRequest $request, JournalDetail $journalDetail)
    {
        $journalDetail->update($request->validated());

        return (new JournalDetailResource($journalDetail))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(JournalDetail $journalDetail)
    {
        abort_if(Gate::denies('journal_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $journalDetail->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
