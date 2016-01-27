<form class="form-horizontal" action='/user/register' method="POST" enctype="multipart/form-data">
  <fieldset>
    <div id="legend">
      <legend class="">Register</legend>
    </div>
    <div class="control-group">

      <label class="control-label"  for="name">Username</label>
      <div class="controls">
        <input type="text" id="name" name="name" placeholder="" class="input-xlarge">
        <p class="help-block">Username can contain any letters or numbers, without spaces</p>
      </div>
    </div>

    <div class="control-group">

      <label class="control-label"  for="age">Age</label>
      <div class="controls">
        <input type="text" id="age" name="age" placeholder="" class="input-xlarge">
        <p class="help-block">Please enter your age</p>
      </div>
    </div>

    <div class="control-group">

      <label class="control-label" for="email">E-mail</label>
      <div class="controls">
        <input type="text" id="email" name="email" placeholder="" class="input-xlarge">
        <p class="help-block">Please provide your E-mail</p>
      </div>
    </div>

    <div class="control-group">

      <label class="control-label" for="pass">Password</label>
      <div class="controls">
        <input type="pass" id="pass" name="pass" placeholder="" class="input-xlarge">
        <p class="help-block">Password should be at least 4 characters</p>
      </div>
    </div>

    <div class="control-group">

      <label class="control-label"  for="password_confirm">Password (Confirm)</label>
      <div class="controls">
        <input type="password" id="password_confirm" name="password_confirm" placeholder="" class="input-xlarge">
        <p class="help-block">Please confirm password</p>
      </div>
    </div>

    <div class="control-group">
      <label class="control-label"  for="country">Country</label>
        <div class="controls">
          <select name="country" id="country">
              <option selected>Chose the country</option>
            <?php foreach($countryList as $k => $v) :?>
              <option value="<?php echo $k;?>"><?php echo $v['country_code'];?> - <?php echo $v['country_name'];?></option>>
            <?php endforeach;?>
          </select>
            <p class="help-block">Please chose the country</p>
        </div>
    </div>

    <div class="control-group">

        <label class="control-label"  for="avatar">Avatar</label>
        <div class="controls">
            <input type="file" id="avatar" name="avatar" value="">
            <p class="help-block">Please upload the picture for your avatar</p>
        </div>
    </div>
    <div class="control-group">
        <input type="hidden" name = "register" value="true">
      <input type="hidden" name = "role" value="1">
      <input type="submit" class="btn btn-success" value="Register">
    </div>
  </fieldset>
</form>