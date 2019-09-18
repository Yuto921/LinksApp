<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    // Laravelではリクエストで送られてきた値を同時に保存するmass-assignedを防ぐために、
    // DBに保存する値をfillableプロパティで制限する事ができる

    // まあ、この値で保存してくださいよ、というイメージ
    protected $fillable = [
        'title',
        'url',
        'description'
    ];

    //これで投稿フォームから送られたリンクデータがDBに保存されるようになります
}
