<?php

namespace App\Http\Controllers\Api;

use App\Movie;
use App\Http\Requests\MovieRequest;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Exception;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Movie $movie)
    {
        try {

            return DataTables::of($movie->GetAll())->addIndexColumn()->make(true);

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
     * @param  \App\Http\Requests\MovieRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MovieRequest $request, Movie $movie)
    {
        try {

            $item = $movie->createItem($request->all());

            return response(['message' => 'The movie is created.', 'id' => $item['id'], 'error' => false]);

        } catch (Exception $ex) {

            return response(['message' => $ex->getMessage(), 'id' => null, 'error' => true]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        return response(['data' => $movie, 'message' => 'Success.',  'error' => false]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\MovieRequest  $request
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(MovieRequest $request, Movie $movie)
    {
        try {

            $movie->updateItem($request->all());

            return response(['message' => 'This movie is successfully updated.', 'id' => $movie->id, 'error' => false]);

        } catch (Exception $ex) {

            return response(['message' => $ex->getMessage(), 'id' => $movie->id, 'error' => true]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        try {

            $movie->deleteItem();

            return response(['message' => 'This contact is deleted.', 'id' => $movie->id, 'error' => false]);

        } catch (Exception $ex) {

            return response(['message' => $ex->getMessage(), 'id' => $movie->id, 'error' => true]);
        }
    }
}
