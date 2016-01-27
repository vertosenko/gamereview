<div id="cont">
    <div class="articles">
        <div class="list-group">

            <?php foreach ($article as $key => $article_row) : ?>
                <a href="#" id="link-popup-<?php echo $article[0]['id'] ?>" data-id="<?php echo $article[0]['id'] ?>"
                   class="btn btn-default btn-lg link-article">
                    <h2 class="list-group-item-heading"><?php echo $article_row['title'] ?></h2>

                    <p class="list-group-item-text"><?php echo $article_row['text'] ?></p>
                </a>
            <?php endforeach; ?>
        </div>
        <a href="#" id="link-popup-add" class="btn btn-default btn-lg add-popup" role="button">
            Add
        </a>
    </div>

    <div class="article"></div>
</div>

<script>
    jQuery('document').ready(function ($) {
        $('#cont').on('click', '.link-article', function (event) {
            event.preventDefault();

            var id = $(this).attr('data-id');
            $.ajax({
                'type': 'post',
                'url': '/article/index',
                'data': 'id=' + id,
                success: function (res) {
                    var data = JSON.parse(res);
                    $('.articles').addClass('hidden');
                    $('.article').html(data.html);
                }
            });
        });

        $('#cont').on('click', '.add-popup', function (event) {
            event.preventDefault();
            console.log('in add');

            $.ajax({
                'type': 'post',
                'url': '/article/add',
                success: function (res) {
                    var data = JSON.parse(res);
                    console.log(data);
                    $('#myModal .modal-body').html(data.html);
                    $('#myModal').modal();

                    $('.add-button').click(function (event) {
                        event.preventDefault();
                        console.log('in add button');

                        var title =$('#title').val();
                        var text =$('#text').val();
                        $('#myModal').modal('hide');

                        $.ajax({
                            'type': 'post',
                            'url': '/article/add',
                            'data': 'title=' + title + '&text=' + text + '&add=1',
                            'success': function (res) {
                                var data = JSON.parse(res);
                                console.log(data);
                                $('.articles').html(data.html);
                                $('.articles').removeClass('hidden');
                            }
                        });
                    });
                }
            });
        });

        $('#cont').on('click', '.edit-popup', function (event) {
            event.preventDefault();

            var id = $(this).attr('data-id');
            $.ajax({
                'type': 'post',
                'url': '/article/update',
                'data': 'id=' + id,
                'success': function (res) {
                    var data = JSON.parse(res);

                    $('#myModal .modal-body').html(data.html);
                    initEditor();
                    $('#myModal').modal();
                }
            });
        });



            /*

             */


    });

</script>
