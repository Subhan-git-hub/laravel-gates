<x-layout>
<h2>Welcome {{Auth::user()->name }}</h2>

@if(Gate::allows('Admin'))
<!-- used Admin gate function -->
<!-- if the user is admin and approved by the gate function in AppServiceProvider file then return the admin link else if its user then shoe the other link -->

<a href="" class="btn btn-primary">Admin link</a>
@else
<a href="" class="btn btn-primary">User link</a>
@endif

<div class="my-2 mx-1">
<a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
<a href="{{ route('posts',Auth::user()->id) }}" class="btn btn-primary">Post</a>

<a href="{{ route('profile',Auth::user()->id) }}" class="btn btn-success">Profile</a>
<!-- Auth::user()->id is the user id which is logged in -->
<!-- we have sent id to provide user its profile link according to thier id's -->
</div>

</x-layout>