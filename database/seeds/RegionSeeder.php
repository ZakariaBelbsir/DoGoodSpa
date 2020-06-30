<?php

use App\Region;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->insert(['name' => 'Tanger-Tétouan-Al Hoceïma - جهة طنجة تطوان الحسيمة']);
        DB::table('regions')->insert(['name' => "L'Oriental - جهة الشرق"]);
        DB::table('regions')->insert(['name' => 'Fès-Meknès - جهة فاس مكناس']);
        DB::table('regions')->insert(['name' => 'Rabat-Salé-Kénitra - جهة الرباط سلا القنيطرة']);
        DB::table('regions')->insert(['name' => 'Béni Mellal-Khénifra - جهة بني ملال خنيفرة']);
        DB::table('regions')->insert(['name' => 'Casablanca-Settat - جهة الدار البيضاء سطات']);
        DB::table('regions')->insert(['name' => 'Marrakech-Safi - جهة مراكش آسفي']);
        DB::table('regions')->insert(['name' => 'Drâa-Tafilalet - جهة درعة تافيلالت']);
        DB::table('regions')->insert(['name' => 'Souss-Massa - جهة سوس ماسة']);
        DB::table('regions')->insert(['name' => 'Guelmim-Oued Noun - جهة كلميم واد نون']);
        DB::table('regions')->insert(['name' => 'Laâyoune-Sakia El Hamra - جهة العيون الساقية الحمراء']);
        DB::table('regions')->insert(['name' => 'Dakhla-Oued Ed-Dahab - جهة الداخلة وادي الذهب']);
    }
}
