$(document).ready(function() {

// ----------------------------------------------------------------------------------------
// Begin - Initialization of The Datatable of Category

    var dt = $('#datatable').DataTable({
        "stateSave": true,
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": '/api/categories',
            "type": "GET",

            "error": function () {
                console.log('Error, data are not found');
            }
        },

        "columns": [
            {"title": "id", "data": 'DT_Row_Index'},
            {"title": "Name of Genre", "data": "name"},
            {"title": "Movies", "data": {"id": "id", "name": "name"}, 'searchable': false, 'orderable': false,  "render": function(data, type, full, meta){
                return '<a class="show-movies-link" id="'+data.id+'" data-value="'+data.name+'" href="#scroll">Show Movies</a>';
            }},
            {
                "title": "Edit | Delete", "data": "id", "render": function (data, type, full, meta) {
                return '<center><a href="" class="updateBtnCategory"  id="row-update-category'+data+'" data-id="'+data+'"><i class="far fa-edit"></i></a> | <a href="" class="deleteBtnCategory" id="row-category'+data+'" data-id="'+data+'"><i class="far fa-trash-alt"></i></a></center>';
            }}
        ],

        "order": [[1, 'asc']]
    });
// -----------------------------------------------------------------------------------------
// End - Initialization of The Datatable of Category

// -----------------------------------------------------------------------------------------
// Begin - Inserting Category Data Into The Select Option

    function fillSelectCategory() {
        $.ajax({
            url: '/api/categories/list',
            type: 'GET',

            success: function (response) {

                if (response.error == false) {
                    $('#categoryInsert').html('<option value="">Choose A Genre</option>');
                    $.each( response.data, function( k, v ) {
                        $('#categoryInsert').append($('<option>', {
                            value: v.id,
                            text : v.name
                        }));
                    });
                } else {
                    $('#categoryInsert').append($('<option>', {
                        value: null,
                        text : response.message
                    }));
                }
            }
        });
    }

    fillSelectCategory();

// ------------------------------------------------------------------------------------------
// End - Inserting Category Data Into The Select Option
    
// ---------------------------------------------------------------------------------------------
// Begin - Function Delete

    function deleteItem(url, dtMovies, row_name, id, e) {

        e.preventDefault();
        swal({
                title: "Are you sure you want to execute this action?",
                text: "If you delete this, you will permanently lose the data!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete!",
                cancelButtonText: "No, cancel the action!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm){
                if (isConfirm) {
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "id": id
                        },
                        dataType: 'json',

                        success: function (response) {

                            console.log(response);
                            if (response.error == false) {
                                swal("Deleted!", response.message, "success");
                                $('a#row-'+row_name+''+response.id).parents()[2].remove();
                                dtMovies.ajax.reload();
                            } else {
                                swal("Error happened!", response.message, "error");
                            }
                        }
                    });
                } else {
                    swal("Canceled!", "Your data is still preserved :)", "error");
                }
            });
    }

// ---------------------------------------------------------------------------------------------
// End - Function Delete

// ------------------------------------------------------------------------------------------
// Begin - Initialization of The Datatable of Movies
        function movieDatatables(url, genre='', category="category.name") {
            var dtMovies = $('#datatable-movies').DataTable({
                "stateSave": true,
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": url,
                    "type": "GET",

                    "error": function () {
                        console.log('Error, data are not found');
                    }
                },

                "columns": [
                    {"title": "id", "data": 'DT_Row_Index'},
                    {"title": "Movie Title", "data": "name"},
                    {"title": "Genre", "data": category, "render": function (data, type, full, meta) {
                        return genre ? genre : data;
                    }},
                    {"title": "Year", "data": "year"},
                    {
                        "title": "Edit | Delete", "data": "id", "render": function (data, type, full, meta) {
                        return '<center><a href="" class="updateBtnMovie"  id="row-update-movie'+data+'" data-id="'+data+'"><i class="far fa-edit"></i></a> | <a href="" class="deleteBtnMovie" id="row-movie'+data+'" data-id="'+data+'"><i class="far fa-trash-alt"></i></a></center>';
                    }}
                ],

                "order": [[1, 'asc']]
            });

            return dtMovies;
        }

        var dtMovies = movieDatatables('/api/movies');
    
        // Delete Movie
        $('body').on('click', '.deleteBtnMovie', function (e) {

            var id = $(this).attr('data-id');

            deleteItem('/api/movies/'+id, dtMovies, 'movie', id, e);

        });
