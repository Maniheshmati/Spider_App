<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catagory;
class CatagoryController extends Controller
{

    public function createView(){
        return view('categories.create');
    }
    public function create(Request $request){
        Catagory::create($request->all());
        return redirect(route('catagories.show'));
    }
}
