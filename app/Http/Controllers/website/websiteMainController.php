<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class websiteMainController extends Controller
{
    public function __construct()
    {
       // $this->middleware('auth');
    }

    public function index()
    {	
    	$get_cat = DB::table('categories')
                 ->where('categories.is_deleted',0)
                 ->get();
    	$get_subCat = DB::table('subcategories')
                 ->where('subcategories.is_deleted',0)
                 ->get();
        return view('website.index',compact('get_cat','get_subCat'));
    }


    //all services
    public function allService(){
      $count_service = DB::table('services')->where('services.is_deleted',0)->where('is_approved',1)->count();
      $get_service = DB::table('services')
                  ->leftJoin('categories','services.category_no','categories.category_no')
                  ->leftJoin('subcategories','services.subcategory_no','subcategories.subcategory_no')
                  ->leftJoin('service_types','services.service_type_no','service_types.service_type_no')
                  ->select('services.*','categories.category_name','subcategories.sub_category_name','service_types.service_type_name')
                  ->where([
                    ['services.is_deleted',0],
                    ['services.is_approved',1],
                    ['categories.is_deleted',0],
                    ['subcategories.is_deleted',0]
                  ])
                  ->orderBy('services.service_no', 'DESC')
                ->get();

        return view('website.service',compact('get_service','count_service'));
    }



    //category & subcategory wise service
   	public function service($slug,$id){
      $scate_id=DB::table('categories')->where('category_no',$id)->where('category_slug',$slug)->first();
      $subcate_id=DB::table('subcategories')->where('subcategory_no',$id)->where('sub_category_slug',$slug)->first();
      if( $scate_id){
        $count_service = DB::table('services')->where('services.is_deleted',0)->where('category_no',$scate_id->category_no)->count();
        $get_service = DB::table('services')
                  ->leftJoin('categories','services.category_no','categories.category_no')
                  ->leftJoin('subcategories','services.subcategory_no','subcategories.subcategory_no')
                  ->leftJoin('service_types','services.service_type_no','service_types.service_type_no')
                  ->select('services.*','categories.category_name','subcategories.sub_category_name','service_types.service_type_name')
                  ->where([
                    ['services.is_deleted',0],
                    ['services.is_approved',1],
                    ['categories.is_deleted',0],
                    ['subcategories.is_deleted',0],
                    ['services.category_no',$scate_id->category_no]
                  ])
                  ->orderBy('services.service_no', 'DESC')
                ->get();

        return view('website.service',compact('get_service','count_service'));
     }else{
       $count_service = DB::table('services')->where('services.is_deleted',0)->where('subcategory_no',$subcate_id->subcategory_no)->count();
       $get_service = DB::table('services')
            ->leftJoin('categories','services.category_no','categories.category_no')
            ->leftJoin('subcategories','services.subcategory_no','subcategories.subcategory_no')
            ->leftJoin('service_types','services.service_type_no','service_types.service_type_no')
          ->select('services.*','categories.category_name','subcategories.sub_category_name','service_types.service_type_name')
          ->where([
                ['services.is_deleted',0],
                ['services.is_approved',1],
                ['categories.is_deleted',0],
                ['subcategories.is_deleted',0],
                ['services.subcategory_no',$subcate_id->subcategory_no]
            ])
            ->orderBy('services.service_no', 'DESC')
          ->get();

      return view('website.service',compact('get_service','count_service'));
     }
      
   	}

    //service details
    public function serviceDlt($slug,$id){
      $service_dlt = DB::table('services')
                  ->leftJoin('categories','services.category_no','categories.category_no')
                  ->leftJoin('subcategories','services.subcategory_no','subcategories.subcategory_no')
                  ->leftJoin('service_types','services.service_type_no','service_types.service_type_no')
                  ->select('services.*','categories.category_name','subcategories.sub_category_name','service_types.service_type_name')
                  ->where([
                    ['services.is_deleted',0],
                    ['services.is_approved',1],
                    ['services.service_no',$id]
                  ])
                ->first();
      return view('website.service-details',compact('service_dlt'));
    }

}