// -------------------------------------------------------------------------------------------
// End - Initialization of The Datatable of Movies

// ---------------------------------------------------------------------------------------------
// Begin - Initialization of The Datatable of Movies When Clicking on A Show Movies Link

    $('body').on('click', '.show-movies-link', function (e) {

        var category_id = $(this).attr('id');
        var category_name = $(this).attr('data-value');

        $('#datatable-movie-body').html('');
        $("#datatable-title").html('<strong> Genre: '+category_name+' <button class="btnShowAll small btn btn-info"> Show All Movies </button></strong>');
        $("#datatable-movie-body").html('<table id="datatable-movies" class="table table-striped table-bordered table-light"></table>');
           console.log(category_id);
        dtMovies = movieDatatables('/api/categories/'+category_id+'/movies', category_name, "category_id");

        // Delete Movie
        $('body').on('click', '.deleteBtnMovie', function (e) {

            var id = $(this).attr('data-id');

            deleteItem('/api/movies/'+id, dtMovies, 'movie', id, e);

        });
    });
// ----------------------------------------------------------------------------------------------------
// End - Initialization of The Datatable of Movies When Clicking on A Show Movies Link

    // ---------------------------------------------------------------------------------------------
// Begin - Initialization of The Datatable of Movies When Clicking on A Show All Movies button

    $('body').on('click', '.btnShowAll', function (e) {

        $('#datatable-movie-body').html('');
        $("#datatable-title").html('<strong>Movies</strong>');
        $("#datatable-movie-body").html('<table id="datatable-movies" class="table table-striped table-bordered table-light"></table>');

        dtMovies = movieDatatables('/api/movies');

        // Delete Movie
        $('body').on('click', '.deleteBtnMovie', function (e) {

            var id = $(this).attr('data-id');

            deleteItem('/api/movies/'+id, dtMovies, 'movie', id, e);

        });
    });
// ----------------------------------------------------------------------------------------------------
// End - Initialization of The Datatable of Movies When Clicking on A Show All Movies button


// ----------------------------------------------------------------------------------------------------
// Begin - Delete A Genre

    $('body').on('click', '.deleteBtnCategory', function (e) {

        var id = $(this).attr('data-id');

        e.preventDefault();
        swal({
                title: "Are you sure you want to execute this action?",
                text: "If you delete this, you will permanently lose the data!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete!",
                cancelButtonText: "No, cancel the action!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm){
                if (isConfirm) {
                    $.ajax({
                        url: '/api/categories/'+id,
                        type: 'DELETE',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "id": id
                        },
                        dataType: 'json',

                        success: function (response) {

                            console.log(response);
                            if (response.error == false) {
                                swal("Deleted!", response.message, "success");
                                $('a#row-category'+response.id).parents()[2].remove();
                                dt.ajax.reload();
                                $("#datatable-title").html('<strong>Movies</strong>');
                                $("#datatable-movie-body").html('<table id="datatable-movies" class="table table-striped table-bordered table-light"></table>');

                                // Initialization of The Datatable of Movies
                                dtMovies = movieDatatables('/api/movies');

                                // Delete Movie
                                $('body').on('click', '.deleteBtnMovie', function (e) {

                                    var id = $(this).attr('data-id');

                                    deleteItem('/api/movies/'+id, dtMovies, 'movie', id, e);

                                });

                                // Refresh Genre Data Into The Select Option In Add New Movie Form
                                fillSelectCategory();

                            } else {
                                swal("Error happened!", response.message, "error");
                            }
                        }
                    });
                } else {
                    swal("Canceled!", "Your data is still preserved :)", "error");
                }
            });
    });
