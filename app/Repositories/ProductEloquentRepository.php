<?php



namespace App\Repositories;
use App\Repositories\EloquentRepository;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use DB;
use Illuminate\Http\Request;
use App\Product;

class ProductEloquentRepository extends EloquentRepository implements ProductRepositoryInterface
{
/**
* get model
* @return string
*/
public function getModel()
	{
		return \App\Models\Product::class;
	}
	public function search(Request $request){
		$keyword = $request->keyword_submit;
		$search = DB::table('products')	
        ->join('types','type_id','=','types.id')
        ->join('categories','category_id','=','categories.id')
        ->where('proName','like','%'.$keyword.'%')->orWhere('price','like','%'.$keyword.'%')
        ->orWhere('typeName','like','%'.$keyword.'%')->orWhere('catName','like','%'.$keyword.'%')->get();
		return $search;
	}
}
