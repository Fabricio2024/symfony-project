<h1>List of Users</h1>

<table>
  <thead>
    <tr>
      <th>Username</th>
      <th>Email</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($users as $user) : ?>
      <tr>
        <td><?php echo $user->getUsername() ?></td>
        <td><?php echo $user->getEmail() ?></td>
        <td><?php echo link_to('Edit', 'users_edit', array('id' => $user->getId())) ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>