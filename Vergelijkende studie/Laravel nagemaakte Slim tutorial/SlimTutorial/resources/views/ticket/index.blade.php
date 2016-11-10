<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

	<div class="col-md-6 col-md-offset-3">

		<h1>Tickets</h1>

		<a href="{{ url('ticket/new') }}">New ticket</a>

		<table class="table">
			<thead>
				<tr>
					<th>Title</th>
					<th>Component</th>
					<th>Description</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach($tickets as $ticket)

					<tr>
						<td>{{ $ticket->title }}</td>
						<td>{{ $ticket->Component->component }}</td>
						<td>{{ $ticket->description }}</td>
						<td>
							<a href="{{ url('/ticket/details', $ticket->id) }}" class="btn btn-primary">View</a>
							<a href="{{ url('/ticket/edit', $ticket->id) }}" class="btn btn-primary">Edit</a>
							<form method="post" action="{{ url('/ticket/delete', $ticket->id) }}">
								{{ csrf_field() }}
								<button type="submit" class="btn btn-danger">Delete</button>
							</form>
						</td>
					</tr>

				@endforeach
			</tbody>
		</table>

	</div>

</body>
</html>