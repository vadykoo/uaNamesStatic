<?php

namespace App\Jobs;

use App\FamousNames;
use App\Models\Area;
use App\Models\Delivery;
use App\Models\DeliveryMethod;
use App\Models\DeliveryPostcode;
use App\Models\Warehouse;
use App\Name;
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

class ImportFocusNames implements ShouldQueue
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
        $reader = Reader::createFromPath(storage_path('app') . '/names_blogers.csv');
        $reader->setHeaderOffset(0);

        $max = $reader->count();
        $status = 'блогер';
        $namesColumn = 'name'; //Name String

        foreach ($reader->getRecords() as $current => $row) {
            $gender = null;
            if (isset($row['gender'])) {
                $gender = $row['gender'];
            }
            $full_name = $row[$namesColumn];
            $full_name = explode(" ", $full_name);
            $name = Name::firstOrCreate(['name' => $full_name[0]], ['gender' => $gender]);
            $famous = FamousNames::firstOrCreate(array('name' => $full_name[0], 'last_name' => $full_name[1]), [
                'link' => $row['link'], 'img' => $row['photo'], 'status' => $status, 'name_id' => $name->id
            ]);
        }


//        Storage::disk('local')->delete('postcodes.csv');
    }
}
