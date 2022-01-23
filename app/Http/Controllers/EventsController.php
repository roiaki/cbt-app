<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Exception;

class EventsController extends Controller
{
    // event一覧表示
    public function index()
    {
        $data = [];
        if (Auth::check()) {
            $user = Auth::user();
            $events = $user->events()->orderBy('updated_at', 'desc')->paginate(5);

            $data = [
                'events' => $events,
            ];
        }

        return view('events.index', $data);
    }

    // getでevents/createにアクセスされた場合の「新規登録画面表示処理」
    public function create(Request $request)
    {
        return view('events.create');
    }

    // 保存処理
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'title' => 'required|max:30',
                'content' => 'required|max:255',
            ]
        );

        // クロージャでトランザクション処理
        $event = DB::transaction(function () use($request) {

            $event = new Event;
            $event->title = $request->title;
            $event->content = $request->content;
            $event->user_id = Auth::id();

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
            $event->updated_at = date("Y-m-d G:i:s");

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
<<<<<<< HEAD
        

        return redirect()->route('/events');
        //return redirect('/events');
=======

        return redirect('events');
>>>>>>> 586cecb05185e71f1a58d844382c8bc266e30177
    }

    public function info()
    {
        return view('/users/info');
    }

    public function testvue()
    {
        return view('events.testvue');
    }

    public function vuepost(Request $request)
    {
        dd($request);
        var_dump("test");
        return view('events.testvue');
    }

    // ロールバック時のエラー制御メソッド
    public function catchError($param) {
        try {

        } catch(Exception $e) {

        }
    }

}
