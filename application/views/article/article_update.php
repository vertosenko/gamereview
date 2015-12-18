
<form enctype="multipart/form-data" action="/article/update/id/<?php echo $article['id']?>" method="post" class="form-horizontal" role="form">

    <p>

    <div class="form-group">
        <label for="title">Title:</label>
        <textarea name="title" class="form-control" rows="5" ><?php echo $article['title']?></textarea>
    </div>
    </p>
    <p>

    <div class="form-group">
        <label for="text">Text:</label>
        <textarea name="text" class="form-control" rows="10"><?php echo $article['text']?></textarea>
    </div>
    </p>
    <p><input type="hidden" name="update" value="1"></p>
    <p><input type="submit" class="btn btn-success" value="Update"></p>
</form>