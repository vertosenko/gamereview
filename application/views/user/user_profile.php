    <div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <img src="<?php echo GALLERY_FOLDER.$user['avatar']?>" alt="" class="img-rounded img-responsive" />
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <h4>
                            <?php echo $user['name']?></h4>
                        <small><cite title="<?php echo $user['country_name']?>"><?php echo $user['country_name']?> <i class="glyphicon glyphicon-map-marker">
                                </i></cite></small>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i><?php echo $user['email']?>
                            <br />

                            <i class="glyphicon glyphicon-gift"></i>Age : <?php echo $user['age']?></p>
                        <!-- Split button -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary">
                                Edit</button>
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span><span class="sr-only">Edit</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="user/update">Update</a></li>
                                <li><a href="user/delete">Delete</a></li>
                            </ul>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>