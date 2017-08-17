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
						<form name="edit_account" action="/account/{{$account->id}}/save" method="post">
							{{ csrf_field() }}
							<input type="text" value="{{$account->login}}" name="login" required>
							<input type="text" value="{{$account->password}}" name="password" required>
							<input type="submit" value="Save">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
