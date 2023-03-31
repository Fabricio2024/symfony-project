<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?php if (!include_slot('title')) : ?>
      Jobeet - Your best job board
    <?php endif ?>
  </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="shortcut icon" href="/favicon.ico" />
  <?php include_stylesheets() ?>
  <?php use_javascript('jquery-3.6.4.min.js') ?>
  <?php use_javascript('search.js') ?>
  <?php include_javascripts() ?>
</head>

<body>
  <div id="container">
    <div id="header">
      <div class="content">
        <h1><a class="hiper" href="<?php echo url_for('@homepage') ?>">
            <img src="/legacy/images/logo.jpg" alt="Jobeet Job Board" />
          </a></h1>
        <div id="sub_header">
          <div class="post">
            <h2>Ask for people</h2>
            <div>
              <a href="<?php echo url_for('@job_new') ?>">Post a Job</a>
            </div>
          </div>

          <div class="search">
            <h2>Ask for a job</h2>
            <form action="<?php echo url_for('job_search') ?>" method="get">
              <input type="text" name="query" value="<?php echo $sf_request->getParameter('query') ?>" id="search_keywords" placeholder="search a job or country" />
              <img id="loader" src="/legacy/images/loader.gif" style="vertical-align: middle; display: none" />
              <div class="help">
                Enter some keywords (city, country, position, ...)
              </div>
            </form>
          </div>
        </div>
      </div>
      <div id="job_history">
        Recent viewed jobs:
        <ul>
          <?php foreach ($sf_user->getJobHistory() as $job) : ?>
            <li>
              <?php echo link_to($job->getPosition() . ' - ' . $job->getCompany(), 'job_show_user', $job) ?>
            </li>
          <?php endforeach ?>
        </ul>
      </div>
      <div id="content">
        <?php if ($sf_user->hasFlash('notice')) : ?>
          <div class="flash_notice"><?php echo $sf_user->getFlash('notice') ?></div>
        <?php endif ?>

        <?php if ($sf_user->hasFlash('error')) : ?>
          <div class="flash_error"><?php echo $sf_user->getFlash('error') ?></div>
        <?php endif ?>

        <div class="content">
          <?php echo $sf_content ?>
        </div>
      </div>

      <div id="footer">
        <div class="content">
          <span class="symfony">
            <img src="/legacy/images/jobeet-mini.png" />
            powered by <a href="/">
              <img src="/legacy/images/symfony.gif" alt="symfony framework" />
            </a>
          </span>
          <ul>
            <li><a href="">About Jobeet</a></li>
            <li class="feed"><a href="">Full feed</a></li>
            <li><a href="">Jobeet API</a></li>
            <li class="last"><a href="">Affiliates</a></li>
          </ul>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>


</html>