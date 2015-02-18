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

	//redirect to group all

	Route::get('/groups/', array(
		'as' => 'groups',
		'uses' => 'GroupController@groups'
	));
	//redirect to group selection

	Route::get('/group/{ongroup}', array(
		'as' => 'group',
		'uses' => 'GroupController@group'
	));
	//Apple Group
	Route::get('/group/apple', array(
		'as' => 'group-apple',
		'uses' => 'GroupController@Apple'
	));

	//Ball Group
	Route::get('/group/ball', array(
		'as' => 'group-ball',
		'uses' => 'GroupController@Ball'
	));

	//Status (GET)
	Route::get('status/update', array(
		'as' => 'status-update',
		'uses' => 'StatusController@getStatus'
	));

	//Status (Post)
	Route::post('status/update/{presentgroup}', array(
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
