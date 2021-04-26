<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

	public function loadCategory(){
        $categories = Category::all();
        return view("showCategory",['categories'=>$categories]);
    }

    public function saveCategory(Request $req){
    	$category = new Category;
        $category->categoryName = $req->name;
        $category->save();
        return redirect('/addCategory')->with('message', 'Submitted successfully!');
    }

    public function categoryDataManipulate(Request $req){
			if (isset($_POST['Update']))
			{	
				$categoryId = $req->Update;			
				$data = Category::find($categoryId);
   				return view("editCategory",['data'=>$data]);
			}
			else
			{
				$data = Category::find($req->Delete);
				$data->delete();
				return redirect('/viewCategory');
			}
    }

    public function updateCategory(Request $req){
    	$category = Category::find($req->updateButton);
	   	$category->categoryName = $req->name;
		$category->save();
		return redirect('/viewCategory');
    }

    public function searchData(Request $req){   
    	$query = $req->get('query');
	    $data = Category::where('name', 'LIKE', '%' . $query . '%')->get();
		$total_row = $data->count();
		$result = array(
			'total_data_count'  => $total_row,
			'searchData'  => $data
		);
		echo json_encode($result);
    }

}
