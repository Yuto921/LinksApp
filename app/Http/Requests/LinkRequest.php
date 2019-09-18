<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * 新規リンク登録のバリデーションを行うクラス
 */
class LinkRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

     /**
     * 認証関係の判定を行う場合はここに処理を記述する。
     * 特にない場合は常にtrueを返しておく。
     */ 
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    /**
     * バリデーションルールを記述
     */
    public function rules()
    {
        // Requestファイル　だから、ここに記述したルールでバリデーションしてくれる
        // web.php ルートで書いたバリデーションを記述
        // name="title" の値を紐づいている
        return [
            'title' => 'required | max:255', // 必須　｜　255文字より少なくする
            'url' => 'required | max:255',
            'description' => 'required | max:255'
        ];
    }
}
