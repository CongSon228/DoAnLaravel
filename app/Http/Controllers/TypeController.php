<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Repositories\CategoryEloquentRepository;
use App\Repositories\interfaces\CategoryRepositoryInterface;
use App\Repositories\TypeEloquentRepository;
use App\Repositories\interfaces\TypeRepositoryInterface;

class TypeController extends Controller
{
    protected $cateRepository;
    protected $typeRepository;

    public function __construct(CategoryRepositoryInterface $cateRepository,TypeRepositoryInterface $typeRepository){
        $this->category = $cateRepository;
        $this->type = $typeRepository;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeList = $this->type->getAll();
        return view('admin.Type.index', compact('typeList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $CategoryID = $this->category->getAll();
        return view('admin.Type.create', compact('CategoryID'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $CategoryID = $this->category->getAll();
        $data = array();
        $data['typeName'] = $request->type_name;
        $data['show'] = $request->show;
        $data['category_id'] = $request->category_id;
        $data['created_at'] = Carbon::now();        
        $data['updated_at'] = Carbon::now();
        $this->type->create($data);
        $message = "Create Success";
        if($data == null){
            $message = "Create Failed";
        }

        return redirect()->route('type.index')->with('message', $message);
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
        $CategoryID = $this->category->getAll();
        $data  = $this->type->find($id)->first();
        return view('admin.Type.edit', compact('data','CategoryID'));
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
        $data  = $this->type->find($id)->first();
        $bool = array();
        $bool['typeName'] = $request->type_name;
        $bool['show'] = $request->show;
        $bool['category_id'] = $request->category_id;
        $bool = $data->update($bool);
        $message = "Update Success";
        if($bool == null){
            $message = "Update Failed";
        }

        return redirect()->route('type.index')->with('message', $message);
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
        if(!($this->type->delete($id))){
            $message = "Delete Failed";
        }

        return redirect()->route('type.index')->with('message', $message);
    }
}   