<nav>
	<ul>
		<li><a href="{{URL::route('home')}}"><font color = 'yellow'>Home</font></a></li>
		@if(Auth::check())
		
			<li><a href="{{URL::route('account-sign-out')}}"><font color = 'yellow'>Sign Out</font></a></li>
			<li><a href="{{URL::route('profile-user',Auth::user()->username)}}"><font color = 'yellow'>Profile</font></a></li>
			<li><a href="{{URL::route('profile-users')}}"><font color = 'yellow'>All users</font></a></li>
			{{--  <li><a href="{{URL::route('allgroups')}}"><font color = 'yellow'>Groups</font></a></li> --}}

			
		@else
			
			<li><a href="{{URL::route('account-create')}}"><font color = 'yellow'>Create Account</font></a></li>
		@endif
	</ul>
</nav>