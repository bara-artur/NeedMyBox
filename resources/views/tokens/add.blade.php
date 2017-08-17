<form name="addtoken" action="/token/add" method="post">
	{{ csrf_field() }}
	<input type="text" name="appid" required>
	<input type="text" name="devid" required>
	<input type="text" name="certid" required>
	<input type="text" name="runame" required>
	<input type="submit" value="Add">
</form>