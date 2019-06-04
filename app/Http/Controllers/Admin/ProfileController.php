<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile_History;
use Carbon\Carbon;

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
        
    //indexアクションの追加
    public function index(Request $request)
    { 
                $cond_name=$request->cond_name;
                if ($cond_name !=''){
                    
                //検索されたら検索結果を取得する。
                $posts =Profiles::where('name', $cond_name)->get();
                } else {
                    
                //それ以外はすべてのニュースを取得する
                $posts = Profiles::all();
                }
                return view('admin.profile.index', ['posts' => $posts,'cond_name' => $cond_name]);
                }
    
    public function edit(Request $request)
    {
                //Profiles Modelからデータを取得する
                $profile = Profiles::find($request->id);
                if (empty($profile)) {
                return view('errors.404'); 
                }
                return view('admin.profile.edit' , ['profile_form' => $profile]);
                }
        
    public function update(Request $request)
    {
               //Validationをかける
               $this->Validate($request, Profiles::$rules);
               
               //Profiles Modelからデータを取得する
               $profile = Profiles::find($request->id);
               
               //送信されてきたフォームデータを格納する
               $profile_form=$request->all();
               unset($profile_form['_token']);
               
               //該当するデータを上書きして保存する
               $profile->fill($profile_form)->save();
               
           
                $history = new Profile_History;
                $history->profile_id = $profile->id;
                $history->edited_at = Carbon::now();
                $history->save();
        
                return redirect('admin/profile/');
    }
           
    public function delete(Request $request)
    {
                // 該当するProfiles Modelを取得
                $profile = Profiles::find($request->id);
                
                // 削除する
                $profile->delete();
                
                return redirect('admin/profile/');
    }
           
}
           