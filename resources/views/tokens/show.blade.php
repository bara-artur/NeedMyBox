@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">Dashboard</div>
					<div class="panel-body">
					</div>
				<div>
					<form name="addtoken" action="/token/add" method="post">
						{{ csrf_field() }}
						<input type="text" name="appid" required>
						<input type="text" name="devid" required>
						<input type="text" name="certid" required>
						<input type="text" name="runame" required>
						<input type="submit" value="Add">
					</form>
				</div>
					<div>
						<table id="datatable" class="table table-hover table-bordered">
							<thead>
							<tr>
								<th>login</th>
								<th>password</th>
								<th></th>
								<th></th>
							</tr>
							</thead>
							<tbody>
							@foreach($tokens as $token)
								<tr>
									<td>{{ $token->appid }}</td>
									<td>{{ $token->devid }}</td>
									<td>{{ $token->certid }}</td>
									<td>{{ $token->runame }}</td>
									<td><a href="/token/edit/{{$token->id}}">Edit</a></td>
									<td><a href="/token/delete/{{$token->id}}">Delete</a></td>
								</tr>
							@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
