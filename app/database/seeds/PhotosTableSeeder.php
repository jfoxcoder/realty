<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PhotosTableSeeder extends Seeder {

    private $srcRootDir;
    private $destRootDir;

    function __construct()
    {
        $this->srcRootDir = base_path().'\app\database\seeds\listings';
        $this->destRootDir = public_path().'\images\listings';

        DB::table('photos')->delete();
    }


    /**
     * Creates the photo records according to the files in \app\database\seeds\listings.
     *
     * Still necessary to manually copy the image files to their individual listings directory.
     */
    public function run()
	{


        //Log::info($this->srcRootDir);
        //Log::info($this->destRootDir);

        foreach(File::directories($this->srcRootDir) as $srcDir) {

            $listingId = basename($srcDir);

            foreach(File::files($srcDir) as $srcFile) {

                $pathParts = pathinfo($srcFile);

                $this->createPhoto(
                    $listingId,
                    $pathParts['filename'],
                    $pathParts['extension']
                );
            }
        }

	}

    /**
     * @param $listingId
     * @param $srcFile
     */
    public function createPhoto($listingId, $filename, $extension)
    {
        //$order = $filename === '0' ? '1' : 999;

        Photo::create([
            'filename' => $filename.'.'.$extension,
            'listing_id' => $listingId,
            'order' => intval($filename)
        ]);
    }


}