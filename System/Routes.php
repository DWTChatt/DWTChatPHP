<?php

Route::get('/', 'Chat@index');

Route::get('/home/get', 'Home@get');

Route::get('/ajax/post/message', 'Chat@sendMessage');

Route::get('/auth/facebook', 'Chat@facebook');

Route::get('/auth/facebook/step', 'Chat@logged');

Route::get('/ajax/get/messages', 'Chat@getMessages');