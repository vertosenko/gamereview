<form enctype="multipart/form-data" action="/article/add" method="post" class="form-horizontal" role="form">

        <p>

        <div class="form-group">
            <label for="title">Title:</label>
            <textarea name="title" class="form-control" rows="5"></textarea>
        </div>
        </p>
        <p>

        <div class="form-group">
            <label for="text">Text:</label>
            <textarea name="text" class="form-control" rows="10"></textarea>
        </div>
        </p>

        <p><input type="hidden" name = "add" value="1" ></p>

        <p><input type="submit" class="btn btn-success" value="Add"></p>
    </form>