<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container">
    <div id="nowy" class="jumbotron text-center mt-4">
      <h1 class="display-3">Newsletter</h1>
      <p class="lead">Podaj swój adres <b>e-mail</b> aby zapisać się do Newslettera</p>

          <form class="form-group col-sm-6 container" action="<?php echo URLROOT; ?>/newsletter/save" method="post">
            <input class="form-control text-align mb-4 <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" type="text" value="<?php echo (!empty($data['email'])) ? $data['email'] : ''; ?>" name="email" placeholder="Enter e-mail">
            <span class="invalid-feedback mb-2"><?php echo $data['email_err']; ?></span>
            <?php flash('register_success'); ?>
            <input class="btn btn-primary btn-lg" type="submit" value="Zapisz się!"</input>
          </form>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
