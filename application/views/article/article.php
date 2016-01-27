<div class="container">
    <h2><?php echo $article['title'] ?></h2>

    <p ><?php echo $article['text'] ?></p>

    <a href="#" id="link-popup-<?php echo $article['id'] ?>" data-id="<?php echo $article['id'] ?>" class="btn btn-default btn-lg edit-popup" role="button">
        Update
    </a>
    <a href="#" id="link-popup-<?php echo $article['id'] ?>" data-id="<?php echo $article['id'] ?>" class="btn btn-default btn-lg delete-popup" role="button">
        Delete
    </a>
</div>