<?php

namespace Database\Seeders;

use App\Models\Placement;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PlacementSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 1; $i < 70; $i++) {
            $country = $faker->randomElement($this->getSADCountries());
            $city = $this->getCity($country);
            $address = $faker->address;
            $phoneNumber = $this->getPhoneNumber($country);

            Placement::create([
                'student_id' => $i,
                'name' => $faker->company,
                'country' => $country,
                'city' => $city,
                'physical_address' => $address,
                'telephone' => $phoneNumber,
                'email' => $faker->email,
                'website' => $faker->url,
                'date_of_engagement' => $faker->date('Y-m-d', $faker->dateTimeBetween('-1 year', 'now')), // ensures date is not in future
            ]);
        }
    }

    private function getSADCountries()
    {
        return [
            'Angola',
            'Botswana',
            'Comoros',
            'Democratic Republic of the Congo',
            'Eswatini (formerly Swaziland)',
            'Lesotho',
            'Madagascar',
            'Malawi',
            'Mauritius',
            'Mozambique',
            'Namibia',
            'Seychelles',
            'South Africa',
            'Tanzania',
            'Zambia',
            'Zimbabwe',
        ];
    }

    private function getCity($country)
    {
        $cities = [
            'Angola' => ['Luanda', 'Huambo', 'Lobito', 'Benguela', 'Cuito'],
            'Botswana' => ['Gaborone', 'Francistown', 'Maun', 'Selebi-Phikwe', 'Kasane'],
            'Comoros' => ['Moroni', 'Mutsamudu', 'Fomboni', 'Domoni', 'Mohéli'],
            'Democratic Republic of the Congo' => ['Kinshasa', 'Lubumbashi', 'Mbuji-Mayi', 'Kolwezi', 'Kisangani'],
            'Eswatini (formerly Swaziland)' => ['Mbabane', 'Manzini', 'Lobamba', 'Siteki', 'Piggs Peak'],
            'Lesotho' => ['Maseru', 'Mapoteng', 'Mohale\'s Hoek', 'Mafeteng', 'Quthing'],
            'Madagascar' => ['Antananarivo', 'Toamasina', 'Antsirabe', 'Fianarantsoa', 'Mahajanga'],
            'Malawi' => ['Lilongwe', 'Blantyre', 'Zomba', 'Mzuzu', 'Kasungu'],
            'Mauritius' => ['Port Louis', 'Beau Bassin-Rose Hill', 'Vacoas-Phoenix', 'Curepipe', 'Quatre Bornes'],
            'Mozambique' => ['Maputo', 'Beira', 'Nampula', 'Tete', 'Quelimane'],
            'Namibia' => ['Windhoek', 'Rundu', 'Walvis Bay', 'Swakopmund', 'Oshakati'],
            'Seychelles' => ['Victoria', 'Anse Royale', 'Beau Vallon', 'Bel Ombre', 'Cascade'],
            'South Africa' => ['Pretoria', 'Cape Town', 'Johannesburg', 'Durban', 'Port Elizabeth'],
            'Tanzania' => ['Dodoma', 'Dar es Salaam', 'Mwanza', 'Arusha', 'Mbeya'],
            'Zambia' => ['Lusaka', 'Kitwe', 'Ndola', 'Kabwe', 'Chingola'],
            'Zimbabwe' => ['Harare', 'Bulawayo', 'Chitungwiza', 'Mutare', 'Gweru'],
        ];
        $faker = Faker::create();
        return $faker->randomElement($cities[$country] ?? [$country]);
    }

    private function getPhoneNumber($country)
    {
        $faker = Faker::create();
        $phoneFormats = [
            'Angola' => ['+244 (###) ###-####', '+244-###-###-####'],
            'Botswana' => ['+267 (###) ###-####', '+267-###-###-####'],
            'Comoros' => ['+269 (###) ###-####', '+269-###-###-####'],
            'Democratic Republic of the Congo' => ['+243 (###) ###-####', '+243-###-###-####'],
            'Eswatini (formerly Swaziland)' => ['+268 (###) ###-####', '+268-###-###-####'],
            'Lesotho' => ['+266 (###) ###-####', '+266-###-###-####'],
            'Madagascar' => ['+261 (###) ###-####', '+261-###-###-####'],
            'Malawi' => ['+265 (###) ###-####', '+265-###-###-####'],
            'Mauritius' => ['+230 (###) ###-####', '+230-###-###-####'],
            'Mozambique' => ['+258 (###) ###-####', '+258-###-###-####'],
            'Namibia' => ['+264 (###) ###-####', '+264-###-###-####'],
            'Seychelles' => ['+248 (###) ###-####', '+248-###-###-####'],
            'South Africa' => ['+27 (###) ###-####', '+27-###-###-####'],
            'Tanzania' => ['+255 (###) ###-####', '+255-###-###-####'],
            'Zambia' => ['+260 (###) ###-####', '+260-###-###-####'],
            'Zimbabwe' => ['+263 (###) ###-####', '+263-###-###-####'],
        ];

        $format = $faker->randomElement($phoneFormats[$country] ?? ['+## (####) #####']);

        return $faker->numerify($format);
    }
}