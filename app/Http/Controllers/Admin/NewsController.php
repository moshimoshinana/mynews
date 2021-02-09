<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;

class NewsController extends Controller
{
  public function add()
  {
      return view('admin.news.create');
  }

  public function create(Request $request)
  {
      // Varidationを行う
      $this->validate($request, News::$rules);
      $news = new News;
      $form = $request->all();

      // formに画像があれば、保存する
      if (isset($form['image'])) {
        $path = $request->file('image')->store('public/image');
        $news->image_path = basename($path);
      } else {
          $news->image_path = null;
      }

      unset($form['_token']);
      unset($form['image']);
      // データベースに保存する
      $news->fill($form);
      $news->save();

      return redirect('admin/news/create');
  }

  // 以下を追記
  public function index(Request $request)
  {
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
          // 検索されたら検索結果を取得する
          $posts = News::where('title', $cond_title)->get();
      } else {
          // それ以外はすべてのニュースを取得する
          $posts = News::all();
      }
      return view('admin.news.index', ['posts' => $posts, 'cond_title' => $cond_title]);
  }
  
  
   public function edit(Request $request)
  {
      // News Modelからデータを取得する
      $news = News::find($request->id);
      if (empty($news)) {
        abort(404);    
      }
      return view('admin.news.edit', ['news_form' => $news]);
  }


  public function update(Request $request)
  {
      // Validationをかける
      $this->validate($request, News::$rules);
      // News Modelからデータを取得する
      $news = News::find($request->id);
      // 送信されてきたフォームデータを格納する
      $news_form = $request->all();
      
      if ($request->remove == 'true') {
          $news_form['image_path'] = null;
      } elseif ($request->file('image')) {
          $path = $request->file('image')->store('public/image');
          $news_form['image_path'] = basename($path);
      } else {
          $news_form['image_path'] = $news->image_path;
      }
      
      unset($news_form['image']);
      unset($news_form['remove']);
      unset($news_form['_token']);

      // 該当するデータを上書きして保存する
      $news->fill($news_form)->save();

      return redirect('admin/news');
  }
  
  // 以下を追記　　
  public function delete(Request $request)
  {
      // 該当するNews Modelを取得
      $news = News::find($request->id);
      // 削除する
      $news->delete();
      return redirect('admin/news/');
  }
}