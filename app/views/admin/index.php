<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body bg-light mt-5">
        <?php flash('register_success'); ?>
        <h2>Panel admina</h2>
        <p>Panel administracyjny newslettera</p>
        <form action="<?php echo URLROOT; ?>/admin/login" method="post">
              <div class="form-group">
              <label for="email">Login: <sup>*</sup></label>
              <input type="text" name="login" class="form-control form-control-lg <?php echo (!empty($data['login_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo (!empty($data['login'])) ? $data['login'] : ''; ?>" >
              <span class="invalid-feedback"><?php echo $data['login_err']; ?></span>
              </div>
              <div class="form-group">
              <label for="password">Hasło: <sup>*</sup></label>
              <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo (!empty($data['password'])) ? $data['password'] : ''; ?>">
              <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
              </div>
              <div class="row">
              <div class="col">
              <input type="submit" value="Login" class="btn btn-success btn-block">
              </div>
              </div>
        </form>
      </div>
    </div>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
