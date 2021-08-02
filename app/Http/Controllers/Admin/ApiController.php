<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RssStore;
use App\Http\Requests\RssUpdate;
use App\Models\Rss;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rss = Rss::orderBy('id', 'desc')->get();

        return view('admin.rss.index', [
            'rssList' => $rss
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.rss.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RssStore $request)
    {
        try {


            $rss = Rss::create(
                $request->validated()
            )->save();

            if ($rss) {
                return redirect()->route('admin.rss.index')->with('success', trans('message.admin.rss.created.success'));
            }

            return back()->with('error', __('message.admin.rss.created.error'));
        } catch (ValidationException $e) {
            dd($e->validator->getMessageBag()->all());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Rss $rss)
    {
        return view('admin.rss.edit', ['rss' => $rss]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RssUpdate $request, Rss $rss)
    {
        $data = $request->validated();

        $status = $rss->fill($data)->save();

        if ($status) {
            return redirect()->route('admin.rss.index')->with('success', trans('message.admin.rss.updated.success'));
        }

        return back()->with('error', __('message.admin.rss.updated.error'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Rss $rss)
    {
        if ($request->ajax()) {
            try {
                $rss->delete();
            } catch (\Throwable $th) {
                report($th);
            }
        }
    }
}
