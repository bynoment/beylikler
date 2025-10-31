<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeoProvincesSeeder extends Seeder
{
    public function run(): void
    {
        $provinces = [
            'Adana','Adıyaman','Afyonkarahisar','Ağrı','Amasya','Ankara','Antalya','Artvin','Aydın','Balıkesir',
            'Bilecik','Bingöl','Bitlis','Bolu','Burdur','Bursa','Çanakkale','Çankırı','Çorum','Denizli',
            'Diyarbakır','Edirne','Elazığ','Erzincan','Erzurum','Eskişehir','Gaziantep','Giresun','Gümüşhane','Hakkari',
            'Hatay','Isparta','Mersin','İstanbul','İzmir','Kars','Kastamonu','Kayseri','Kırklareli','Kırşehir',
            'Kocaeli','Konya','Kütahya','Malatya','Manisa','Kahramanmaraş','Mardin','Muğla','Muş','Nevşehir',
            'Niğde','Ordu','Rize','Sakarya','Samsun','Siirt','Sinop','Sivas','Tekirdağ','Tokat',
            'Trabzon','Tunceli','Şanlıurfa','Uşak','Van','Yozgat','Zonguldak','Aksaray','Bayburt','Karaman',
            'Kırıkkale','Batman','Şırnak','Bartın','Ardahan','Iğdır','Yalova','Karabük','Kilis','Osmaniye',
            'Düzce'
        ];

        $bonusTypes = ['grain','stone','iron','gold'];

        foreach ($provinces as $name) {
            DB::table('geo_provinces')->updateOrInsert(
                ['name' => $name],
                [
                    'bonus_type' => $bonusTypes[array_rand($bonusTypes)],
                    'bonus_pct' => [5,10,15][array_rand([5,10,15])],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
