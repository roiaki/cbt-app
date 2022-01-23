<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;
use DB;
use Exception;

class EventsController extends Controller
{
    // event一覧表示
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $events = $user->events()->orderBy('updated_at', 'desc')->paginate(5);

            $data = [
                'user' => $user,
                'events' => $events,
            ];
        }

        return view('events.index', $data);
    }

    // getでevents/createにアクセスされた場合の「新規登録画面表示処理」
    public function create()
    {
        $event = new Event;

        // 第二引数：連想配列でテンプレートに渡すデータ　[キー　=> バリュー]
        return view('events.create', [
            'event' => $event
        ]);
    }

    // postで/eventsへアクセス　保存処理
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                //'title' => 'required|max:30',
                'content' => 'required|max:255',
            ]
        );

        // クロージャでトランザクション処理
        $event = DB::transaction(function () use($request) {
            
            $event = new Event;
            // 送られてきたフォームの内容は　$request　に入っている。
            $event->title = $request->title;
            $event->content = $request->content;
    
            // ログインしているユーザーIDを渡す
            $event->user_id = \Auth::id();
    
            $event->save();

            return $event;
        });
        
       
        return view('events.show', ['event' => $event]);
    }

    
    // 詳細ページ表示処理
    public function show($id)
    {
        $event = Event::find($id);

        return view('events.show', ['event' => $event]);
    }

    // 編集処理
    public function edit($id)
    {
        $event = Event::find($id);

        return view('events.edit', ['event' => $event]);
    }

    // 出来事更新処理
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'title' => 'required|max:30',
            'content' => 'required|max:255',
        ]);

        $event = event::find($id);

        // クロージャでトランザクション
        DB::transaction(function () use($event, $request) {
            $event->title = $request->title;
            $event->content = $request->content;           
            $event->updated_at = date("Y-m-d h:m:s");
    
            $event->save();
        });
        
        return redirect('/events');
    }

    // deleteでcolumn/id　にアクセスされた場合の「削除処理」
    public function delete($id)
    {
        $event = event::find($id);
        if ( $event ) {
            $event->delete();
        }
        

        return redirect()->route('/events');
        //return redirect('/events');
    }

    public function info()
    {
        return view('/users/info');
    }

    // ロールバック時のエラー制御メソッド
    public function catchError($param) {
        try {

        } catch(Exception $e) {

        }
    }

}
