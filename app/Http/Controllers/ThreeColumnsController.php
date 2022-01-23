<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\ThreeColumn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ThreeColumnsController extends Controller
{
    // 一覧表示
    public function index()
    {
        $data = [];
        if (Auth::check()) {
            $user = Auth::user();
            $three_columns = $user->three_columns()
                                  ->orderBy('updated_at', 'desc')
                                  ->paginate(5);

            $data = [
                'three_columns' => $three_columns,
            ];
        }

        return view('three_columns.index', $data);
    }

    // getでアクセスされた場合の「新規登録画面表示処理」
    public function create($id)
    {
        $user = Auth::user();
        $user_id = $user->id;

        $event = Event::where('id', $id)->where('user_id', $user_id)->first();

        $data = [
            'event' => $event,
        ];

        return view('three_columns.create', $data);
    }

    // 保存処理
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
              //  'emotion_name' => 'required',
              //  'emotion_strength_0' => 'required',
                'thinking' => 'required',
                'habit' => 'required'
            ]
        );

        //dd($request);
        $three_column = new ThreeColumn;

        // クロージャでトランザクション処理
        DB::transaction(function () use ($three_column, $request) {

            $three_column->user_id = Auth::id();
            $three_column->event_id = $request->eventid;

            $three_column->title = $request->title;
            $three_column->content = $request->content;
            $three_column->emotion_name = $request->emotion_name;
            $three_column->emotion_strength = $request->emotion_strength;
            $three_column->thinking = $request->thinking;

            // 中間テーブルの保存はthree_column保存の後でないとidがない
            $three_column->save();

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
        });
        // end transaction

        return redirect('/three_columns');
    }

    // 詳細ページ表示処理
    public function show($id)
    {

        $three_column = ThreeColumn::find($id);

        $event_id = $three_column->event_id;
        $event = Event::find($event_id);

        $habit_id = [];

        // 考え方の癖 id 取得
        foreach ($three_column->habit as $habit) {
            $habit_id[] = $habit->id;
        }

        $user = Auth::user();
/*
        // idがない時は「空」を格納
        if ( !isset($habit_id) ) {
            $habit_id = [];
        }
*/
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
        //dd($id);
        $three_column = ThreeColumn::find($id);

        $event_id = $three_column->event_id;
        $event = Event::find($event_id);

        $habit_id = [];
        // 考え方の癖 id 取得
        foreach ($three_column->habit as $habit) {
            $habit_id[] = $habit->id;
        }
/*
        if ( !isset($habit_id) ) {
            $habit_id = [];
        }
*/
        $data = [
            'three_column' => $three_column,
            'habit_id' => $habit_id,
            'event' => $event
        ];

        //dd($three_column);
        return view('three_columns.edit', $data);
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
        $this->validate($request, [
            'title' => 'required|max:30',
            'content' => 'required|max:255',
            'emotion_name' => 'required',
            'emotion_strength' => 'required',
            'thinking' => 'required',
            'habit' => 'required'
        ]);

        // クロージャでトランザクション処理開始
        DB::transaction(function () use ($request, $id) {

            $three_column = ThreeColumn::find($id);

            $three_column->emotion_name = $request->emotion_name;
            $three_column->emotion_strength = $request->emotion_strength;
            $three_column->thinking = $request->thinking;

            $three_column->updated_at = date("Y-m-d G:i:s");

            $three_column->save();

            // 考えの癖を中間テーブルで更新
            if (isset($request->habit[0])) {
                if ($request->habit[0] == "on") {
                    $three_column->habit()->syncWithoutDetaching(1);
                }
            } else {
                $three_column->habit()->detach(1);
            }

            if (isset($request->habit[1])) {
                if ($request->habit[1] == "on") {
                    $three_column->habit()->syncWithoutDetaching(2);
                }
            } else {
                $three_column->habit()->detach(2);
            }

            if (isset($request->habit[2])) {
                if ($request->habit[2] == "on") {
                    $three_column->habit()->syncWithoutDetaching(3);
                }
            } else {
                $three_column->habit()->detach(3);
            }

            if (isset($request->habit[3])) {
                if ($request->habit[3] == "on") {
                    $three_column->habit()->syncWithoutDetaching(4);
                }
            } else {
                $three_column->habit()->detach(4);
            }

            if (isset($request->habit[4])) {
                if ($request->habit[4] == "on") {
                    $three_column->habit()->syncWithoutDetaching(5);
                }
            } else {
                $three_column->habit()->detach(5);
            }

            if (isset($request->habit[5])) {
                if ($request->habit[5] == "on") {
                    $three_column->habit()->syncWithoutDetaching(6);
                }
            } else {
                $three_column->habit()->detach(6);
            }

            if (isset($request->habit[6])) {
                if ($request->habit[6] == "on") {
                    $three_column->habit()->syncWithoutDetaching(7);
                }
            } else {
                $three_column->habit()->detach(7);
            }
            //dd($three_column->habit());
        });
        // end transaction

        return redirect('/three_columns');
    }

    // deleteでcolumn/id　にアクセスされた場合の「削除処理」
    public function destroy($id)
    {
        $three_column = ThreeColumn::find($id);
        $three_column->delete();

        return redirect('/three_columns');
    }

    // 説明ページ表示
    public function info()
    {
        return view('/users/info');
    }
}
