<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
//use DB;
class ProductController extends Controller
{

    public function loadPrimaryData(){
    	$categories = Category::all();
        return view("addProduct",['categories'=>$categories]);
    }

    public function loadProducts(){
		$products = Product::join('categories', 'products.category', '=', 'categories.id')
               ->get(['products.*', 'categories.categoryName']);
     	return view("showProduct", ['products'=>$products]);

    }

    public function saveProduct(Request $req){
    	$product = new Product;
        $product->productName = $req->name;
        $product->category = $req->category;
        $product->description = $req->description;
        $product->price = $req->price;
        $product->save();
        return redirect('/addProduct')->with('message', 'Submitted successfully!');
    }

    public function productDataManipulate(Request $req){
			if (isset($_POST['Update']))
			{	
				$productId = $req->Update;			
				$data = Product::find($productId);
				$categories = Category::all();
   				return view("editProduct",['data'=>$data,'categories'=>$categories]);
			}
			else
			{
				$data = Product::find($req->Delete);
				$data->delete();
				return redirect('/viewProduct');
			}
    }

    public function updateProduct(Request $req){
    	$product = Product::find($req->updateButton);
	   	$product->productName = $req->name;
        $product->description = $req->description;
        $product->price = $req->price;
		$product->save();
		return redirect('/viewProduct');
    }

    public function searchData(Request $req){   
    	 $query = $req->get('query');
		     $data = Product::where('name', 'LIKE', '%' . $query . '%')
		     	->orWhere('description', 'like', '%'.$query.'%')
		     	->orWhere('price', 'like', '%'.$query.'%')	
		     	->get();
			$total_row = $data->count();
			$result = array(
				'total_data_count'  => $total_row,
				'searchData'  => $data
			);
			echo json_encode($result);
    }

}
