<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ListingsTableSeeder extends Seeder {

    private $faker;

    function __construct()
    {
        $this->faker = Faker::create();
    }

    public function run()
	{
        DB::table('listings')->delete();

        // 1
        $this->createListing(
            "ATTENTION INVESTORS!!",
            "Long term housing N.Z. tenancy with good return. Excellent tenant. Very modern, nicely designed town house built 2008. Open plan living, 2 bedrooms, separate bathroom. Garage (internal access). Nicely landscaped, private yard. DON'T MISS THIS ONE!!!",
            251, // Dallington, Christchurch City, Canterbury
            "184",
            "Gayhurst Road"
        );



        // 2
        $this->createListing(
            "Living Down The Lane",
            "Feel safe and secure living down this private and quiet lane. Set amongst other attractive modern homes, this three double bedroom single level townhouse is perfect in so many ways.
A beautifully spacious lounge room ideal for entertaining and a combined kitchen dining area. The master bedroom has an ensuite and walk in robe. The laundry is also separate plus there is an internal access double garage.
Enjoy the space and sunshine in this lovely home. Freshly painted throughout and presented in pristine condition. Situated so close to local shops and a short trip to Riccarton Mall. Immediate possession available.",
            1632, // Upper Riccarton, Christchurch City, Canterbury
            "3",
            "Octavius Lane"

        );



        // 3
        $this->createListing(
            "Location, Lifestyle, Convenience",
            "This permanent material front townhouse is a must view for professionals, retirees or those who require a secure lockup and leave town base. Having been totally refurbished only 2 years ago including a new roof, new insulation in all walls, stunning bathroom, generous storage throughout, new contemporary kitchen and fabulous separate lounge, you will be forgiven for thinking its like a new house.
Downstairs the combined kitchen/dining area opens out to a gorgeous private courtyard that enjoys all day sun and is ideal for entertaining, There is also a separate lounge which flows through from the kitchen area. There is a guest 2nd toilet downstairs, along with a stunning bathroom and 3 double bedrooms upstairs. The single internal access garage is also complimented by a separate off street park.
The convenience factor here is that you are only walking distance to Merivale's, caf?'s, bars, restaurants and shopping, which in our busy time constrained lifestyles is an indispensable consideration.
If education requirements are important, you are zoned for Christchurch Girls' and Boys' High schools, Heaton Intermediate and Elmwood Primary schools and within close proximity to the city's best private schools.
My vendor has made the decision to downgrade and is now resolute to sell on or before Auction day. Call now for more info.
Auction Thursday 26th June, 471 Papanui Road (Unless sold prior).",
            858, // Merivale, Christchurch City, Canterbury
            "1/58",
            "Office Road"
        );



        // 4
        $this->createListing(
            "SUN And VIEWS",
            "Fantastic sea views are on offer from the living area of this sunny 1990's home. Just across the road from the beach, this 3 bedroom home has a spacious sunny living area. Set on a 1339m2 section there is plenty of room for gardens and outdoor living. A double garage and carport complete this great property.",
            1788, // Westport Surrounds, Buller, West Coast
            "166a",
            "Torea Street"
        );



        // 5
        $this->createListing(
            "REST, RETIRE OR RELAX",
            "Don't miss this fabulous opportunity to own a 2 year old town house in Westports' Mountain View subdivision. It offers 3 double bedrooms/2 bathrooms and a very modern open plan kitchen/living/dining area. With high quality specifications and fittings throughout including HRV and heatpump, it's all been thought of. On a quiet back section with great fencing the internal access garage has been converted to a Hair Salon but can be changed back if required. Thinking of building?",
            1787, // Westport, Buller, Westcoast
            "40a",
            "Eastons Road"
        );




        // 6
        $this->createListing(
            "Comfortable And Spacious Villa",
            "Are you looking for a sunny, spacious modern , family home, then this could be the one for you. Centrally located with only a 5 minutes walk to the main street of Westport and supermarket. This property has been renovated to open plan living with 3 bedrooms. Heating is a multifuel burner, ceiling and underfloor insulation plus an HRV has been installed as well. There is great indoor/outdoor flow with a large deck off the living area opening to the garden.",
            1787, // Westport, Buller, Westcoast
            "95",
            "Queen Street"
        );



        // 7
        $this->createListing(
            "A Home For All Seasons",
            "This large, roomy home with two generous living spaces is ideal for families on these cooler days indoors or the warm balmy summer months outside around the in-ground pool. Well located on a very popular Onekawa street just a few minutes from the city centre! Featuring four bedrooms, two bathrooms a formal lounge and an additional separate family room it can easily accommodate the growing children's needs. So many enjoyable days have been spent in the pool or around the barbecue here. Three sets of French doors opening wide create fresh airy indoor outdoor flow from the living areas and the master bedroom. A double garage and dual driveways easily allows for extra vehicles off street. Our seller's family has left the nest; they are downsizing giving you the opportunity to acquire their loved family home. This large section has space for play, more for the vegetable garden and room for everyone. Don't think twice, take a look today.",
            1038, // Onekawa, Napier City, Hawkes Bay
            "3",
            "Anzac Avenue"
        );



        // 8
        $this->createListing(
            "Large Family Home With Options",
            "Options galore for future purchasers. This larger than most family home has room for everyone. The section is a generous 945m2 and the home 250m2 offering two lounges and two family dining areas with rimu feature ceilings and panelling. The kitchen is centrally located to the living areas and offers excellent bench space and chattels to ensure entertaining is a breeze. There is one very effective compliant log fire in the family room, and also a purpose built spa room and easy indoor-outdoor flow to the expansive patio and swimming pool. There are three double bedrooms upstairs (master ensuite) and a large double downstairs with adjoining living area and own bathroom, this would be an easy option for B & B, teenagers retreat or convert to a one bedroom self-contained flat to assist with the mortgage. The property is an appealing family home with nice street appeal, double garaging, plenty of off street parking with room for the boat or campervan. A fantastic location, close to good schools, Maadi Rd Shopping Centre and Onekawa Recreational Park. Seldom does a property like this come to the market.",
            1038, // Onekawa, Napier City, Hawkes Bay
            "27",
            "Alamein Crescent"
        );



        // 9
        $this->createListing(
            "Great Investment",
            "An ideal opportunity to purchase this low maintenance 3 bedroom home either as a rental or for mum and dad, or anyone wishing to downsize their existing property. Situated on an easy care section, with single garage this home has open plan living, spacious bathroom, separate laundry and a wide hallway giving you a sense of spaciousness. Move in and make it yours!",
             1038, // Onekawa, Napier City, Hawkes Bay
            "22A",
            "Alexander Avenue"
        );



         // 10
        $this->createListing(
            "Location, Quality, Size And Views",
            "Welcome to 359 Stuart Street tucked away in the heart of the best living in Dunedin. Only minutes from the popular Roslyn Village, Moana Pool, the best schools, CBD and the hospital and University. Priced to sell - inviting enquiries over $649,000 (GV $680,000) this wonderful home is ideally set up for a family with teenage children or indeed alternatively for semi- retirement lifestyle. Classically built in the 1950's using the best of materials (brick, tile roof, copper spouting) the 180 sqm home flows exceptionally well. Perfectly suited for entertaining, the upper level is all about living areas with open plan kitchen/dining having access to large paved sheltered and sunny patios. The well appointed kitchen has a gas cooktop, Bosch oven, double F & P dishdrawer and a Stonex bench top. A separate laundry is handily placed at the rear entrance. The dining area flows through to the huge lounge with it's magnificent uninterrupted views of the city, harbour and peninsula. A large Yunca Wedj woodburner heats this area and there is auxillary heating elsewhere with a heatpump supported by an HRV system and floor and ceiling insulation. An auxillary room (4th bedroom or office leads off the lounge and also to a small secure and private balcony with a spa where one can relax and soak in those fantastic views. The upper level also has a very sunny room beside the master bedroom which is currently being used for day living/office but also could be a 5th bedroom option. The large main bedroom has a built in wardrobe and is adjacent to an excellent bathroom. Internal stairs lead down to two more large bedrooms and the second bathroom allowing for excellent separation for guests or active teenagers. The 854 sqm established section is relatively easy care with attractive plantings creating total privacy. Off street parking is additional to the single garage with autodoor. This is a stand out property in a market currently in short supply of comparables. If you are after location, size and views contact Miles to discuss.",
            1322, // Roslyn, Dunedin City, Otago
            "359",
            "Stuart Street"
        );



        // 11
        $this->createListing(
            "Gowrie House",
            "A beautiful historic home minutes from the city centre. Nestled in the secluded and sunny Gowry Place, this four or five bedroom home will delight you. Currently run as a bed and breakfast the home has been lovingly restored by the current owner and her late husband and is now available for a new family to enjoy. On two levels the ground floor has three bedrooms and a large bathroom with shower and toilet. The main guest room opens to an enchanting cottage courtyard and garden. Upstairs there is a large living room which soaks in the sun, opening to a dining room and kitchen. The generous master bedroom is one of the most relaxing rooms in the house. Another bedroom or office and bathroom with claw foot bath complete the second floor. Off street parking for 2 cars on Gowry Place and pedestrian access from Ann Street. A private sanctuary full of character features, this home must be viewed to be fully appreciated. Please note parking on Gowry Place is limited.",
            1322, // Roslyn, Dunedin City, Otago
            "7",
            "Gowry Place"
        );



        // 12
        $this->createListing(
            "ROAMING ROOM",
            "Sited high on a hill sits this timeless Golden Home. Surrounded by glorious gardens and with uniterrupted views of the wider Bream Bay and outer islands. Four bedrooms, an office, two bathrooms and two living areas which face the all day sun. Situated central to the shopping centre, One Tree Point and Marsden Cove Marina and only a few kilometres to the surf beach.",
            1340, // Ruakaka ,  Whangarei, Northland
            "28",
            "McCathie Road"
        );



        // 13
        $this->createListing(
            "Commanding Your Attention",
            "An outstanding opportunity to secure a slice of Northland's East Coast. Set in a highly coveted coastal location on the edge of the Beach Reserve is this beautifully presented family home offering you exceptional luxury living and magnificent views. Great proximity to the white sand and gentle surf of Ruakaka Beach just a short stroll away from your garden gate.",
             1340, // Ruakaka ,  Whangarei, Northland
            "32",
            "Kihi Place"
        );



        // 14
        $this->createListing(
            "A Family Delight In Paradise Shores",
            "imagine a distinctive and convenient property that has been skillfully set up to provide accommodation options for extended family, guests and tenants. This neatly presented two storey, 179m2 home provides wonderful entertaining areas including a private sunny north deck with glimpses of the ocean perfect for alfresco lunching on those balmy autumn afternoons. If you're searching for a large home where everyone has their own space, a home that offers flexibility as the family grows from children to teenagers and beyond, then this property ticks all the boxes . Consisting of two levels, upstairs there are three bedrooms, 2 bathrooms a well set- up kitchen and a spacious lounge opening onto an excellent sheltered deck that catches all day sun (the perfect place to sit back and enjoy the warmth of the sun while taking in the views over Paradise Shores and Manaia mountain). Downstairs, and benefiting from its own entrance, you'll find a good-sized bedroom with its own bathroom and separate toilet. This accommodation could be perfect for a teenager, friends visiting or, possibly, for generating an income during the holiday high season. (The double garage is downstairs too.)",
            1340, // Ruakaka ,  Whangarei, Northland
            "24",
            "Ata-Mahina Way"
        );



        // 15
        $this->createListing(
            "BIG In More Ways Than One",
<<<'EOT'
BIG two level, 1950's brick & tile home with separate, ground level self contained accommodation
BIG park like, north facing,1760m2 section
BIG potential land bank opportunity (Res 6A currently)
BIG reputation schools (MAGS & Marist) only minutes walk
BIG opportunity!
EOT
            ,
            898, // Mount Albert, Auckland City, Auckland
            "129",
            "Taylors Road"
        );



        // 16
        $this->createListing(
            "Gosh It's Good",
<<<'EOT'
Painstakingly and professionally renovated and refurbished from foundations to roof and almost everything in between BUT WAIT, there's more.....
New double garaging, a totally re landscaped and levelled, north facing 650m2 section, fully fenced and gated, with secure access for peace of mind and privacy BUT WAIT, there's still more.....
BUT you'll need to come and see for yourself - QUICKLY!
EOT
            ,
            898, // Mount Albert, Auckland City, Auckland
            "135",
            "Taylors Road"
        );




        // 17
        $this->createListing(
            "Tiny And Trendy",
<<<'EOT'
Situated in one of Mt Albert's best streets, in a setting of mature trees and established homes is this modern, 'lock & Leave' brick unit.
The unit has been renovated to a high standard a few years ago and all you need to do is move in and enjoy it. In the winter it is nice and warm and in the summer you can open the folding doors and sit outside enjoying the summer sun, a BBQ and the company of your friends. Or if you wish to travel 'lock & leave' it and it will wait for you without much maintenance when you return. All this plus a carport just outside your door.
The current owners have enjoyed this quiet and peaceful environment, which now presents a great opportunity for first homebuyers or those looking at moving into a smaller and more manageable home. Top location; in MAGS zone and not far to Unitec. Close to transport, cafes, bars, and restaurants.
Come and view it today because it may not be on the market for long.
EOT
            ,
            898, // Mount Albert, Auckland City, Auckland
            "5/21",
            "Ruarangi Road"
        );



        // 18
        $this->createListing(
            "Life Is For Living",
<<<'EOT'
Looking for a 'lock and leave' or entry level into Mt Albert?
Then look no further than this nicely presented cedar townhouse on a private north facing site. Over two levels, this home features three bedrooms, modern kitchen, open plan living and double internal garaging.
In zone for MAGS, Gladstone and a short walk to trains and UNITEC.
EOT
            ,
            898, // Mount Albert, Auckland City, Auckland
            "3/20",
            "Fifth Avenue"
        );



        // 19
        $this->createListing(
            "Now Priced For Immediate Sale",
<<<'EOT'
Genuine urgency is now demanding that this property needs to be sold.
This presents a real opportunity to buy an executive residence in the heart of Mt Albert.

This stunning townhouse boasts double glazing throughout, four very large bedrooms, two bathrooms and en-suite, a further two large living areas and separate sunroom, topped off with double internal garaging.

With a low maintenance, easy care section, perfect for the busy family looking to enjoy their home and outside interests without huge grounds to maintain.

Zoned for Mount Albert grammar and Auckland Girls Grammar schools, and within close proximity to St. Luke's shopping center

Make no mistake; owners are exceptionally motivated to move on . . .
EOT
            ,
            898, // Mount Albert, Auckland City, Auckland
            "39",
            "St Lukes Road"
        );



        // 20
        $this->createListing(
            "Vendors Have Bought - Must Be Sold",
<<<'EOT'
Tucked away down a secluded driveway, you will find this pot of gold!
Situated right in the heart of Mt Albert, this home is within an easy walk of the village, buses and trains, and just a few minutes drive away from the shopping of Westfield - St Lukes and motorway. Zoned for several sought-after schools including Gladstone Primary, Kowhai Intermediate and Mt Albert Grammar. This is not to mention Marist College, Hebron Christian College and as an added plus, Unitec and AIS just around the corner.
This property boasts a 169 square metre floor area with three double bedrooms and two bathrooms including an ensuite.
A stunning north facing deck compliments the tranquil setting this property affords year round.

This property is ideal for families with children wanting to go to local schools or professional couple looking for properties in city fringe area. Make no mistake about it, the owners are committed elsewhere so don't delay and be sure to inspect as this home will not last.
EOT
            ,
            898, // Mount Albert, Auckland City, Auckland
            "8a",
            "Fontenoy Street"
        );



        // 21
        $this->createListing(
            "GREAT LOCATION, LOVELY VIEWS",
<<<'EOT'
his beautifully presented 1920's home is situated for superb harbour views and is located in a highly sought after part of Brooklyn. Ideal for 1st home buyers or professional couples.

Features include:

3 bedrooms
2 bathrooms
Modern kitchen
Pretty garden setting
Close to city and transport
Potential for off street parking and improvements
Wellington College zoned
EOT
            ,
            143, // Brooklyn, Wellington City, Wellington
            "52",
            "Apuka Street"
        );





        // 22
        $this->createListing(
            "Worst House Best Street - HUGE Opportunity!",
<<<'EOT'
This 1900's character home is in desperate need of some TLC but boasts views over the harbour and city, all day sun, and is located in one of Brooklyn's most desirable streets - right on the city-fringe. Features include: * Four bedrooms, open plan living, one bathroom * Elevated above the road and east to west facing for great sun and views * Enormous potential to capitalise on much needed cosmetic improvement * Significant section - extend or develop * Some original character features * Very sought after dress circle street * Single garage at the road. This is the perfect renovation project for a quick turnaround sale or to create your dream home. The owners would like it sold so view this quickly to avoid missing out. Visit www.craiglowe.co.nz for more listings & info! R.V. $590,000 Tender Details: closes 12noon Thursday 3 July 2014 at 15 Brnadon Street.
EOT
            ,
            143, // Brooklyn, Wellington City, Wellington
            "36",
            "Karepa Street"
        );



                // 23
        $this->createListing(
            "A PEACEFUL HAVEN, A VIBRANT HOME.",
<<<'EOT'
Throw open the curtains any time of day! Privacy plus and well poised for serious morning sun. Experience the true meaning of calm in quiet and serene surroundings. A modern family home, all zipped up and looking sharp, with a real sense of sanctuary will definitely appeal.

Features include:

•Three bedrooms comprising 2 doubles and a large single. The master captures the beautiful eastern sunrise and the morning warmth. Well situated for sun.
•Modern build, modern fittings and modern touches ensure a reliable home. View today to assure yourself.
•Family bathroom and separate toilet, great for busy families on the go.
•Versatile living & dining room, open plan offers a spacious entertaining area.
•Clever upgrades improve the kitchen and LED lighting in living area and kitchen keeps running costs low.
•Northeast facing deck perfectly enhances outdoor options.
•Heat-pump and insulation in the ceiling and underfloor maximise home heating and efficiency.
•Single garage, with storage space, and additional off street parking.
•Set back from the road and super private and quiet.
•The location is superb with super easy access to the city and to the Southern coastline.

This is a terrific family starter or upgrade, and will also appeal to those looking for a modern easy to tenant rental. The current owners have taken great care of this home and it is presented in excellent condition for you.
EOT
            ,
            143, // Brooklyn, Wellington City, Wellington
            "245A",
            "Mitchell Street"
        );



        // 24
        $this->createListing(
            "City-Fringe Character Home - Owners Says Sell!",
<<<'EOT'
This three bedroom 1900's character home is surrounded by native bush and enjoys panoramic views. Hard to believe you are just several minutes drive from the city. The very realistic owners have told us to get this sold. Features include: * Single level with three large double bedrooms and two bathrooms * Modern open plan living area with panoramic views * Wrap around deck provides plenty of indoor/outdoor flow * Large deck/patio area that is totally private, sheltered and sunny - ideal for summer barbeques * Almost no surrounding homes are close-by - a serene and peaceful setting away from others * Minimal maintenance of the grounds is needed * Fully fenced and safe for kids * Productive vegetable garden * Drive on access and two car-parks right by the house. This is ideal for anyone who loves privacy, but also require a convenient location that is close to the city. At this price range we expect it will go quickly. Call now to view or be at the open home this Sunday to avoid missing out. Visit www.craiglowe.co.nz for more listings & info!
EOT
            ,
            143, // Brooklyn, Wellington City, Wellington
            "123",
            "Mitchell Street"
        );
    }

    private function createListing($title, $description, $suburb_id, $street_number, $street_name, $createdBy=1)
    {
        Log::info('seeding listing with title ' . $title);


        $landFloor = $this->faker->numberBetween(80,400);

        $suburb = Suburb::find($suburb_id);





        // seed
        Listing::create([

            // add real data

            'title' => $title,
            'description' => $description,
            'suburb_id' => $suburb_id,
            'street_number' => $street_number,
            'street_name' => $street_name,

            // add generated data
            "price" => ($this->faker->numberBetween(100, 1000)*1000),
            "land" => $landFloor,
            "floor" => ceil($landFloor * .8),
            "beds" => $this->faker->numberBetween(1,6),
            "baths" => $this->faker->numberBetween(1,3),
            "cars" => $this->faker->numberBetween(1,3),

            "created_by" => $createdBy
        ]);
    }


}