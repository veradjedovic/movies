    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div id="message"></div>
            <form id="form-edit-movie" method="" action="">
                <!-- <input name="_method" type="hidden" value="PUT"> -->
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="card card-default">
                    <div class="card-header"><strong>Edit Movie</strong></div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">The Title of Movie *</label>
                            <input type="text" class="form-control" id="name" name="name" value="">
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="categoryInsert">Genre *</label>
                            <select id="categoryInsert" class="categoryInsert custom-select" name="category_id">
                            </select>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="year">Year *</label>
                            <input type="number" class="form-control" id="year" min="1901" max="2018" step="1" value="" name="year" />
                        </div>
                    </div>

                    <div class="card-footer">
                        <button id="submitBtnMovie" type="submit" class="btn btn-info">Edit</button>
                        <button class="btn btn-info" onclick="history.go(-1);">Go back</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
