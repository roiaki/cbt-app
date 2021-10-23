<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // ←これを追加

class HabitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $habit = array(
            "一般化のし過ぎ",
            "自分への関連付け",
            "根拠のない推論",
            "白か黒か思考",
            "すべき思考",
            "過大評価と過少評価",
            "感情による決めつけ"
        );

        for ($i = 0; $i < 7; $i++) {
            DB::table('habits')->insert([
                'habit_name' => $habit[$i],
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);
        }
        /*
        DB::table('habits')->insert([
            'id' => '1',
            'habit_name' => '一般化のし過ぎ'
        ]);

        DB::table('habits')->insert([
            'id' => '2',
            'habit_name' => '自分への関連付け'
        ]);

        DB::table('habits')->insert([
            'id' => '3',
            'habit_name' => '根拠のない推論'
        ]);

        DB::table('habits')->insert([
            'id' => '4',
            'habit_name' => '白か黒か思考'
        ]);

        DB::table('habits')->insert([
            'id' => '5',
            'habit_name' => 'すべき思考'
        ]);

        DB::table('habits')->insert([
            'id' => '6',
            'habit_name' => '過大評価と過少評価'
        ]);

        DB::table('habits')->insert([
            'id' => '7',
            'habit_name' => '感情による決めつけ'
        ]);
        */
    }
}