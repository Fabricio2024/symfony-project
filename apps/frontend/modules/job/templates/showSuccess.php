<?php use_stylesheet('job.css') ?>
<?php use_helper('Text') ?>

<?php if ($sf_request->getParameter('token') == $job->getToken()) : ?>
  <?php include_partial('job/admin', array('job' => $job)) ?>
<?php endif ?>


<?php slot('title') ?>
<?php echo sprintf('%s is looking for a %s', $job->getCompany(), $job->getPosition()) ?>
<?php end_slot() ?>


<div id="jobeet_job">
  <h1 class="display-4"><?php echo $job->getCompany() ?></h1>
  <h2 class="lead"><?php echo $job->getLocation() ?></h2>
  <h3>
    <?php echo $job->getPosition() ?>
    <small class="text-muted"> - <?php echo $job->getType() ?></small>
  </h3>
  <?php if ($job->getLogo()) : ?>
    <div class="logo my-4">
      <a href="<?php echo $job->getUrl() ?>">
        <img src="/uploads/jobs/<?php echo $job->getLogo() ?>" alt="<?php echo $job->getCompany() ?> logo" class="img-fluid rounded" />
      </a>
    </div>
  <?php endif ?>

  <div class="description my-4">
    <?php echo simple_format_text($job->getDescription()) ?>
  </div>
  <h4 class="mt-4">How to apply?</h4>
  <p class="how_to_apply"><?php echo $job->getHowToApply() ?></p>
  <div class="meta mt-4">
    <small class="text-muted">posted on <?php echo $job->getDateTimeObject('created_at')->format('m/d/Y') ?></small>
  </div>
  <div style="padding: 20px 0" class="my-4">
    <a href="<?php echo url_for('job_edit', $job) ?>" class="btn btn-primary">
      Edit
    </a>
  </div>
</div>