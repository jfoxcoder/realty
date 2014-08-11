<?php



class RegionsTableSeeder extends Seeder {

    private $island;

    function __construct()
    {
        DB::table('regions')->delete();
    }

	public function run()
	{
        // Note: Changing this will break TownsTableSeeder!

        $this->createRegion('Auckland', 'North Island');
        $this->createRegion('Bay of Plenty', 'North Island');
        $this->createRegion('Canterbury', 'South Island');
        $this->createRegion('Central North Island', 'North Island');
        $this->createRegion('Central Otago / Lakes District', 'South Island');
        $this->createRegion('Coromandel', 'North Island');
        $this->createRegion('Gisborne', 'North Island');
        $this->createRegion('Hawkes Bay', 'North Island');
        $this->createRegion('Manawatu / Wanganui', 'North Island');
        $this->createRegion('Marlborough', 'South Island');
        $this->createRegion('Nelson & Bays', 'South Island');
        $this->createRegion('Northland', 'North Island');
        $this->createRegion('Otago', 'South Island');
        $this->createRegion('Pacific Islands', 'Pacific Island');
        $this->createRegion('Southland', 'South Island');
        $this->createRegion('Taranaki', 'North Island');
        $this->createRegion('Waikato', 'North Island');
        $this->createRegion('Wairarapa', 'North Island');
        $this->createRegion('Wellington', 'North Island');
        $this->createRegion('West Coast', 'South Island');
    }

    private function CreateRegion($name, $island)
    {
        Region::create(['name' => $name, 'island' => $island ]);
    }



}