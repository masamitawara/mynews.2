<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;
use App\News;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $cond_name = $request->cond_name;
        
        // $cond_title が空白でない場合は、記事を検索して取得する
        if ($cond_name != '') {
            $posts = News::where('name', $cond_name).orderBy('updated_at', 'desc')->get();
        } else {
            $posts = News::all()->sortByDesc('updated_at');
        }

        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }
        
        // news/index.blade.php ファイルを渡している
        // また View テンプレートに headline、 posts、 cond_title という変数を渡している
        return view('news.index', 
        ['headline' => $headline, 'posts' => $posts,'cond_name' => $cond_name]);
    }
}
