<?php

namespace App\Jobs;

use App\Models\Area;
use App\Models\Delivery;
use App\Models\DeliveryMethod;
use App\Models\DeliveryPostcode;
use App\Models\Warehouse;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use League\Csv\Reader;
use Illuminate\Support\Facades\Storage;

/*
 * Working for update prices with a table when all postcodes already exist in db
 * https://docs.google.com/spreadsheets/d/1ZLJCxs_TYdgtMK4_6Y-gmNX0ASW5DxrABJomljP4jq8/edit#gid=1157870643
 */

class ImportDeliveryPostcodes implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $reader = Reader::createFromPath(storage_path('app') . '/postcodes.csv');
        $reader->setHeaderOffset(0);

        $max = $reader->count();

        $postcodesColumn = 'POSTCODE & DISTRICT'; //Name String
        $priceColumns = ['Camion', 'Gondola'];
        $IsItBothwayPrices = false;
        $IsOneWayDeliveryAvailable = false;
        $categories = array();
        foreach ($reader->getRecords() as $current => $row) {
//            if (strlen($row['WAREHOUSE']) > 1) {
//                $warehouse = Warehouse::where('name', strtoupper($row['WAREHOUSE']))->first();
//                if ($warehouse) {
//                    $area = Area::updateOrCreate(
//                        ['name' => $row['AREA']],
//                        ['warehouse_id' => $warehouse->id]
//                    );
//                }
//            }

            if (strlen($row[$postcodesColumn]) < 6 and strlen($row[$postcodesColumn]) > 1) {
                $area = Area::firstOrCreate(array('name' => $row['AREA']));

                if (!$area) {
                    $area = new Area();
                    $area->name = $row['AREA'];
                    $area->save();
                }

//                $postcode = DeliveryPostcode::where('district', $row[$postcodesColumn])
//                    ->where('area_id' , $area->id)
//                    ->first();
//
//                if (!$postcode) {
//                    dd($row[$postcodesColumn], 'postcode do not exist');
//                }

                $postcode = DeliveryPostcode::firstOrCreate(['district' => $row[$postcodesColumn], 'area_id' => $area->id]);

                foreach ($priceColumns as $priceColumn) {
                    $price = str_replace("£", "", $row[$priceColumn]);
                    $price = str_replace("€", "", $price);

                    $delivery = Delivery::where('name', $priceColumn)->first();
                    if(!$delivery){
                        dd('delivery method not found');
                    }

                    $postcode->deliveryMethod()->updateOrCreate([
                        'delivery_postcode_id' => $postcode->id,
                        'both_ways_delivery_enabled' => true,
                        'warehouse_id' => null,
                        'delivery_id' => $delivery->id
                    ],
                    [       'location_to_depot' => $IsItBothwayPrices ? $price/2 : $price,
                            'depot_to_location' => $IsItBothwayPrices ? $price/2 : $price,
                            'both_ways_delivery' => $IsItBothwayPrices ? $price : $price*2
                    ]
                    );
                }


//                if (!$postcode->deliveryMethod()->first()) {
//                    dd($postcode, 'delivery method do not exist');
//                }
                //postcode can have multiple methods, all of them will be updated
//                        $postcode->deliveryMethod()->update([
//                            'location_to_depot' => str_replace("£", "", $row['PRICE']),
//                            'depot_to_location' => str_replace("£", "", $row['PRICE']),
//                            'both_ways_delivery' => str_replace("£", "", $row['FINAL BOTH WAYS']),
//                            'delivery_postcode_id' => $postcode->id,
//                            'both_ways_delivery_enabled' => true,
//                            'warehouse_id' => null,
//                            'delivery_id' => ''
//                        ]);
            }
        }

//        Storage::disk('local')->delete('postcodes.csv');
    }
}
