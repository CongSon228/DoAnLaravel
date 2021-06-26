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

class PageController extends Controller
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
    public function index(){
        return view('layout.index');
    }
    public function menu(){
        $slide = $this->slide->getAll();
        $cate = $this->category->getAll();
        $type = $this->type->getAll();
        $product = $this->product->getAll();
        return view('layout.index', compact('cate','type','product','slide'));
    }
    public function getCategory($id){
        $slide = $this->slide->getAll();
        $cateID = $this->category->find($id);
        $cate = $this->category->getAll();
        $type = $this->type->getAll();
        $product = $this->product->getAll();
        return view('pages.category', compact('cate','type','product','cateID','slide'));
    }
    public function getType($id){
        $slide = $this->slide->getAll();
        $typeID = $this->type->find($id);
        $cate = $this->category->getAll();
        $type = $this->type->getAll();
        $product = $this->product->getAll();
        return view('pages.type', compact('cate','type','product','typeID','slide'));
    }
    public function getProduct($id){
        $slide = $this->slide->getAll();
        $productID = $this->product->find($id);
        $cate = $this->category->getAll();
        $type = $this->type->getAll();
        $product = $this->product->getAll();
        return view('pages.product', compact('cate','type','product','productID','slide'));
    }
}
