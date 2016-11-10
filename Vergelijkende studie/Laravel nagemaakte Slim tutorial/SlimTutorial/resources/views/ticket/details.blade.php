<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body>

	<div class="col-md-6 col-md-offset-3">

		<div class="panel panel-default">
				<div class="panel-heading">
					<h2>{{ $id->title }}</h2>
				</div>

				<div class="panel-body">
					<div class="form-group">
						<label>Description</label>
						{{ $id->description }}
					</div>
					<div class="form-group">
						<label>Component</label>
						{{ $id->Component->component }}
					</div>
					<a href="{{ url('/') }}" class="btn btn-primary">Back</a>
				</div>

			</div>

	</div>

</body>
</html>