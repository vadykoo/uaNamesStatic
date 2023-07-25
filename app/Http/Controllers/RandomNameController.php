<?php

namespace App\Http\Controllers;

// app/Http/Controllers/RandomNameController.php

use App\Http\Controllers\Controller;
use App\Name; // Replace 'Name' with your actual model name for names

class RandomNameController extends Controller
{
    public function show($gender)
    {
        $randomName = Name::where('gender', ($gender === 'boy' ? 1 : 2))->inRandomOrder()->first();

        return response()->json([
            'name' => $randomName->name, // Adjust the field name according to your model
        ]);
    }
}

