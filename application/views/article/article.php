    <div class="list-group">
        <?php while ( $article_row = $article->fetch()) : ?>

            <a href="/article/index/id/<?php echo $article_row['id']?>" class="list-group-item ">
                <h2 class="list-group-item-heading"><?php echo $article_row['title']?></h2>
                <p class="list-group-item-text"><?php echo $article_row['text']?></p>
            </a>
        <?php endwhile; ?>
    </div>
    <?php if($edit) :?>
        <a href="/article/update/id/<?php echo $article_row['id']?>" class="btn btn-default btn-lg" role="button">
            Update
        </a>
        <a href="/article/delete/id/<?php echo $article_row['id']?>" class="btn btn-default btn-lg" role="button">
            Delete
        </a>
    <?php else :?>
        <a href="/article/add" class="btn btn-default btn-lg" role="button">
            Add
        </a>
    <?php endif;?>