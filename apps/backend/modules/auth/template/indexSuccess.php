<h1>Login</h1>

<?php if ($sf_user->hasFlash('error')): ?>
  <div class="error"><?php echo $sf_user->getFlash('error') ?></div>
<?php endif ?>

<form action="<?php echo url_for('@auth') ?>" method="post">
  <label for="username">Username:</label>
  <input type="text" name="username" id="username" />

  <label for="password">Password:</label>
  <input type="password" name="password" id="password" />

  <input type="submit" value="Login" />
</form>
