<?php

Auth::routes();

Route::post('/angular-data-store', 'AngularController@angularDataStore');


Route::group(['middleware'=>'auth'],function()
       {
       
        Route::get('/', function ()
         {
          return view('forntpage');
          });

        Route::get('/notebooks','NoteBooks2Controller@index')->name('home');
        Route::post('/notebooks','NoteBooks2Controller@store');
        Route::get('/notebooks/create','NoteBooks2Controller@create')->name('newnote');

        Route::get('/notebooks/{notebook}','NoteBooks2Controller@show')->name('notebooks.show');

        Route::get('/notebooks/{notebook}/edit','NoteBooks2Controller@edit')->name('notebooks.edit');
        Route::put('/notebooks/{notebook}','NoteBooks2Controller@update');
        Route::delete('/notebooks/{notebook}','NoteBooks2Controller@destroy');

        Route::resource('notes','NotesController');
        Route::get('notes/{notebookId}/createNote','NotesController@createNote')->name('notes.createNote');


       });





