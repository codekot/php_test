<!-- <? php
class User {
	public $id;
	public $username;
	private $password;

	public function __construct($id, $username)
	{
		this->id = $id;
		this->username = $username;
	}

	public function setPassword($password)
	{
		this->password = $password;
	}
} ?>
 -->

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Login page</title>
</head>
<body>
 <div class="container">
  <form>
  	<h1>Login</h1>
  	<div class="row g-3 align-items-center">
    	<div class="col-auto">
    		<label for="username" class="col-form-label">Username</label>
  		</div>
  		<div class="col-auto">
    		<input type="username" id="username" class="form-control">
  		</div>
  		
	</div>
    <div class="row g-3 align-items-center">
    	<div class="col-auto">
    		<label for="inputPassword6" class="col-form-label">Password</label>
  		</div>
  		<div class="col-auto">
    		<input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
  		</div>
  		
	</div>
  </form>
 </div>



    
</body>
</html>
