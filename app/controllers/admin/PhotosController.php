<?php namespace admin;


use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use joseph\transformers\PhotoTransformer;
use Listing;
use Photo;
use Symfony\Component\HttpFoundation\File\Exception\FileException;



class PhotosController extends \BaseController {

    private $photoTransformer;

    function __construct(PhotoTransformer $photoTransformer)
    {
        $this->photoTransformer = $photoTransformer;
    }

    public function index($listingId)
	{
        $photos = Photo::whereListingId($listingId)->orderby('order')
                                                   ->get()
                                                   ->all();

        $data = $this->photoTransformer->transformCollection($photos);

        return Response::json(['data' => $data], 200);
	}



	/**
	 * Show the form for creating a new resource.
	 * GET /photos/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}




	/**
	 * Store a newly created resource in storage.
	 * POST /photos
	 *
	 * @return Responses
	 */
	public function store()
	{


        $listing = $this->getInputListing();

        if (! Input::hasFile('photos')) {

            Log::info('no photos returning no photos message back to client');

            return JsonResponse::create(['ok' => false, 'message' => 'no photos']);
        }

        // get photos from input
        $photos = Input::file('photos');



        foreach($photos as $photo) {
            try {
                $filename = $photo->getClientOriginalName();

                $directory = $listing->getPhotosDirectory();

                $fullPath = $directory.'/'.$filename;



                $newPhoto = ! file_exists($fullPath);

                $photo->move($directory, $filename);

                // create new photo record
                if ($newPhoto) {
                    Photo::create([
                        'listing_id' => $listing->id,

                        // the order that the photo will appear in slideshows todo
                        'order' => 0,

                        'filename' => $filename
                    ]);
                }
            } catch (FileException $ex) {
                Log::error($ex.getMessage());
            }
        }








	}

	/**
	 * Display the specified resource.
	 * GET /photos/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /photos/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /photos/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

//    public function deletePhoto($photo)
//    {
//
//        //Log::info('deletePhoto()*****' . $photoId.'*****');
//
//
//        return Response::json(['ok' => true, 'photoId' => $photo->id]);
//    }

	public function destroy($id)
	{
        $photo = Photo::findOrFail($id);


        $fp = $photo->filepath();

        Log::info($fp);

        if (File::delete($photo->filepath())) {
            $photo->delete();
            return Response::json(['ok' => true], 200);
        }

        return Response::json([
            'ok' => false,
            'message' => "Error deleting photo id = {$id}."
        ], 500);
	}




    /**
     * @return Listing
     */
    public function getInputListing()
    {
        $listingId = Input::get('listingId');

        return Listing::findOrFail($listingId);
    }

}