<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jobeet Admin Interface</title>
  <link rel="shortcut icon" href="/favicon.ico" />
  <?php use_stylesheet('admin.css') ?>
  <?php include_stylesheets() ?>
  <?php include_javascripts() ?>
</head>

<body>
  <div id="container">
    <div id="header">
      <h1>
        <a href="<?php echo url_for('homepage') ?>">
          <img src="/legacy/images/logo.jpg" alt="Jobeet Job Board" />
        </a>
      </h1>
    </div>
    <?php if ($sf_user->isAuthenticated()) : 
    ?>
    <div id="menu">
      <ul>
        <li>
          <?php echo link_to('Jobs', 'jobeet_job') ?>
        </li>
        <li>
          <?php echo link_to('Categories', 'jobeet_category') ?>
        </li>
        <li>
          <?php echo link_to('Logout', 'auth') ?>
        </li>
        <li> <?php echo link_to('Users', 'users') ?></li>
      </ul>
    </div>
    <?php endif 
    ?>
    <div id="content">
      <?php echo $sf_content ?>
    </div>

    <div id="footer">
      <img src="/legacy/images/jobeet-mini.png" />
      powered by <a href="/">
        <img src="/legacy/images/symfony.gif" alt="symfony framework" /></a>
    </div>
  </div>
</body>

</html>