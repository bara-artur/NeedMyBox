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
						<form name="add_account" action="/add/user" method="post">
							{{ csrf_field() }}
							<input type="text" name="name" required>
							<input type="email" name="email" required>
							<select name="role">
								<option value="2" selected>user</option>
								<option value="1">admin</option>
							</select>
							<input type="password" name="password" required>
							<input type="submit" value="Add">
						</form>
					</div>
				<div>
					<table id="datatable" class="table table-hover table-bordered">
						<thead>
						<tr>
							<th>Name</th>
							<th>e-mail</th>
							<th>Role</th>
							<th></th>
							<th></th>
						</tr>
						</thead>
						<tbody>
						@foreach($users as $user)
							<tr>
								<td>{{ $user->name }}</td>
								<td>{{ $user->email }}</td>
								<td>{{$user->role}}</td>
								<td><a href="admin/accounts/{{$user->id}}">eBay accounts</a></td>
								<td><a href="delete/user/{{$user->id}}">Delete</a></td>
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
