
<!DOCTYPE html>
<html>
<head>
	<title>Request Data Retrieval Demo</title>
</head>
<body>
	<h2>User Information Form</h2>
	<form method="post" action="/process">
		@csrf
		<label for="name">Name: </label>
		<input type="test" name="name" id="name"> <br><br>
		
		<label for="email">Email: </label>
		<input type="email" name="email" id="email"><br><br>
		
		<input type="submit" value="Submit">
	</form>
</body>
</html>
