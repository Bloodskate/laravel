<nav>
	<ul>
		<li><a href="{{URL::route('home')}}">Home</a></li>
		@if(Auth::check())
			<li><a href="{{URL::route('account-sign-out')}}">Sign Out</a></li>
			<li><a href="{{URL::route('profile-user',Auth::user()->username)}}">Profile</a></li>
			<li><a href="{{URL::route('groups')}}">Groups</a></li>
			
		@else
			
			<li><a href="{{URL::route('account-create')}}">Create account</a></li>
		@endif
	</ul>
</nav>