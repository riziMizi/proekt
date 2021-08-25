<?php include '../view/header.php';  ?>

<form method="post">
<input type="hidden" name="action" value="login" />

<label>Username:</label><input type="input" name="username" required />
<label>Password:</label><input type="password" name="password" required />
<input type="submit" value="Log In" />

</form>