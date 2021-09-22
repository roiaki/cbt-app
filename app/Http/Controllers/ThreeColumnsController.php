<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ThreeColumn;    // 追加
use App\Models\Event;    // 追加
use App\Models\Habits;    // 追加

class ThreeColumnsController extends Controller
{
    // 一覧表示
    public function index()
    {
        /*
        $three_columns = three_column::paginate(25);

        // $three_columns = three_column::all();

        // 第二引数：連想配列でテンプレートに渡すデータ  [キー　=> バリュー]
        return view('three_columns.index', [
            'three_columns' => $three_columns,
        ]); 
    */
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $three_columns = $user->three_columns()->orderBy('created_at', 'desc')->paginate(13);

            $data = [
                'user' => $user,
                'three_columns' => $three_columns,
            ];
        }

        return view('three_columns.index', $data);
    }

    // getでmessages/createにアクセスされた場合の「新規登録画面表示処理」
    public function create()
    {
        //dd($_REQUEST['event_id']);
        $event = Event::find($_REQUEST['event_id']);
        $threecolumn = new ThreeColumn;

        $data = [
            'event' => $event,
            'three_column' => $threecolumn
        ];

        // 第二引数：連想配列でテンプレートに渡すデータ　[キー　=> バリュー]
        return view('three_columns.create', $data);
    }

    // 保存処理
    public function store(Request $request)
    {
        //dd($request);

        $this->validate(
            $request,
            [
                'emotion_name' => 'required',
                'emotion_strength' => 'required',
                'thinking' => 'required',
            ]
        );


        $three_column = new ThreeColumn;

        // ログインしているユーザーIDを渡す
        $three_column->user_id = \Auth::id();
        $three_column->thinking = $request->thinking;

        //eventsテーブルのidをthree_columnsテーブルのevent_idに格納
        $three_column->event_id = $request->eventid;
        //dd($three_column);
        // 中間テーブルの保存はthree_column保存の後でないとidがない
        $three_column->save();

        //$test = $request->habit[5];
        //dd($request);

        // チェックリストhabitを中間テーブルに保存
        if (isset($request->habit[0])) {
            if ($request->habit[0] == "on") {
                $three_column->habit()->attach(1);
            }
        }

        if (isset($request->habit[1])) {
            if ($request->habit[1] == "on") {
                $three_column->habit()->attach(2);
            }
        }

        if (isset($request->habit[2])) {
            if ($request->habit[2] == "on") {
                $three_column->habit()->attach(3);
            }
        }

        if (isset($request->habit[3])) {
            if ($request->habit[3] == "on") {
                $three_column->habit()->attach(4);
            }
        }

        if (isset($request->habit[4])) {
            if ($request->habit[4] == "on") {
                $three_column->habit()->attach(5);
            }
        }

        if (isset($request->habit[5])) {
            if ($request->habit[5] == "on") {
                $three_column->habit()->attach(6);
            }
        }

        if (isset($request->habit[6])) {
            if ($request->habit[6] == "on") {
                $three_column->habit()->attach(7);
            }
        }

        $three_column->save();

        return redirect('/three_columns');
    }

    // 詳細ページ表示処理
    public function show($id)
    {
        $event = Event::find($id);
        $three_column = ThreeColumn::find($id);

        // 考え方の癖 id 取得
        foreach ($three_column->habit as $habit) {
            $habit_id[] = $habit->id;
        }


        //dd($habit_id);
        $user = \Auth::user();
        $data = [
            'user' => $user,
            'event' => $event,
            'habit_id' => $habit_id,
            'three_column' => $three_column
        ];
        //dd($data);

        // $data 配列そのまま渡すか、連想配列として渡すかでbladeでのアクセス方法が変わる
        // return view('three_columns, ['data' => $data]);
        return view('three_columns.show', $data);
    }

    // 編集処理
    public function edit($id)
    {
        
        $three_column = ThreeColumn::find($id);
        $event = Event::find($id);
        $data = [
            'three_column' => $three_column,
            'event' => $event
        ];

        //dd($three_column);
        return view('three_columns.edit', $data );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);   // 追加

        $this->validate($request, [
            'title' => 'required|max:30',
            'content' => 'required|max:255',
            'emotion_name' => 'required',
            'emotion_strength' => 'required',
            'thinking' => 'required'

        ]);

        $three_column = ThreeColumn::find($id);
        //$three_column->title = $request->title;
        //$three_column->content = $request->content;

        $three_column->emotion_name = $request->emotion_name;
        $three_column->emotion_strength = $request->emotion_strength;
        $three_column->thinking = $request->thinking;

        $three_column->save();

        // チェックリストhabitを中間テーブルに保存
        if (isset($request->habit[0])) {
            if ($request->habit[0] == "on") {
                $three_column->habit()->sync(1);
            } else {
                $three_column->habit()->detach(1);
            }
        }


        return redirect('/three_columns');
    }

    // deleteでcolumn/id　にアクセスされた場合の「削除処理」
    public function destroy($id)
    {
        $three_column = three_column::find($id);
        $three_column->delete();

        return redirect('/three_columns');
    }

    public function info()
    {
        return view('/users/info');
    }

    public function fix($id)
    {
        $three_column = three_column::find($id);

        return view(
            'seven_columns.create',
            [
                'three_column' => $three_column
            ]
        );
    }

    public function seven_index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $three_columns = $user->three_columns()->orderBy('created_at')->paginate(10);

            $data = [
                'user' => $user,
                'three_columns' => $three_columns
            ];
        }
        return view('three_columns.seven_index', $data);
    }

    // 7コラム作成処理
    public function fix_save(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'title' => 'required|max:30',
                'content' => 'required|max:255',
                'emotion_name' => 'required',
                'emotion_strength' => 'required',
                'thinking' => 'required',

                'basis_thinking' => 'required',
                'opposite_fact' => 'required',
                'new_thinking' => 'required',
                'new_emotion' => 'required',
            ]
        );

        $three_column = three_column::find($id);
        // 送られてきたフォームの内容は　$request　に入っている。
        $three_column->title = $request->title;
        $three_column->content = $request->content;

        $three_column->emotion_name = $request->emotion_name;
        $three_column->emotion_strength = $request->emotion_strength;
        $three_column->thinking = $request->thinking;

        $three_column->basis_thinking = $request->basis_thinking;
        $three_column->opposite_fact = $request->opposite_fact;
        $three_column->new_thinking = $request->new_thinking;
        $three_column->new_emotion = $request->new_emotion;

        // ログインしているユーザーIDを渡す
        $three_column->user_id = \Auth::id();

        $three_column->save();

        return redirect('/three_columns');
    }
}
