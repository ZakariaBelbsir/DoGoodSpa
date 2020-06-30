<?php

use App\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert(['name' => 'Tanger‐Asilah | طنجة- أصيلة', 'region_id' => 1]);
        DB::table('cities')->insert(['name' => 'M\'Diq‐Fnidq | المضيق- الفنيدق', 'region_id' => 1]);
        DB::table('cities')->insert(['name' => 'Chefchaouen | وشفشاون', 'region_id' => 1]);
        DB::table('cities')->insert(['name' => 'Fahs‐Anjra | الفحص- أنجرة', 'region_id' => 1]);
        DB::table('cities')->insert(['name' => 'Larache | والعرائش', 'region_id' => 1]);
        DB::table('cities')->insert(['name' => 'Tétouan |وتطوان', 'region_id' => 1]);
        DB::table('cities')->insert(['name' => 'Ouezzane | وزان', 'region_id' => 1]);
        DB::table('cities')->insert(['name' => 'Al Hoceima | الحسيمة', 'region_id' => 1]);
        DB::table('cities')->insert(['name' => 'Oujda Angad |وجدة- أنجاد', 'region_id' => 2]);
        DB::table('cities')->insert(['name' => 'Berkane | بركان', 'region_id' => 2]);
        DB::table('cities')->insert(['name' => 'Jrada | جرادة', 'region_id' => 2]);
        DB::table('cities')->insert(['name' => 'Nador | الناضور', 'region_id' => 2]);
        DB::table('cities')->insert(['name' => 'Taourirt | تاوريرت', 'region_id' => 2]);
        DB::table('cities')->insert(['name' =>' Driouch | الدريوش' , 'region_id' => 2]);
        DB::table('cities')->insert(['name' => 'Guercif | جرسيف', 'region_id' => 2]);
        DB::table('cities')->insert(['name' =>'Figuig | فجيج' , 'region_id' => 2]);
        DB::table('cities')->insert(['name' =>'Meknès | مكناس' , 'region_id' => 3]);
        DB::table('cities')->insert(['name' => 'Fès | فاس', 'region_id' => 3]);
        DB::table('cities')->insert(['name' =>'Boulemane | بولمان' , 'region_id' => 3]);
        DB::table('cities')->insert(['name' => 'El Hajeb | الحاجب', 'region_id' => 3]);
        DB::table('cities')->insert(['name' => 'Ifrane | إيفران', 'region_id' => 3]);
        DB::table('cities')->insert(['name' => 'Sefrou | صفرو', 'region_id' => 3]);
        DB::table('cities')->insert(['name' => 'Taounate | تاونات', 'region_id' => 3]);
        DB::table('cities')->insert(['name' => 'Taza | تازة', 'region_id' => 3]);
        DB::table('cities')->insert(['name' =>'Moulay Yacoub | مولاي يعقوب' , 'region_id' => 3]);
        DB::table('cities')->insert(['name' => 'Rabat | الرباط', 'region_id' => 4]);
        DB::table('cities')->insert(['name' => 'Salé | سلا', 'region_id' => 4]);
        DB::table('cities')->insert(['name' => 'Skhirate‐Temara | الصخيرات- تمارة', 'region_id' => 4]);
        DB::table('cities')->insert(['name' => 'Kénitra | القنيطرة', 'region_id' => 4]);
        DB::table('cities')->insert(['name' => 'Khemisset | الخميسات', 'region_id' => 4]);
        DB::table('cities')->insert(['name' => 'Sidi Kacem | سيدي قاسم', 'region_id' => 4]);
        DB::table('cities')->insert(['name' => 'Sidi Slimane | سيدي سليمان', 'region_id' => 4]);
        DB::table('cities')->insert(['name' => 'Azilal | أزيلال', 'region_id' => 5]);
        DB::table('cities')->insert(['name' => 'Béni Mellal | بني ملال', 'region_id' => 5]);
        DB::table('cities')->insert(['name' => 'Khénifra | خنيفرة', 'region_id' => 5]);
        DB::table('cities')->insert(['name' => 'Khouribga | خريبكة', 'region_id' => 5]);
        DB::table('cities')->insert(['name' =>'Fquih Ben Salah | الفقيه بن صالح' , 'region_id' => 5]);
        DB::table('cities')->insert(['name' => 'Casablanca | الدار البيضاء', 'region_id' => 6]);
        DB::table('cities')->insert(['name' => 'Mohammedia | المحمدية', 'region_id' => 6]);
        DB::table('cities')->insert(['name' => 'Ben Slimane | بنسليمان', 'region_id' => 6]);
        DB::table('cities')->insert(['name' => 'El Jadida | الجديدة', 'region_id' => 6]);
        DB::table('cities')->insert(['name' =>'Mediouna | مديونة' , 'region_id' => 6]);
        DB::table('cities')->insert(['name' => 'Nouacer |  النواصر', 'region_id' => 6]);
        DB::table('cities')->insert(['name' => 'Settat | سطات', 'region_id' => 6]);
        DB::table('cities')->insert(['name' => 'Berrechid | برشيد', 'region_id' => 6]);
        DB::table('cities')->insert(['name' => 'Sidi Bennour | سيدي بنور', 'region_id' => 6]);
        DB::table('cities')->insert(['name' => 'Marrakech | مراكش', 'region_id' => 7]);
        DB::table('cities')->insert(['name' =>'Al Haouz | الحوز' , 'region_id' => 7]);
        DB::table('cities')->insert(['name' => 'Chichaoua | شيشاوة', 'region_id' => 7]);
        DB::table('cities')->insert(['name' => 'El Kelaa Sraghna | قلعة السراغنة', 'region_id' => 7]);
        DB::table('cities')->insert(['name' => 'Essaouira | الصويرة', 'region_id' => 7]);
        DB::table('cities')->insert(['name' => 'Safi | آسفي', 'region_id' => 7]);
        DB::table('cities')->insert(['name' =>'Rehamna | الرحامنة' , 'region_id' => 7]);
        DB::table('cities')->insert(['name' => 'Youssoufia | اليوسفية', 'region_id' => 7]);
        DB::table('cities')->insert(['name' => 'Errachidia | الرشيدية', 'region_id' => 8]);
        DB::table('cities')->insert(['name' => 'Ouarzazate | ورزازات', 'region_id' => 8]);
        DB::table('cities')->insert(['name' =>'Zagora | زاكورة' , 'region_id' => 8]);
        DB::table('cities')->insert(['name' =>'Tinghir | تنغير' , 'region_id' => 8]);
        DB::table('cities')->insert(['name' => 'Midelt | ميدلت', 'region_id' => 8]);
        DB::table('cities')->insert(['name' => 'Agadir Ida Ou Tanane | كادير إداوتنان', 'region_id' => 9]);
        DB::table('cities')->insert(['name' => 'Inezgane Ait Melloul | إنزكان آيت ملول', 'region_id' => 9]);
        DB::table('cities')->insert(['name' => 'Chtouka Ait Baha | اشتوكة آيت باها', 'region_id' => 9]);
        DB::table('cities')->insert(['name' => 'Taroudant | تارودانت', 'region_id' => 9]);
        DB::table('cities')->insert(['name' => 'Tata | طاطا', 'region_id' => 9]);
        DB::table('cities')->insert(['name' =>'Tiznit | تيزنيت' , 'region_id' => 9]);
        DB::table('cities')->insert(['name' =>'Guelmim | كلميم' , 'region_id' => 10]);
        DB::table('cities')->insert(['name' => 'Tan-Tan | طانطان', 'region_id' => 10]);
        DB::table('cities')->insert(['name' => 'Sidi Ifni | سيدي افني', 'region_id' => 10]);
        DB::table('cities')->insert(['name' => 'Assa-Zag | آسا- الزاك', 'region_id' => 10]);
        DB::table('cities')->insert(['name' => 'Es Semara | السمارة', 'region_id' => 11]);
        DB::table('cities')->insert(['name' => 'Boujdour | بوجدور', 'region_id' => 11]);
        DB::table('cities')->insert(['name' => 'Laâyoune | لعيون', 'region_id' => 11]);
        DB::table('cities')->insert(['name' => 'Tarfaya | طرفاية', 'region_id' => 11]);
        DB::table('cities')->insert(['name' => 'Aousserd | أوسرد', 'region_id' => 12]);
        DB::table('cities')->insert(['name' => 'Oued Eddahab | وادي الذهب', 'region_id' => 12]);
        //DB::table('cities')->insert(['name' => '', 'region_id' => ]);
    }
}