// ----------------------------------------------------------------------------------------------
// End - Delete A Genre

    // -------------------------------------------------------------------------------------------
// Begin - Insert New Genre

    $('#submit-category').click(function(e){

        e.preventDefault();
        $("#message").html("").removeClass("alert alert-success alert-danger alert-dismissable");

        $.ajax({

            url: $('.form-insert-category').attr('action'),
            type: $('.form-insert-category').attr('method'),
            data: $('.form-insert-category').serialize(),
            dataType: 'json',

            success: function(response) {
                console.log(response);

                if(response.error == false){

                    swal("Action successfully executed!", response.message, "success");
                    $(".form-insert-category")[0].reset();

                    // Refresh Datatable of Genres
                    dt.ajax.reload();

                    // Refresh Genre Data Into The Select Option In Add New Movie Form
                    fillSelectCategory();

                } else {
                    swal("Error happened!", response.message, "error");
                }
            },
            error: function (response) {
                var errors = response.responseJSON.errors;

                if (errors) {
                    $.each( errors, function( k, v ) {
                        $('#message').append('<li>'+v[0]+'</li>').addClass("alert alert-success alert-danger alert-dismissable");
                    });
                } else {
                    swal("Oops...", 'Somethings wrong', "error");
                }
            }
        });
    });
// -----------------------------------------------------------------------------------------
// End - Insert New Genre

// ----------------------------------------------------------------------------------------------
// Begin - Update The Genre

    $('body').on('click', '.updateBtnCategory', function (e) {

        var id = $(this).attr('data-id');
        e.preventDefault();

        $('.content').load("/categories/edit");
        $("#message").html("").removeClass("alert alert-success alert-danger alert-dismissable");

        // Begin Ajax For Inserting Data From The Server Into The Edit Category Form
        $.ajax({

            url: '/api/categories/'+id+'/edit',
            type: 'GET',

            success: function(response) {
                $('#name').attr('value', response.data.name);
            } ,
            error: function () {
                console.log('Error happend!');
            }
        }); // End Ajax For Inserting Data From The Server Into The Edit Category Form

        // Begin Ajax for Update The Category
        $('body').on('click', '#submitBtnCategory', function (e) {

            e.preventDefault();
            $("#message").html("").removeClass("alert alert-success alert-danger alert-dismissable");

            $.ajax({

                url: '/api/categories/'+id,
                type: 'PUT',
                data: $('#form-edit-category').serialize(),
                dataType: 'json',

                success: function(response) {
                       console.log(response);

                    if(response.error == false){
                        swal({
                                title: "Success!",
                                text: "Action successfully executed!",
                                type: "success",
                                showCancelButton: false,
                                confirmButtonColor: "#009933",
                                confirmButtonText: "OK",
                                closeOnConfirm: false
                            },
                            function(isConfirm){
                                if (isConfirm) {
                                    window.location.href = "/";
                                }
                            });
                    } else {
                        swal("Error happened!", response.message, "error");
                    }
                },
                error: function (response) {
                    var errors = response.responseJSON.errors;
                    console.log(errors);

                    if (errors) {
                        $.each( errors, function( k, v ) {
                            $('#message').append('<li>'+v[0]+'</li>').addClass("alert alert-success alert-danger alert-dismissable");
                        });
                    } else {
                        swal("Oops...", 'Somethings wrong', "error");
                    }
                }
            });
        }); // End Ajax for Update The Category
    });
// -------------------------------------------------------------------------------------------
// End - Update The Genre

