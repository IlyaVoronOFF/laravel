<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStore;
use App\Http\Requests\CategoryUpdate;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('news')
            ->select(['id', 'title', 'description', 'created_at'])->orderBy('id', 'desc')->get();

        return view('admin.categories.index', [
            'categoriesList' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStore $request)
    {

        $category = Category::create(
            $request->validated()
        )->save();

        if ($category) {
            return redirect()->route('admin.categories.index')->with('success', trans('message.admin.category.created.success'));
        }

        return back()->with('error', trans('message.admin.category.created.error'));
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
    public function edit(Category $category)
    {
        return view('admin.categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdate $request, Category $category)
    {
        $status = $category->fill(
            $request->validated()
        )->save();

        if ($status) {
            return redirect()->route('admin.categories.index')->with('success', trans('message.admin.category.updated.success'));
        }

        return back()->with('error', trans('message.admin.category.updated.error'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Category $category)
    {
        if ($request->ajax()) {
            try {
                $category->delete();
            } catch (\Throwable $th) {
                report($th);
            }
        }
    }
}