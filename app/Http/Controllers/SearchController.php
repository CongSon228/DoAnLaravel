<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CategoryEloquentRepository;
use App\Repositories\interfaces\CategoryRepositoryInterface;
use App\Repositories\ProductEloquentRepository;
use App\Repositories\interfaces\ProductRepositoryInterface ;
use App\Repositories\TypeEloquentRepository;
use App\Repositories\interfaces\TypeRepositoryInterface ;
use App\Repositories\SlideBarEloquentRepository;
use App\Repositories\interfaces\SlideBarRepositoryInterface ;
use DB;

class SearchController extends Controller
{
    protected $cateRepository;
    protected $typeRepository;
    protected $proRepository;
    protected $slideRepository;

    public function __construct(CategoryRepositoryInterface $cateRepository, TypeRepositoryInterface $typeRepository ,ProductRepositoryInterface $proRepository,SlideBarEloquentRepository $slideRepository){
        $this->category = $cateRepository;
        $this->type = $typeRepository;
        $this->product = $proRepository;
        $this->slide = $slideRepository;
    }
    public function getSearch(Request $request){
        $slide = $this->slide->getAll();
        $cate = $this->category->getAll();
        $type = $this->type->getAll();
        $productID = $this->product->getAll();
        $search_product = $this->product->search($request);
        return view('pages.search', compact('cate','type','slide','search_product','productID'));
    }
}
