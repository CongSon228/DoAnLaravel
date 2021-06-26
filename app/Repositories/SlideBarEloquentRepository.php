<?php



namespace App\Repositories;
use App\Repositories\EloquentRepository;
use App\Repositories\Interfaces\SlideBarRepositoryInterface;
use DB;
use Illuminate\Http\Request;
use App\Slidebar;

class SlideBarEloquentRepository extends EloquentRepository implements SlideBarRepositoryInterface
{
/**
* get model
* @return string
*/
public function getModel()
	{
		return \App\Models\Slidebar::class;
	}
}
