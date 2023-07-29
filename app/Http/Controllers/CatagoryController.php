<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catagory;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Calculation\Category;
use Mani\Posts\HandleCategory;


class CatagoryController extends Controller
{
    protected $category;

    public function __construct(HandleCategory $category){
        $this->category = $category;
    }

    public function createView(){
        return view('categories.create');
    }
    public function create(Request $request){

        $response = $this->category->create($request);
        if($response == "Successfully created"){
            return redirect()->route('categories.show');
        }
        else{
            return abort(500);
        }

    }
    public function delete(Request $request){
        $response = $this->category->delete($request);
        if($response== true){
            return redirect()->route('categories.show');
        }
        else{
            return abort(404);
        }
    }

    public function updateView(){
        return view('categories.update');
    }
    public function update(Request $request){
            $response = $this->category->update($request);
            if($response == true){
                return redirect()->route('categories.show');
            }
            else{
                return abort(404);
            }

        }

    }


