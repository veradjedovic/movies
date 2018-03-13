<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Exception;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        try {

            return DataTables::of($category->GetAll())->addIndexColumn()->make(true);

        } catch (Exception $ex) {

            return response(['data' => null, 'error' => true, 'message' => $ex->getMessage()]);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Category $category)
    {
        try {

            $categories = $category->GetAll();

            return response(['data' => $categories, 'error' => false, 'message' => 'Success']);

        } catch (Exception $ex) {

            return response(['data' => null, 'error' => true, 'message' => $ex->getMessage()]);
        }

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listMoviesOfCategory(Category $category)
    {
        try {

            return DataTables::of($category->GetMoviesByCategory())->addIndexColumn()->make(true);

        } catch (Exception $ex) {

            return response(['data' => null, 'error' => true, 'message' => $ex->getMessage()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request, Category $category)
    {
        try {

            $item = $category->createItem($request->all());

            return response(['message' => 'This genre is created.', 'id' => $item['id'], 'error' => false]);

        } catch (Exception $ex) {

            return response(['message' => $ex->getMessage(), 'id' => null, 'error' => true]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return response(['data' => $category, 'message' => 'Success.',  'error' => false]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CategoryRequest  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        try {

            $category->updateItem($request->all());

            return response(['message' => 'This genre is successfully updated.', 'id' => $category->id, 'error' => false]);

        } catch (Exception $ex) {

            return response(['message' => $ex->getMessage(), 'id' => $category->id, 'error' => true]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {

            $category->deleteItem();

            return response(['message' => 'This genre is deleted.', 'id' => $category->id, 'error' => false]);

        } catch (Exception $ex) {

            return response(['message' => $ex->getMessage(), 'id' => $category->id, 'error' => true]);
        }
    }
}
