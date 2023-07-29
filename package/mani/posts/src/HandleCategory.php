<?php

namespace Mani\Posts;

use App\Models\Post;
use App\Models\Catagory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class HandleCategory{
	public function create($request){
		Catagory::create($request->all());
        return "Successfully created";
	}

	public function delete($request){

		DB::table('posts')->where('category_id', '=', $request->id)->delete();
        $category = Catagory::findOrFail($request->id);
        $category->delete();
        return true;

	}

	public function update($request){
		 $category = Catagory::findOrFail($request->id);
        if($request->category_name){
            $category->name = $request->category_name;
            $category->save();
           	return true;
	}
}
}