<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Repositories\ProductEloquentRepository;
use App\Repositories\interfaces\ProductRepositoryInterface;
use App\Repositories\TypeEloquentRepository;
use App\Repositories\interfaces\TypeRepositoryInterface;
class ProductController extends Controller
{
    protected $proRepository;
    protected $typeRepository;

    public function __construct(ProductRepositoryInterface $proRepository,TypeRepositoryInterface $typeRepository){
        $this->product = $proRepository;
        $this->type = $typeRepository;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proList = $this->product->getAll();
        return view('admin.Product.index', compact('proList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeID = $this->type->getAll();
        return view('admin.Product.create', compact('typeID'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $typeID = $this->type->getAll();
        $data = array();
        $data['proName'] = $request->pro_name;
        $data['price'] = $request->price;
        $data['image'] = $request->image;
        $data['content'] = $request->content;
        $data['type_id'] = $request->type_ID;
        $data['created_at'] = Carbon::now();        
        $data['updated_at'] = Carbon::now();
        $this->product->create($data);
        $message = "Create Success";
        if($data == null){
            $message = "Create Failed";
        }

        return redirect()->route('product.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $typeID = $this->type->getAll();
        $data  = $this->product->find($id)->first();
        return view('admin.Product.edit', compact('data','typeID'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data  = $this->product->find($id)->first();
        $bool = array();
        $bool['proName'] = $request->pro_name;
        $bool['price'] = $request->price;
        $bool['image'] = $request->image;
        $bool['content'] = $request->content;
        $bool['type_id'] = $request->type_ID;
        $bool = $data->update($bool);
        $message = "Update Success";
        if($bool == null){
            $message = "Update Failed";
        }

        return redirect()->route('product.index')->with('message', $message);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = "Delete Success";
        if(!($this->product->delete($id))){
            $message = "Delete Failed";
        }

        return redirect()->route('product.index')->with('message', $message);
    }
}