// -----------------------------------------------------------------------------------------
// Begin - Insert New Movie

    $('#submit-movie').click(function(e){

        e.preventDefault();
        $("#message").html("").removeClass("alert alert-success alert-danger alert-dismissable");

        $.ajax({

            url: $('.form-insert-movie').attr('action'),
            type: $('.form-insert-movie').attr('method'),
            data: $('.form-insert-movie').serialize(),
            dataType: 'json',

            success: function(response) {

                if(response.error == false){

                    swal("Action successfully executed!", response.message, "success");
                    $(".form-insert-movie")[0].reset();
                    $("#datatable-title").html('<strong>Movies</strong>');
                    $("#datatable-movie-body").html('<table id="datatable-movies" class="table table-striped table-bordered table-light"></table>');

                    // Initialization of The Datatable of Movies
                    dtMovies = movieDatatables('/api/movies');

                    // Delete Movie
                    $('body').on('click', '.deleteBtnMovie', function (e) {

                        var id = $(this).attr('data-id');

                        deleteItem('/api/movies/'+id, dtMovies, 'movie', id, e);

                    });

                } else {
                    swal("Error happened!", response.message, "error");
                }
            },
            error: function (response) {
                var errors = response.responseJSON.errors;

                if (errors) {
                    $.each( errors, function( k, v ) {
                        $('#message').append('<li>'+v[0]+'</li>').addClass("alert alert-success alert-danger alert-dismissable");
                    });
                } else {
                    swal("Oops...", 'Somethings wrong', "error");
                }
            }
        });
    });
// -----------------------------------------------------------------------------------------------
// End - Insert New Movie

// -----------------------------------------------------------------------------------------------
// Begin - Update Movie

    $('body').on('click', '.updateBtnMovie', function (e) {

        var id = $(this).attr('data-id');
        console.log(id);
        e.preventDefault();

        $('.content').load("/movies/edit");
        $("#message").html("").removeClass("alert alert-success alert-danger alert-dismissable");
        // Inserting Category Data Into The Select Option
        fillSelectCategory();

        // Begin Ajax For Inserting Data From The Server Into The Edit Movie Form
        $.ajax({

            url: '/api/movies/'+id+'/edit',
            type: 'GET',

            success: function(response) {
                console.log(response.data.category_id);
                $('#name').attr('value', response.data.name);
                $('#year').attr('value', response.data.year);
                $("select option[value='" + response.data.category_id + "']").attr("selected","selected");
            } ,
            error: function () {
                console.log('Error happend!');
            }
        }); // End Ajax For Inserting Data From The Server Into The Edit Movie Form

        $('body').on('click', '#submitBtnMovie', function (e) {

            e.preventDefault();
            $("#message").html("").removeClass("alert alert-success alert-danger alert-dismissable");

            // Begin Ajax for Update Movie
            $.ajax({

                url: '/api/movies/'+id,
                type: 'PUT',
                data: $('#form-edit-movie').serialize(),
                dataType: 'json',

                success: function(response) {
                    console.log(response);

                    if(response.error == false){
                        swal({
                                title: "Success!",
                                text: "Action successfully executed!",
                                type: "success",
                                showCancelButton: false,
                                confirmButtonColor: "#009933",
                                confirmButtonText: "OK",
                                closeOnConfirm: false
                            },
                            function(isConfirm){
                                if (isConfirm) {
                                    window.location.href = "/";
                                }
                            });
                    } else {
                        swal("Error happened!", response.message, "error");
                    }
                },
                error: function (response) {
                    var errors = response.responseJSON.errors;
                    console.log(errors);

                    if (errors) {
                        $.each( errors, function( k, v ) {
                            $('#message').append('<li>'+v[0]+'</li>').addClass("alert alert-success alert-danger alert-dismissable");
                        });
                    } else {
                        swal("Oops...", 'Somethings wrong', "error");
                    }
                }
            }); // End Ajax for Update Movie
        });
    });
// --------------------------------------------------------------------------------------------------
// End - Update Movie
});