<?php


class TownsTableSeeder extends Seeder {

	public function run()
	{
        DB::table('towns')->delete();

        Town::create(['name' => 'Ashburton', 'region_id' => 3 ]);
        Town::create(['name' => 'Auckland City', 'region_id' => 1 ]);
        Town::create(['name' => 'Banks Peninsula', 'region_id' => 3 ]);
        Town::create(['name' => 'Buller', 'region_id' => 20 ]);
        Town::create(['name' => 'Carterton', 'region_id' => 18 ]);
        Town::create(['name' => 'Central Hawkes Bay', 'region_id' => 8 ]);
        Town::create(['name' => 'Central Otago', 'region_id' => 5 ]);
        Town::create(['name' => 'Chatham Islands', 'region_id' => 14 ]);
        Town::create(['name' => 'Christchurch City', 'region_id' => 3 ]);
        Town::create(['name' => 'Clutha', 'region_id' => 13 ]);
        Town::create(['name' => 'Dunedin City', 'region_id' => 13 ]);
        Town::create(['name' => 'Far North', 'region_id' => 12 ]);
        Town::create(['name' => 'Fiji', 'region_id' => 14 ]);
        Town::create(['name' => 'Franklin', 'region_id' => 1 ]);
        Town::create(['name' => 'Gisborne', 'region_id' => 7 ]);
        Town::create(['name' => 'Gore', 'region_id' => 15 ]);
        Town::create(['name' => 'Grey', 'region_id' => 20 ]);
        Town::create(['name' => 'Hamilton City', 'region_id' => 17 ]);
        Town::create(['name' => 'Hastings', 'region_id' => 8 ]);
        Town::create(['name' => 'Hauraki', 'region_id' => 6 ]);
        Town::create(['name' => 'Hauraki Gulf Islands', 'region_id' => 1 ]);
        Town::create(['name' => 'Horowhenua', 'region_id' => 9 ]);
        Town::create(['name' => 'Hurunui', 'region_id' => 3 ]);
        Town::create(['name' => 'Invercargill City', 'region_id' => 15 ]);
        Town::create(['name' => 'Kaikoura', 'region_id' => 10 ]);
        Town::create(['name' => 'Kaipara', 'region_id' => 12 ]);
        Town::create(['name' => 'Kapiti Coast', 'region_id' => 19 ]);
        Town::create(['name' => 'Kawerau', 'region_id' => 2 ]);
        Town::create(['name' => 'Lower Hutt City', 'region_id' => 19 ]);
        Town::create(['name' => 'Mackenzie', 'region_id' => 3 ]);
        Town::create(['name' => 'Manawatu', 'region_id' => 9 ]);
        Town::create(['name' => 'Manukau City', 'region_id' => 1 ]);
        Town::create(['name' => 'Marlborough', 'region_id' => 10 ]);
        Town::create(['name' => 'Masterton', 'region_id' => 18 ]);
        Town::create(['name' => 'Matamata-Piako', 'region_id' => 17 ]);
        Town::create(['name' => 'Napier City', 'region_id' => 8 ]);
        Town::create(['name' => 'Nelson', 'region_id' => 11 ]);
        Town::create(['name' => 'New Caledonia', 'region_id' => 14 ]);
        Town::create(['name' => 'New Plymouth', 'region_id' => 16 ]);
        Town::create(['name' => 'North Shore City', 'region_id' => 1 ]);
        Town::create(['name' => 'Opotiki', 'region_id' => 2 ]);
        Town::create(['name' => 'Otorohanga', 'region_id' => 17 ]);
        Town::create(['name' => 'Palmerston North City', 'region_id' => 9 ]);
        Town::create(['name' => 'Papakura', 'region_id' => 1 ]);
        Town::create(['name' => 'Porirua City', 'region_id' => 19 ]);
        Town::create(['name' => 'Queenstown', 'region_id' => 5 ]);
        Town::create(['name' => 'Rangitikei', 'region_id' => 9 ]);
        Town::create(['name' => 'Rarotonga', 'region_id' => 14 ]);
        Town::create(['name' => 'Rodney', 'region_id' => 1 ]);
        Town::create(['name' => 'Rotorua', 'region_id' => 2 ]);
        Town::create(['name' => 'Ruapehu', 'region_id' => 4 ]);
        Town::create(['name' => 'Samoa', 'region_id' => 14 ]);
        Town::create(['name' => 'Selwyn', 'region_id' => 3 ]);
        Town::create(['name' => 'South Taranaki', 'region_id' => 16 ]);
        Town::create(['name' => 'South Waikato', 'region_id' => 17 ]);
        Town::create(['name' => 'South Wairarapa', 'region_id' => 18 ]);
        Town::create(['name' => 'Southland', 'region_id' => 15 ]);
        Town::create(['name' => 'Stratford', 'region_id' => 16 ]);
        Town::create(['name' => 'Tararua', 'region_id' => 18 ]);
        Town::create(['name' => 'Tasman', 'region_id' => 11 ]);
        Town::create(['name' => 'Taupo', 'region_id' => 4 ]);
        Town::create(['name' => 'Tauranga', 'region_id' => 2 ]);
        Town::create(['name' => 'Thames-Coromandel', 'region_id' => 6 ]);
        Town::create(['name' => 'Timaru', 'region_id' => 3 ]);
        Town::create(['name' => 'Tonga', 'region_id' => 14 ]);
        Town::create(['name' => 'Upper Hutt City', 'region_id' => 19 ]);
        Town::create(['name' => 'Vanuatu', 'region_id' => 14 ]);
        Town::create(['name' => 'Waiheke Island', 'region_id' => 1 ]);
        Town::create(['name' => 'Waikato', 'region_id' => 17 ]);
        Town::create(['name' => 'Waimakariri', 'region_id' => 3 ]);
        Town::create(['name' => 'Waimate', 'region_id' => 3 ]);
        Town::create(['name' => 'Waipa', 'region_id' => 17 ]);
        Town::create(['name' => 'Wairoa', 'region_id' => 8 ]);
        Town::create(['name' => 'Waitakere City', 'region_id' => 1 ]);
        Town::create(['name' => 'Waitaki', 'region_id' => 13 ]);
        Town::create(['name' => 'Waitomo', 'region_id' => 17 ]);
        Town::create(['name' => 'Wanaka', 'region_id' => 5 ]);
        Town::create(['name' => 'Wanganui', 'region_id' => 9 ]);
        Town::create(['name' => 'Wellington City', 'region_id' => 19 ]);
        Town::create(['name' => 'Western Bay Of Plenty', 'region_id' => 2 ]);
        Town::create(['name' => 'Westland', 'region_id' => 20 ]);
        Town::create(['name' => 'Whakatane', 'region_id' => 2 ]);
        Town::create(['name' => 'Whangarei', 'region_id' => 12 ]);

	}

}