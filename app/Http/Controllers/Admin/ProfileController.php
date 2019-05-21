<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// 以下を追記することでProfiles Modelが扱えるようになる
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
    
          $profile = new Profiles;
          $form = $request->all();
    
          
    
          // フォームから送信されてきた_tokenを削除する
          unset($form['_token']);
         
    
          // データベースに保存する
          $profile->fill($form);
          $profile->save();
          
           //admin/profile/createにリダイレクトする
    return redirect('admin/profile/create');
    }
}

?>
