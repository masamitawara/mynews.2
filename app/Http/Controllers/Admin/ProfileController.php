<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// 以下を追記することでNews Modelが扱えるようになる
use App\Profiles;

class ProfileController extends Controller
{
     public function add()
  {
      return view('admin.profile.create');
  }
  public function create(Request $request)
      {
      // 以下を追記
          // Varidationを行う
          $this->validate($request, Profiles::$rules);
    
          $profile = new profile;
          $form = $request->all();
    
          // フォームから画像が送信されてきたら、保存して、$profiles->image_path に画像のパスを保存する
          if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $profile->image_path = basename($path);
          } else {
              $profile->image_path = null;
          }
    
          // フォームから送信されてきた_tokenを削除する
          unset($form['_token']);
          // フォームから送信されてきたimageを削除する
          unset($form['image']);
    
          // データベースに保存する
          $profiles->fill($form);
          $profiles->save();
          
           //admin/profile/createにリダイレクトする
    return redirect('admin/profile/create');
    }
}

?>
