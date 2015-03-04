<?php


Route::get('/',array(
	'as' => 'home',
	'uses' => 'HomeController@home'
));

Route::get('/user/{username}',array(
	'as' => 'profile-user',
	'uses' => 'ProfileController@user'
));

//Authenticated group
Route::group(array('before' => 'auth'),function(){

	//Reply(get)
	Route::get('/user/reply/{postid}', array (
		'as' => 'reply',
		'uses' => 'StatusController@getReply'
	));
	
	//Reply(post)
	Route::post('/user/{postid}', array (
		'as' => 'reply-post',
		'uses' => 'StatusController@postReply'
	));

	//Group
	Route::get('group/{ongroup}', array(
		'as' => 'group',
		'uses' => 'GroupController@group'
	));

	//All groups
	Route::get('/group/',array(
		'as' => 'allgroups',
		'uses' => 'GroupController@allgroups'
	));


	//All users
	Route::get('profile/users', array(
		'as' => 'profile-users',
		'uses' => 'ProfileController@allusers'
	));

	//Delete post
	Route::get('status/delete/{post_id}', array(
		'as' => 'status-delete',
		'uses' => 'StatusController@getDelete'
	));

	//Change password(GET)
	Route::get('/account/change-password', array(
		'as' => 'account-change-password',
		'uses' => 'AccountController@getChangePassword'
	));

		//CSRF protection
	
	Route::group(array('before'=>'csrf'), function(){

		//Change passsword (post)
		
		Route::post('/account/change-password', array(
			'as' => 'account-change-password-post',
			'uses' => 'AccountController@postChangePassword'
		));
	});

	//Signout (get)
	Route::get('/account/sign-out', array(
		'as' => 'account-sign-out',
		'uses' => 'AccountController@getSignOut'
	));



	//Status (Post)
	Route::post('status/update', array(
		'as' => 'status-update-post',
		'uses' => 'StatusController@postStatus'
	));

});


//Unauthenticatd group

Route::group(array('before' => 'guest'), function(){

	//CSRF protection
	
	Route::group(array('before'=>'csrf'), function(){

		//Create Account (post)
		
		Route::post('/account/create', array(
			'as' => 'account-create-post',
			'uses' => 'AccountController@postCreate'
		));

		//Sign in (post)

		Route::post('/account/sign-in', array(
			'as' => 'account-sign-in-post',
			'uses' => 'AccountController@postSignIn'
		));
	});

	//Sign in (get)
	
	Route::get('/account/sign-in', array(
		'as' => 'account-sign-in',
		'uses' => 'AccountController@getSignIn'
	));

	//Create Account (get)
	
	Route::get('/account/create', array(
		'as' => 'account-create',
		'uses' => 'AccountController@getCreate'
	));
	
	Route::get('/account/activate/{code}', array(
		'as' => 'account-activate',
		'uses' => 'AccountController@getActivate'
	));
});
