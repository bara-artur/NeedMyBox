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
						<form name="add_account" action="/account/add" method="post">
							{{ csrf_field() }}
							<input type="text" name="login" required>
							<input type="text" name="password" required>
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
							@foreach($accounts as $account)
								<tr>
									<td>{{ $account->login }}</td>
									<td>{{ $account->password }}</td>
									<td><a href="/account/edit/{{$account->id}}">Edit</a></td>
									<td><a href="/account/delete/{{$account->id}}">Delete</a></td>
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
