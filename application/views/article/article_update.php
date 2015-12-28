<script>
    jQuery('document').ready(function () {
        initEditor();
    });
</script>
<div class="col-md-12s">
    <form enctype="multipart/form-data" action="/article/update/id/<?php echo $article[0]['id'] ?>" method="post"
          class="form-horizontal" role="form">

        <label for="title">Title:</label>
        <textarea name="title" class="ckeditor" rows="5"><?php echo $article[0]['title'] ?></textarea>

        <label for="text">Text:</label>
        <textarea name="text" class="ckeditor" rows="10"><?php echo $article[0]['text'] ?></textarea>

        <input type="hidden" name="update" value="1">
        <input type="submit" class="btn btn-success" value="Update">
    </form>
</div>

