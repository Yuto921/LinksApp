<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;
use App\Http\Requests\LinkRequest;

class LinkController extends Controller
{
    //LinkRequestをタイプヒント(型宣言)で指定する事でバリデーションの検証を行う(検証は、LinkRequestファイルで行う) 純粋には、Requestファイル
    public function submit(LinkRequest $request)
    {
        // Linkモデルのインスタンス化
        $link = new \App\Link();
        $link->title = $request->title;
        $link->url = $request->url;
        $link->description = $request->description;
        // Linkモデルのextends元のModelにあるデータベースに保存するメソッドを使ってる
        $link->save();
        return redirect('/');
    }
}
