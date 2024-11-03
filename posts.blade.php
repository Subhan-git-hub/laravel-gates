<x-layout>
  <div class="card my-3">
    <div class="card-header">
      <h2 class="text-center">Posts of user {{(Auth::user()->name)}}</h2>
    </div>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>

    </tr>
  </thead>
  <tbody>
    @foreach($posts as $post)
    <tr>      
      <th scope="row">{{ $post->id }}</th>
      <td>{{ $post->title }}</td>
      <td>{{ $post->description }}</td>
      <!-- we are sending post id from the url with the update.post route so we can update our posts -->
      <td> <a href="{{ route( 'update.post',$post->id) }}" class="btn btn-primary">Update</a> </td>

      <td> <a href="" class="btn btn-danger">Delete</a> </td>
     
    </tr>
     @endforeach
 
  </tbody>
 
</table>

  </div>
 <a href="{{ route('index') }}" class="btn btn-danger">Back</a>

</x-layout>