<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <title>Lista subskrybentów</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style media="screen">
    .table {
      margin: auto;
      width: 50% !important;
      }
    </style>
  </head>

  <body>
    <div class="container">
        <h1 class="text-center mt-3">Lista subskrybentów</h1>
        <br>
        <a class="nav-link text-center" href="<?php echo URLROOT; ?>/admin/logout">Logout</a>
          <table class="table col-6 table-striped">
            <tr>
              <th>id</th>
              <th>Company</th>
            </tr>
            <?php
            foreach ($data['email'] as $email) : ?>
              <tr>
                <td><?php echo $email->id; ?></td>
                <td><?php echo $email->email; ?></td>
              </tr>
            <?php endforeach; ?>
          </table>
        <br />
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
