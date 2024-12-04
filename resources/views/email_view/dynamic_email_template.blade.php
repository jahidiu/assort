<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<div class="card text-white bg-success mb-3">
  		<div class="card-body">
    			<h5 class="card-title">Name : {{ $data['name']}}</h5>
    			<h5 class="card-title">Email : {{ $data['email']}}</h5>
    			<h5 class="card-title">Phone : {{ $data['phone']}}</h5>
    			<h5 class="card-title">Subject : {{ $data['subject']}}</h5>
    			<p class="card-text"> Message : {{ $data['message']}}</p>
  		</div>
	</div>
</body>
</html>