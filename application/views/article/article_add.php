<script>
    jQuery('document').ready(function () {
        initEditor();
    });
</script>
<div class="col-md-12s">
    <form enctype="multipart/form-data" action="/article/add" method="post"
          class="form-horizontal" role="form">

        <label for="title">Title:</label>
        <textarea name="title" class="ckeditor" rows="5"></textarea>

        <label for="text">Text:</label>
        <textarea name="text" class="ckeditor" rows="10"></textarea>

        <input type="hidden" name="add" value="1">
        <input type="submit" class="btn btn-success" value="Update">
    </form>
</div>