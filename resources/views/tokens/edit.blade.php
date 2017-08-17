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
						<form name="edit_token" action="/token/edit/save/{{$token->id}}" method="post">
							{{ csrf_field() }}
							<input type="text" value="{{$token->appid}}" name="appid" required>
							<input type="text" value="{{$token->devid}}" name="devid" required>
							<input type="text" value="{{$token->certid}}" name="certid" required>
							<input type="text" value="{{$token->runame}}" name="runame" required>
							<input type="submit" value="Save">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
