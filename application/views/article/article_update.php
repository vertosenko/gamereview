<div class="col-md-12s">
        <label for="title">Title:</label>
        <textarea name="title" class="ckeditor" rows="5" id="editor"><?php echo $article['title'] ?></textarea>

        <label for="text">Text:</label>
        <textarea name="text" class="ckeditor" rows="10" id="editor2"><?php echo $article['text'] ?></textarea>

        <input type="hidden" name="update" value="1">
        <input type="submit" class="btn btn-success" value="Update">
</div>

