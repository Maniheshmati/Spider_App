<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catagory;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Calculation\Category;


class CatagoryController extends Controller
{

    public function createView(){
        return view('categories.create');
    }
    public function create(Request $request){
        Catagory::create($request->all());
        return redirect(route('categories.show'));
    }
    public function delete(Request $request){
        DB::table('posts')->where('category_id', '=', $request->id)->delete();
        $category = Catagory::findOrFail($request->id);
        $category->delete();
        return redirect(route('categories.show'));
    }
}

