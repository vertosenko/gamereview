<div class="col-md-6 col-sm-offset-3">
<form enctype="multipart/form-data" action="/user/login" method="post" class="form-horizontal" role="form">
    <h2 class="form-signin-heading">Please sign in</h2>
    <label for="email" class="sr-only">Email address</label>
    <input type="email" name="email" class="form-control" placeholder="Email address" required autofocus>
    <label for="pass" class="sr-only">Password</label>
    <input type="password" name="pass" class="form-control" placeholder="Password" required>
    <input type="hidden" name="login" value="true">
    <div class="checkbox">
        <label>
            <input type="checkbox" value="remember-me"> Remember me
        </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
</form>
</div>

