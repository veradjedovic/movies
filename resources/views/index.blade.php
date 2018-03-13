@extends('layouts.app')

@section('content')

    @include('partials.nav')
    
    <div class="container content">
        <div class="card card-default">
            <div class="card-body">
                <!-- Container For Error Messages -->
                <div id="message"></div>

                    <div class="table-responsive">
                        <!-- Insert Movie Form -->
                        <form class="form-insert-movie" method="post" action="/api/movies">
                            <table id="insertMovie" class="table table-striped table-bordered table-light">
                                <tr>
                                    <th>The Title of Movie</th>
                                    <th>Genre</th>
                                    <th>Year</th>
                                    <th> </th>
                                </tr>
                                <tr>
                                    <td><input type="text" name="name" value=""></td>
                                    <td>
                                        <select id="categoryInsert" class="categoryInsert" name="category_id">
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" min="1900" max="2018" step="1" value="2018" name="year" />
                                    </td>
                                    <td><input id="submit-movie" class="btn btn-info" type="submit" name="btn_insert_movie" value="Add New Movie"></td>
                                </tr>
                            </table>
                        </form>
                        <!-- End Insert Movie Form -->
                    </div>
                    <div class="table-responsive">
                        <!-- Insert Genre Form -->
                        <form class="form-insert-category" method="post" action="/api/categories">
                            <table id="insertCategory" class="table table-striped table-bordered table-light">
                                <tr>
                                    <th>Name of Genre</th>
                                    <th> </th>
                                </tr>
                                <tr>
                                    <td><input  type="text" name="name" value=""></td>
                                    <td><input id="submit-category" class="btn btn-info" type="submit" name="btn_insert_category" value="Add New Category"></td>
                                </tr>
                            </table>
                        </form>
                        <!-- End Insert Genre Form -->
                    </div>
            </div>

            <br />
            
            <!-- Title of Datatable of Category -->
            <div class="card-header"><strong>Genres</strong></div>

            <!-- Datatable of Category -->
            <div class="card-body">
                <table id="datatable" class="table table-striped table-bordered table-light">
                </table>
            </div>
            <!-- End of Datatable of Category -->
            <br />
            <!-- Title of Datatable of Movie -->
            <div id="datatable-title" class="card-header"><strong>Movies</strong></div>

            <!-- Datatable of Movie. The Table Was Initialized Via Javascript -->
            <div id="datatable-movie-body" class="card-body">
                <table id="datatable-movies" class="table table-striped table-bordered table-light">
                </table>
            </div>
            <!-- End of Datatable of Movie -->

            <p id="scroll"></p>

        </div>
    </div>
    
@endsection
