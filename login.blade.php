<x-layout>
	<h2 class="text-center my-1 mb-2">Login</h2>
<form action="{{ route('loginSave') }}" method="POST">
		@csrf
		@method('POST')
	
	  <div class="mb-3">
	    <label for="email" class="form-label">Email</label>
	    <input type="email" class="form-control" id="email" name="email">
	  </div>
	  <div class="mb-3">
	    <label for="password" class="form-label">Password</label>
	    <input type="password" class="form-control" id="password" name="password">
	  </div>
	  <button type="submit" class="btn btn-primary">Login</button>

	</form> 
</x-layout>