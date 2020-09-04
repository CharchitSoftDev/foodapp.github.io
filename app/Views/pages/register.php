
<div id="legend">
      <legend class="">Register</legend>
</div>
<?php if ($_GET['form'] == 'c') {?>
<form class="form-horizontal" action='/registration/save?form=customer' method="POST">
<?php } else{ ?>
  <form class="form-horizontal" action='/registration/save?form=restaurant' method="POST">
  <?php } ?>
  <fieldset style="margin-left:100px;">
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="username">Username</label>
      <div class="controls">
        <input type="text" id="username" name="username" placeholder="" class="input-xlarge">
        <p class="help-block">Username can contain any letters or numbers, without spaces</p>
      </div>
    </div>

    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="email">E-mail</label>
      <div class="controls">
        <input type="text" id="email" name="email" placeholder="" class="input-xlarge">
        <p class="help-block">Please provide your E-mail</p>
      </div>
    </div>

    <div class="control-group">
      <!-- Password-->
      <label class="control-label" for="password">Password</label>
      <div class="controls">
        <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
        <p class="help-block">Password should be at least 4 characters</p>
      </div>
    </div>

    <div class="control-group">
      <!-- Password -->
      <label class="control-label"  for="password_confirm">Password (Confirm)</label>
      <div class="controls">
        <input type="password" id="password_confirm" name="password_confirm" placeholder="" class="input-xlarge">
        <p class="help-block">Please confirm password</p>
      </div>
    </div>
    <?php if ($_GET['form'] == 'c') {?>
    <div class="control-group">
    <div class="controls">
    <div class="form-check">
    <input type="radio" class="form-check-input" name="group" id="is_veg" value="1">
    <label class="form-check-label" for="is_veg">Veg</label>
    </div>
    </div>
    </div>
    <div class="form-check">
    <input type="radio" class="form-check-input" name="group" id="is_non-veg" value="0">
    <label class="form-check-label" for="is_non-veg">Non-Veg</label>
    </div>
    <?php } else {?>
      <div class="control-group" >
      <!-- Username -->
      <label class="control-label"  for="restaurant-name">Restaurant Name</label>
      <div class="controls">
        <input type="text" id="restaurant-name" name="restaurant-name" placeholder="" class="input-xlarge">
      </div>
    </div>
    <?php }?>
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button type="submit" class="btn btn-success">Register</button>
      </div>
    </div>
  </fieldset>
</form>
<div>
<?php if (isset($validation)): ?>
            <div class="col-12">
              <div class="alert alert-danger" role="alert">
                <?=$validation->listErrors()?>
              </div>
            </div>
          <?php endif;?>
</div>
