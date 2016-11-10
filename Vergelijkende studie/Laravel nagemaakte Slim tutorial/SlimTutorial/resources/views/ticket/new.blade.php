<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body>

	<div class="col-md-6 col-md-offset-3">

		<form method="POST" action="{{ url('ticket/add') }}">
			{{ csrf_field() }}
			
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>New ticket</h2>
				</div>

				<div class="panel-body">
					<div class="form-group">
						<label>Title</label>
						<input type="text" name="title" class="form-control">
					</div>
					<div class="form-group">
						<label>Description</label>
						<textarea name="description" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<label>Title</label>
						<select name="component_id" class="form-control">
							@foreach($components as $component)

								<option value="{{ $component->id }}">{{ $component->component }}</option>

							@endforeach
						</select>
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-primary">Send</button>
					</div>
				</div>

			</div>

		</form>

	</div>

</body>
</html>