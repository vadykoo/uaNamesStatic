<?php

namespace App\Http\Controllers;

use App\FamousNames;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Carbon\Carbon;
use App\Name;

class NameController extends Controller
{
    public function index()
    {


        $letters = Name::selectRaw('substr(name,1,1) as first')->pluck('first')->unique()->toArray();

// remove duplicates
        array_unique($letters);

// you may want to sort the letters as well
        array_unique($letters, SORT_LOCALE_STRING);

// and you may want to reset the keys
        array_values(array_unique($letters, SORT_LOCALE_STRING));
        $letters;
        return view('name.home.home')->with(['boy_letters' => $letters, 'girl_letters' => $letters]);
    }

    public function boysalphabate($alphabate)
    {
        $names = Name::where('gender', 1)->where('name', 'like', $alphabate . "%")->get();
        $famousPeoples = FamousNames::whereIn('name_id', $names->pluck('id'))->get();
        return view('name.boys.boys', compact('names', 'famousPeoples'));
    }

    public function girlsalphabate($alphabate)
    {
        $names = Name::where('gender', 2)->where('name', 'like', $alphabate . "%")->with('famousPeoples')->get();
        return view('name.girls.girls', compact('names'));
    }

    public function girls()
    {
        $names = Name::where('gender', 2)->orderBy('name', 'asc')->get();
        return view('name.girls.girls', compact('names'));
    }

    public function boys()
    {
        $names = Name::where('gender', 1)->orderBy('name', 'asc')->get();
        return view('name.boys.boys', compact('names'));
    }

    public function login()
    {
        return view('name.login.login');
    }

    public function namedetails($slug)
    {
        $name = Name::where('slug', $slug)->with('famousPeoples')->first();
        return view('name.namedetails.namedetails', compact('name'));
    }

    public function nameview()
    {
        return view('name.backend.nameinsertview');
    }

    public function nameinsert(Request $request)
    {
        $request->validate([
            'name' => 'unique:names,name'
        ]);
        Name::insert([
            "name" => $request->name,
            "gender" => $request->gender,
            "origin" => $request->origin,
            "english_meaning" => $request->english_meaning,
            "ukrainian_meaning" => $request->ukrainian_meaning,
            "created_at" => Carbon::now()
        ]);
        return back()->with('status', 'Name Added Successfully!');
    }

    public function search(Request $request)
    {
        $search_string = $request->search_string;
        $names = Name::where('name', 'like', "%" . $search_string . "%")->get();
        return view('name.search', compact('names'));
    }
}
