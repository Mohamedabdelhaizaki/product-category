<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\category\CategoryCollection;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $categories = Category::query();
            $categories->select('id', 'name', 'is_active', 'created_at');

            if (isset($request->order[0]['column'])) {
                $request['sort'] = ['column' => $request['columns'][$request['order'][0]['column']]['name'], 'dir' => $request['order'][0]['dir']];
                $categories->sortBy($request);
            }


            if (isset($request->search['value']))  $categories->search($request);
            $categoryCount = $categories->count();

            $categories = $categories->skip($request->start)
                ->take(($request['length'] == '-1') ? $categoryCount : $request->length)
                ->get();
            return CategoryCollection::make($categories)
                ->additional(['total_count' => $categoryCount]);
        }

        return view('category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request, Category $category)
    {
        if (request()->ajax()) {
            $data['is_active'] = $request->has('status') ?  1 :  0;
            $category->fill($request->validated() + $data)->save();

            session()->put(['alert-message' => __('Added Successfully'), 'alert-type' => 'success']);
            return response()->json([
                'status' => true,
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        if (request()->ajax()) {
            $data['is_active'] = $request->has('status') ?  1 :  0;
            $category->fill($request->validated() + $data)->save();
            session()->put(['alert-message' => __('Edit Successfully'), 'alert-type' => 'success']);

            return response()->json([
                'status' => true,
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if (request()->ajax()) {
            $category->delete();
            return response()->json([
                'status' => true,
            ]);
        }
    }
}
