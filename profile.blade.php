<x-layout>
	<div class="card mt-2">
		<div class="card-header">
		<h2 class="text-center">User Data</h2>	
		</div>
		
		<div class="card-body">
<table class="table my-3">
    <tr>
      <th>Id</th> 
		<th scope="row">{{ $user->id }}</th>
     </tr>

     <tr>
     	<th>Name</th>
        <td>{{ $user->name }}</td>
     </tr>
      
      <tr>
      	<th>Email</th>
       <td>{{ $user->email }}</td>
      </tr>
     
    <tr>
     <th>Age</th>
     <td>{{ $user->age }}</td>
    </tr>
</table>
<a href="{{ route('index') }}" class="btn btn-danger">Back</a>
		</div>


	</div>
	

</x-layout>