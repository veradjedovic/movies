    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div id="message"></div>
            <form id="form-edit-category" method="" action="">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="card card-default">
                    <div class="card-header"><strong>Edit Genre</strong></div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name of Genre *</label>
                            <input type="text" class="form-control" id="name" name="name" value="">
                        </div>
                    </div>

                    <div class="card-footer">
                        <button id="submitBtnCategory" type="submit" class="btn btn-info">Edit</button>
                        <button class="btn btn-info" onclick="history.go(-1);">Go back</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

