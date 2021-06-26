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
use Session;

class CartController extends Controller
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
    public function gioHang(Request $request){
        $meta_desc = 'Giỏ hàng của bạn';
        $meta_keyword = 'Giỏ hàng Ajax';
        $meta_title = 'Giỏ hàng';
        $url_canonical = $request->url();
        $slide = $this->slide->getAll();
        $cate = $this->category->getAll();
        $type = $this->type->getAll();
        return view('pages.giohang', compact('cate','type','slide','meta_desc','url_canonical','meta_keyword','meta_title'));
    }
    public function addCart(Request $request){
        $data = $request->all();
        $session_id = substr(md5(microtime()),rand(0,26),5);
        $cart = Session::get('cart');
        if($cart==true){
                $is_avaiable = 0;
                if($is_avaiable == 0){
                $cart[] = array(
                'session_id' => $session_id,
                'proName' => $data['cart_product_name'],
                'id' => $data['cart_product_id'],
                'image' => $data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],
                'price' => $data['cart_product_price'],
                );
                Session::put('cart',$cart);
            }
        }else{
            
                $cart[] = array(
                    'session_id' => $session_id,
                    'proName' => $data['cart_product_name'],
                    'id' => $data['cart_product_id'],
                    'image' => $data['cart_product_image'],
                    'product_qty' => $data['cart_product_qty'],
                    'price' => $data['cart_product_price'],
                    );
                Session::put('cart',$cart);
            }
            
        Session::save();
            
    }
    public function delCart($session_id){
        $cart = Session::get('cart');
        if($cart==true){
            foreach($cart as $key =>$val){
                if($val['session_id']==$session_id){
                    unset($cart[$key]);
                }
            }
            Session::put('cart', $cart);
            return redirect()->back();
        }
        else{
            return redirect()->back();
        }
    }
    public function updateCart(Request $request){
        $data = $request->all();
        $cart = Session::get('cart');
        if($cart==true){
            foreach($data['cart_qty'] as $key =>$qty){
                foreach($cart as $session =>$val){
                    if($val['session_id']==$key){
                        $cart[$session]['product_qty']=$qty;
                    }
                }
            }
            Session::put('cart',$cart);
            return redirect()->back();
        }
        else{
            return redirect()->back();
        }
    }
    public function delAllCart(){
        $cart = Session::get('cart');
        if($cart==true){
            Session::forget('cart');
            return redirect()->back();
        }
    }
}