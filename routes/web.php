<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

/*strona startowa*/
Route::get('/', 'HomeController@welcome');

/*strona główna*/
Route::get('/home', 'HomeController@index');

/*obserwowanie*/
Route::get('/following', 'FlatsController@showFollowing');
Route::post('follow/{flat}', 'FollowsController@store');

/*wiadomości*/
Route::get('/message/{message}', 'MessagesController@show')->name('message.show');
Route::get('/message/{message}/delete', 'MessagesController@delete')->name('message.delete');
Route::patch('/message/{message}/delete', 'MessagesController@deleteMessage')->name('message.deleteMessage');
Route::get('/messages/{user}', 'MessagesController@showAll')->name('message.showAll');
Route::get('/messages/{user}/sent', 'MessagesController@showAllSent')->name('message.showAllSent');
Route::get('/messages/{user}/deleted', 'MessagesController@showAllDeleted')->name('message.showAllDeleted');
Route::post('/messages/{user}', 'MessagesController@store')->name('message.store');
Route::get('/messages/{user}/create', 'MessagesController@create');
Route::get('/message/{message}/delete', 'MessagesController@delete');

/*profil użytkownika*/
Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');

/*mieszkania użytkownika*/
Route::post('/profile/{user}/flats', 'FlatsController@store')->name('flats.store');
Route::get('/profile/{user}/flats', 'FlatsController@showAll')->name('flats.showAll');
Route::get('/profile/{user}/flats/inactive', 'FlatsController@showAllInactive')->name('flats.showAllInactive');

/*edycja profilu*/
Route::get('/profile/{user}/editpassword', 'PasswordsController@index');
Route::post('/profile/{user}/', 'PasswordsController@update')->name('password.update');

/*ogloszenia*/
Route::get('/flat/create', 'FlatsController@create');
Route::post('/flat/create', 'PhotosController@upload')->name('photos.upload');
Route::get('/flat/{flat}', 'FlatsController@show')->name('flat.show');
Route::patch('/flat/{flat}', 'FlatsController@update')->name('flat.update');
Route::get('/flat/{flat}/edit', 'FlatsController@edit')->name('flat.edit');

/*wynajem mieszkania*/
Route::get('/rent/{flat}', 'RentsController@rent');
Route::patch('/rent/{user}', 'RentsController@addToHistory')->name('flat.addToHistory');

/*historia wynajmu*/
Route::get('acceptrent/{flat}', 'RentsController@acceptRent');
Route::patch('acceptrent/{flat}/accept', 'RentsController@addToHistory');
Route::get('/rentalhistory/{flat}', 'RentsController@showHistory');

/*wyszukiwanie ogloszen*/
Route::get('/search', 'SearchController@index')->name('search.index');
Route::post('/search/flats', 'SearchController@get');
Route::get('/search/flats', 'SearchController@show')->name('search.result');

/*ścieżki - administrator*/
/*zarejestrowani użytkowanicy*/
Route::get('/users', 'AdminController@showAllUsers');
Route::get('/users/blocked', 'AdminController@showAllBlockedUsers');
Route::get('/users/inactive', 'AdminController@showAllInactiveUsers');
/*ogloszenia użytkowników*/
Route::get('/flats', 'AdminController@showAllFlats');
Route::get('/flats/blocked', 'AdminController@showAllBlockedFlats');
Route::get('/flats/inactive', 'AdminController@showAllInactiveFlats');
/*opinie o użytkownikach*/
Route::get('/reviews', 'AdminController@showAllReviews');
Route::get('/reviews/blocked', 'AdminController@showAllBlockedReviews');

/*opinie*/
Route::post('/reviews/{user}', 'ReviewsController@store')->name('review.store');
Route::get('/reviews/{user}', 'ReviewsController@showAll')->name('review.showAll');
Route::get('/reviews/{user}/create', 'ReviewsController@create');

/*ścieżki - administrator*/
/*blokowanie użytkownika*/
Route::get('/profile/{user}/block', 'AdminController@blockUser');
Route::patch('/users/{user}/block', 'AdminController@blockedUser');
/*odblokowanie użytkownika*/
Route::get('/profile/{user}/unblock', 'AdminController@unblockUser');
Route::patch('/users/{user}/unblock', 'AdminController@unblockedUser');
/*blokowanie ogłoszenia*/
Route::get('/flats/{flat}/block', 'AdminController@blockFlat');
Route::patch('/flat/{flat}/block', 'AdminController@blockedFlat');
/*odblokowanie ogłoszenia*/
Route::get('/flats/{flat}/unblock', 'AdminController@unblockFlat');
Route::patch('/flat/{flat}/unblock', 'AdminController@unblockedFlat');
/*blokowanie opinii*/
Route::get('/review/{review}/block', 'AdminController@blockReview');
Route::patch('/reviews/{review}/block', 'AdminController@blockedReview');
/*odblokowanie opinii*/
Route::get('/review/{review}/unblock', 'AdminController@unblockReview');
Route::patch('/reviews/{review}/unblock', 'AdminController@unblockedReview');

Route::post('ajaxData','AjaxController@index')->name('ajax.index');