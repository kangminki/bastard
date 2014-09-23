
<?php

echo '
			<h2>
			Hi there
			</h2>
			<h4>
			You need to login before you can edit anything.
			</h4>
			<br>
			
			<form method="post" action="/login.php" id="login">
				<div class="form-group">
					<label for="exampleInputEmail1">Authcate</label>
					<input type="text" name="authcate" placeholder="stewie" class="form-control">
				</div>
				<div class="form-group">
					<input type="password" name="password" placeholder="********" class="form-control">
				</div>
				<div class="form-group">
					<input type="submit" value="Login" class="btn btn-default">
				</div>
				<div class="form-group">
					<span class="error">
					</span>
				</div>
			</form>';
?>