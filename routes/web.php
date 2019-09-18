<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// ①GETで/にアクセスした時に　
// ②Linksモデル(Eloquent)のallメソッドを使って、取得した全てのデータを$linksに代入する。
// ③view()を使って第一引数にテンプレートのキー名(welcome.blade.html)を指定して、第二引数で$linksのデータをlinksとして渡す。
Route::get('/', function () {
    $links = \App\Link::all(); // Linkモデルのメソッド(extends Modelモデル オーバーラップしているから使える)
    return view('welcome', [
        'links' => $links
    ]);
});

// ①GETで /submit にアクセスした時に　
// ②viewヘルパ関数を使って resources/views/ にある submit.blade.php を呼び出しています。
Route::get('/submit', function() {
    return view('submit');
})->name('Links.submit');


// ルーティングからフォームの検証とモデル操作を1つのファイルで一気に処理

// ①POSTで/submitにアクセスする。
// ②validateメソッドを使ってバリデーションを行う
// エラーが発生した場合、、セッションにエラーメッセージをフラッシュデータとして保存します。
// ③バリデーションの検証が通ったらLinkモデルを生成してフォームに投稿されたデータをDBに保存する。
// ④その後に/(root)にリダイレクトさせる。
// -> 投稿フォームのバリデーションの準備はできたので、次に送られてきた値をデータベースに保存する為、Linkモデルを調整

use Illuminate\Http\Request;

// POSTで/submitにアクセス
Route::post('/submit', function(Request $request) {
    // validateメソッドを使ってバリデーション
    $data = $request->validate([
        'title' => 'required | max:255',
        'url' => 'required | url | max:255',
        'description' => 'required | max:255'
    ]);

    // Linkモデルを作成
    $link = new App\Link($data);
    $link->save();

    // リダイレクトする
    return redirect('/');
});


// ルーティングで処理していた役割をそれぞれ、LinkControllerとLinkRequestで分離
// ①postで/submitにアクセスした際に、LinkControllerのsubmitアクションを呼び出す。
Route::post('/submit', 'LinkController@submit');