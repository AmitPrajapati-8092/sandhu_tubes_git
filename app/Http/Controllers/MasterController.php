<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\InventoryLocation;
use DB;
use Auth;
use Response;
use App\conversion;
use App\Org_Relation;
use App\Org_Contact;
use App\Org_Designation;
use App\module;
use App\user_permission;
use App\User;
use App\item;
use App\MetalScrap;
use App\FinishedGoodsType;
use App\Uom;
use App\InvisibleLossPercentage;
use App\Grade;
use App\YieldPercentage;




class MasterController extends Controller
{

/* Category */
	public function Category_Listing()
	{
		if (Auth::check() && Auth::user()->users_role != 1) {
            $land_permission = Session::get('all_module_permission');
            foreach ($land_permission as $key => $value_land) {
                if ($value_land['permission_value'] == 2) {
                $module_permission = $value_land;
                }
            }
		}

		$userData = DB::table('users')->get();
		$categorytData = DB::table('category')
		->get();
		$data['content'] = 'master.category';
		return view('layouts.content', compact('data'))->with(['categorytData' => $categorytData, 'userData' => $userData,'module_permission'=> @$module_permission]);
	}

	public function Add_Category(Request $request)
	{        
		$data = array(
			'category_name' => $request->category_name,
			'description' => $request->description,
			'process' => $request->process,
			'is_active' => $request->is_active,
			'created_at' => date('Y-m-d H:i:s'),
		);

		if($request->ids != ''){
			Session::flash('success', 'Updated Successfully..!');
			$Updatedepartment = DB::table('category')->where('id', $request->ids)->update($data);
			return back();
		}else{
			Session::flash('success', 'Inserted Successfully..!');
			$Adddepartment = DB::table('category')->insert($data);
			return back();
		}
	}

	public function Category_Edit(Request $request,$id)
	{
		$data =  DB::table('category')->where('id', $id)->first();
		if($data) {
			return Response::json($data);
		}
	}

	public function Delete_Category (Request $request,$id)
	{
		Session::flash('error', 'Deleted Successfully..!');
		$delete = DB::table('category')->where('id', '=', $id)->delete();
		return back();
	}
	/* uom master*/
	public function Uom_Listing(Request $request)
	{
		if (Auth::check() && Auth::user()->users_role != 1) {
            $land_permission = Session::get('all_module_permission');
            foreach ($land_permission as $key => $value_land) {
                if ($value_land['permission_value'] == 2) {
                $module_permission = $value_land;
                }
            }
		}
		$uomData = DB::table('uom')->get();
	    $data['content'] = 'master.indexuom';
		return view('layouts.content', compact('data'))->with(['uomData' => $uomData,'module_permission'=> @$module_permission]);
	}

	public function Add_Uom(Request $request)
	{        
		$data = array(
			'uom_name' => $request->uom_name,
			'uom_description' => $request->uom_description,
			// 'uom_type' => $request->uom_type,
			'status' => $request->is_active,
			'created_at' => date('Y-m-d H:i:s'),
			'created_by' => 1,
			'updated_by' => 1,

		);

		if($request->ids != ''){
			Session::flash('success', 'Updated Successfully..!');
			$Updatepmaterials = DB::table('uom')->where('id', $request->ids)->update($data);
			return back();
		}else{
			Session::flash('success', 'Inserted Successfully..!');
			$Addmaterials= DB::table('uom')->insert($data);
			return back();
		}
	}

	public function Uom_Edit(Request $request,$id)
	{
		$data =  DB::table('uom')->where('id', $id)->first();
		if($data) {
			return Response::json($data);
		}
	}


	public function Delete_Uom(Request $request,$id)
	{		
			Session::flash('error', 'Deleted Successfully..!');
			$delete = DB::table('uom')->where('id', '=', $id)->delete();
			return back();
				
	}


	/* Department*/
	public function Department_Listing(Request $request)
	{
		if (Auth::check() && Auth::user()->users_role != 1) {
            $land_permission = Session::get('all_module_permission');
            foreach ($land_permission as $key => $value_land) {
                if ($value_land['permission_value'] == 6) {
                $module_permission = $value_land;
                }
            }
		}
		$userData = DB::table('users')->get();
		$departmentData = DB::table('departments')
		->get();
		$data['content'] = 'master.department';
		return view('layouts.content', compact('data'))->with(['departmentData' => $departmentData, 'userData' => $userData,'module_permission'=> @$module_permission]);
	}

	public function Add_Department(Request $request)
	{        
		$data = array(
			'department_name' => $request->department_name,
			'description' => $request->description,
			'is_active' => $request->is_active,
			'created_at' => date('Y-m-d H:i:s'),
		);

		if($request->ids != ''){
			Session::flash('success', 'Updated Successfully..!');
			$Updatedepartment = DB::table('departments')->where('id', $request->ids)->update($data);
			return back();
		}else{
			Session::flash('success', 'Inserted Successfully..!');
			$Adddepartment = DB::table('departments')->insert($data);
			return back();
		}
	}

	public function Department_Edit(Request $request,$id)
	{
		$data =  DB::table('departments')->where('id', $id)->first();
		if($data) {
			return Response::json($data);
		}
	}

	public function Delete_Department(Request $request,$id)
	{
		Session::flash('error', 'Deleted Successfully..!');
		$delete = DB::table('departments')->where('id', '=', $id)->delete();
		return back();
	}
    ///...................................................Start Master For conversions............................................  
    public function Convertion_index()
    {
		if (Auth::check() && Auth::user()->users_role != 1) {
            $land_permission = Session::get('all_module_permission');
            foreach ($land_permission as $key => $value_land) {
                if ($value_land['permission_value'] == 6) {
                $module_permission = $value_land;
                }
            }
        }
     

        $result_convertion = conversion::orderBy('id', 'DESC')
                                    ->get();
     
        $get_to_uom_name = Uom::where('status',1)->select('uom_name','id')->get();
      
        foreach($result_convertion as $data)
        {
           
            $data->from_si_unit = Uom::where('id','=',$data->from_si_unit)->value('uom_name');
           
            $data->to_si_unit = Uom::where('id','=',$data->to_si_unit)->value('uom_name');

          
        }

                             
        $data['content'] = 'master.convertion';
        return view('layouts.content', compact('data'))->with(['result_convertion'=> $result_convertion,'get_to_uom_name'=>$get_to_uom_name,'module_permission'=> @$module_permission]);
    }

    public function Convertion_Add(Request $request)
    {
        // return $request;

        $data = array(
            'from_si_unit' => $request->from_si_unit,
            'to_si_unit' =>  $request->to_si_unit,
            'multiplication_value' => $request->multiplication_value,
            'status' => $request->status,
        );

        if ($request->ids != '') {
            Session::flash('success', 'Updated Successfully..!');
            $updatedata = DB::table('conversion')->where('id', $request->ids)->update($data);
            return back();
        } else {
            Session::flash('success', 'Inserted Successfully..!');
            $insertdata = DB::table('conversion')->insert($data);
            return back();
        }
    }

    public function Convertion_Edit(Request $request, $id)
    {
        $data =  DB::table('conversion')->where('id', $id)->first();
        if ($data) {
            return Response::json($data);
        }
    }


    public function Convertion_destroy(Request $request, $id)
    {
        Session::flash('error', 'Deleted Successfully..!');
        $delete = DB::table('conversion')->where('id', '=', $id)->delete();
        return back();
    }
    ///........................................................End Master For conversions...............................................  



 ///...................................................Start Master For Metal Scrap............................................  
 public function metal_scrap_index()
 {
     if (Auth::check() && Auth::user()->users_role != 1) {
         $land_permission = Session::get('all_module_permission');
         foreach ($land_permission as $key => $value_land) {
             if ($value_land['permission_value'] == 6) {
             $module_permission = $value_land;
             }
         }
     }
     $result_metal_scrap = MetalScrap::orderBy('id', 'DESC')->get()->toArray();

     $data['content'] = 'master.metal_scrap';
     return view('layouts.content', compact('data'))->with(['result_metal_scrap'=> $result_metal_scrap,'module_permission'=> @$module_permission]);
 }

 public function metal_scrap_Add(Request $request)
 {
    //  return $request;
     $data = array(
         'metal_scrap_name' => $request->metal_scrap_name,
         'description' =>  $request->description,
        
         'status' => $request->status,
        
     );

     if ($request->ids != '') {
         Session::flash('success', 'Updated Successfully..!');
         $updatedata = DB::table('metal_scrap')->where('id', $request->ids)->update($data);
         return back();
     } else {
         Session::flash('success', 'Inserted Successfully..!');
         $insertdata = DB::table('metal_scrap')->insert($data);
         return back();
     }
 }

 public function metal_scrap_Edit(Request $request, $id)
 {
     $data =  DB::table('metal_scrap')->where('id', $id)->first();
     if ($data) {
         return Response::json($data);
     }
 }


 public function metal_scrap_destroy(Request $request, $id)
 {
     Session::flash('error', 'Deleted Successfully..!');
     $delete = DB::table('metal_scrap')->where('id', '=', $id)->delete();
     return back();
 }
 ///........................................................End Master For Metal Scrap...............................................  

 ///...................................................Start Grade............................................  
 public function grade_index()
 {
     if (Auth::check() && Auth::user()->users_role != 1) {
         $land_permission = Session::get('all_module_permission');
         foreach ($land_permission as $key => $value_land) {
             if ($value_land['permission_value'] == 6) {
             $module_permission = $value_land;
             }
         }
     }
     $result_grade = Grade::orderBy('id', 'DESC')->get()->toArray();

     $data['content'] = 'master.grade';
     return view('layouts.content', compact('data'))->with(['result_grade'=> $result_grade,'module_permission'=> @$module_permission]);
 }

 public function grade_Add(Request $request)
 {
    
     $data = array(
         'grade' => $request->grade,
         'description' =>  $request->description,
        
         'status' => $request->status,
        
     );

     if ($request->ids != '') {
         Session::flash('success', 'Updated Successfully..!');
         $updatedata = DB::table('grade')->where('id', $request->ids)->update($data);
         return back();
     } else {
         Session::flash('success', 'Inserted Successfully..!');
         $insertdata = DB::table('grade')->insert($data);
         return back();
     }
 }

 public function grade_Edit(Request $request, $id)
 {
     $data =  DB::table('grade')->where('id', $id)->first();
     if ($data) {
         return Response::json($data);
     }
 }


 public function grade_destroy(Request $request, $id)
 {
     Session::flash('error', 'Deleted Successfully..!');
     $delete = DB::table('grade')->where('id', '=', $id)->delete();
     return back();
 }
 ///........................................................End Master For Grade...............................................  

 ///...................................................Start Yield Percentage............................................  
 public function yield_percentage_index()
 {
     if (Auth::check() && Auth::user()->users_role != 1) {
         $land_permission = Session::get('all_module_permission');
         foreach ($land_permission as $key => $value_land) {
             if ($value_land['permission_value'] == 6) {
             $module_permission = $value_land;
             }
         }
     }
     $result_yield_percentage = YieldPercentage::orderBy('id', 'DESC')->get()->toArray();

     $data['content'] = 'master.yield_percentage';
     return view('layouts.content', compact('data'))->with(['result_yield_percentage'=> $result_yield_percentage,'module_permission'=> @$module_permission]);
 }

 public function yield_percentage_Add(Request $request)
 {
    
     $data = array(
         'yield_percentage' => $request->yield_percentage,
         'description' =>  $request->description,
        
         'status' => $request->status,
        
     );

     if ($request->ids != '') {
         Session::flash('success', 'Updated Successfully..!');
         $updatedata = DB::table('yield_percentage')->where('id', $request->ids)->update($data);
         return back();
     } else {
         Session::flash('success', 'Inserted Successfully..!');
         $insertdata = DB::table('yield_percentage')->insert($data);
         return back();
     }
 }

 public function yield_percentage_Edit(Request $request, $id)
 {
     $data =  DB::table('yield_percentage')->where('id', $id)->first();
     if ($data) {
         return Response::json($data);
     }
 }


 public function yield_percentage_destroy(Request $request, $id)
 {
     Session::flash('error', 'Deleted Successfully..!');
     $delete = DB::table('yield_percentage')->where('id', '=', $id)->delete();
     return back();
 }
 ///........................................................End Master For Yield Percentage...............................................  


 ///...................................................Start Master For Finished Goods Type............................................  
 public function finished_goods_type_index()
 {
     if (Auth::check() && Auth::user()->users_role != 1) {
         $land_permission = Session::get('all_module_permission');
         foreach ($land_permission as $key => $value_land) {
             if ($value_land['permission_value'] == 6) {
             $module_permission = $value_land;
             }
         }
     }
     $result_finished_goods_type = FinishedGoodsType::orderBy('id', 'DESC')->get()->toArray();

     $data['content'] = 'master.finished_goods_type';
     return view('layouts.content', compact('data'))->with(['result_finished_goods_type'=> $result_finished_goods_type,'module_permission'=> @$module_permission]);
 }

 public function finished_goods_type_Add(Request $request)
 {
    //  return $request;
     $data = array(
         'finished_goods_type_name' => $request->finished_goods_type_name,
         'description' =>  $request->description,
        
         'status' => $request->status,
        
     );

     if ($request->ids != '') {
         Session::flash('success', 'Updated Successfully..!');
         $updatedata = DB::table('finished_goods_type')->where('id', $request->ids)->update($data);
         return back();
     } else {
         Session::flash('success', 'Inserted Successfully..!');
         $insertdata = DB::table('finished_goods_type')->insert($data);
         return back();
     }
 }

 public function finished_goods_type_Edit(Request $request, $id)
 {
     $data =  DB::table('finished_goods_type')->where('id', $id)->first();
     if ($data) {
         return Response::json($data);
     }
 }


 public function finished_goods_type_destroy(Request $request, $id)
 {
     Session::flash('error', 'Deleted Successfully..!');
     $delete = DB::table('finished_goods_type')->where('id', '=', $id)->delete();
     return back();
 }
 ///........................................................End Master For Finished Goods Type...............................................  

 ///...................................................Start Master For Invisible Loss Percentage............................................  
 public function invisible_loss_percentage_index()
 {
     if (Auth::check() && Auth::user()->users_role != 1) {
         $land_permission = Session::get('all_module_permission');
         foreach ($land_permission as $key => $value_land) {
             if ($value_land['permission_value'] == 6) {
             $module_permission = $value_land;
             }
         }
     }
     $result_invisible_loss_percentage = InvisibleLossPercentage::orderBy('id', 'DESC')->get()->toArray();

     $data['content'] = 'master.invisible_loss_percentage';
     return view('layouts.content', compact('data'))->with(['result_invisible_loss_percentage'=> $result_invisible_loss_percentage,'module_permission'=> @$module_permission]);
 }

 public function invisible_loss_percentage_Add(Request $request)
 {
    //  return $request;
     $data = array(
         'invisible_loss_percentage' => $request->invisible_loss_percentage,
         'description' =>  $request->description,
        
         'status' => $request->status,
        
     );

     if ($request->ids != '') {
         Session::flash('success', 'Updated Successfully..!');
         $updatedata = DB::table('invisible_loss_percentage')->where('id', $request->ids)->update($data);
         return back();
     } else {
         Session::flash('success', 'Inserted Successfully..!');
         $insertdata = DB::table('invisible_loss_percentage')->insert($data);
         return back();
     }
 }

 public function invisible_loss_percentage_Edit(Request $request, $id)
 {
     $data =  DB::table('invisible_loss_percentage')->where('id', $id)->first();
     if ($data) {
         return Response::json($data);
     }
 }


 public function invisible_loss_percentage_destroy(Request $request, $id)
 {
     Session::flash('error', 'Deleted Successfully..!');
     $delete = DB::table('invisible_loss_percentage')->where('id', '=', $id)->delete();
     return back();
 }
 ///........................................................End Master For Invisible Loss Percentage...............................................  



    ///.....................................................Start Master For Org-Relationships..............................  
    public function Org_Relation_index()
    {
		if (Auth::check() && Auth::user()->users_role != 1) {
            $land_permission = Session::get('all_module_permission');
            foreach ($land_permission as $key => $value_land) {
                if ($value_land['permission_value'] == 4) {
                $module_permission = $value_land;
                }
            }
        }
        $result_relation = Org_Relation::orderBy('org_relation_id', 'DESC')->get()->toArray();

        $data['content'] = 'master.org_relation';
        return view('layouts.content', compact('data'))->with(['result_relation'=> $result_relation,'module_permission' => @$module_permission]);
    }

    public function Org_Relation_add(Request $request)
    {
        // return $request;
        $data = array(
            'relation_name' => $request->relation_name,
            'status' => $request->status,
        );

        if ($request->ids != '') {
            Session::flash('success', 'Updated Successfully..!');
            $updatedata = DB::table('org_relation')->where('org_relation_id', $request->ids)->update($data);
            return back();
        } else {
            Session::flash('success', 'Inserted Successfully..!');
            $insertdata = DB::table('org_relation')->insert($data);
            return back();
        }
    }

    public function Org_Relation_edit(Request $request, $id)
    {
        // return $id;
        $data =  DB::table('org_relation')->where('org_relation_id', $id)->first();
        if ($data) {
            return Response::json($data);
        }
    }


    public function Org_Relation_destroy(Request $request, $id)
    {
        Session::flash('error', 'Deleted Successfully..!');
        $delete = DB::table('org_relation')->where('org_relation_id', '=', $id)->delete();
        return back();
    }
    ///..............................................................End Master For Org-Relationships..............................  




    ///.....................................................Start Master For Org-Contact............................................  
    public function Contact_type_index()
    {
		if (Auth::check() && Auth::user()->users_role != 1) {
            $land_permission = Session::get('all_module_permission');
            foreach ($land_permission as $key => $value_land) {
                if ($value_land['permission_value'] == 4) {
                $module_permission = $value_land;
                }
            }
        }
        $result_contact_type = Org_Contact::orderBy('org_contact_type_id', 'DESC')->get()->toArray();

        $data['content'] = 'master.org_contact';
        return view('layouts.content', compact('data'))->with(['result_contact_type'=> $result_contact_type,'module_permission' => @$module_permission]);
    }

    public function Contact_type_add(Request $request)
    {
        // return $request;
        $data = array(
            'org_contact_type_name' => $request->org_contact_type_name,
            'status' => $request->status,
        );

        if ($request->ids != '') {
            Session::flash('success', 'Updated Successfully..!');
            $updatedata = DB::table('org_contact_type')->where('org_contact_type_id', $request->ids)->update($data);
            return back();
        } else {
            Session::flash('success', 'Inserted Successfully..!');
            $insertdata = DB::table('org_contact_type')->insert($data);
            return back();
        }
    }

    public function Contact_type_edit(Request $request, $id)
    {
        // return $id;
        $data =  DB::table('org_contact_type')->where('org_contact_type_id', $id)->first();
        if ($data) {
            return Response::json($data);
        }
    }


    public function Contact_type_destroy(Request $request, $id)
    {
        Session::flash('error', 'Deleted Successfully..!');
        $delete = DB::table('org_contact_type')->where('org_contact_type_id', '=', $id)->delete();
        return back();
    }
    ///..............................................................End Master For Org-Contact.......................................


///.....................................................Start Master For Org-Designation............................................  
    public function Designation_index()
    {
		if (Auth::check() && Auth::user()->users_role != 1) {
            $land_permission = Session::get('all_module_permission');
            foreach ($land_permission as $key => $value_land) {
                if ($value_land['permission_value'] == 4) {
                $module_permission = $value_land;
                }
            }
        }
        $result_contact_type = Org_Designation::orderBy('org_designation_id', 'DESC')->get()->toArray();

        $data['content'] = 'master.org_designation';
        return view('layouts.content', compact('data'))->with(['result_contact_type'=> $result_contact_type,'module_permission' => @$module_permission]);
    }

    public function Designation_add(Request $request)
    {
        // return $request;
        $data = array(
            'org_designation_name' => $request->org_designation_name,
            'status' => $request->status,
        );

        if ($request->ids != '') {
            Session::flash('success', 'Updated Successfully..!');
            $updatedata = DB::table('org_designation')->where('org_designation_id', $request->ids)->update($data);
            return back();
        } else {
            Session::flash('success', 'Inserted Successfully..!');
            $insertdata = DB::table('org_designation')->insert($data);
            return back();
        }
    }

    public function Designation_edit(Request $request, $id)
    {
        // return $id;
        $data =  DB::table('org_designation')->where('org_designation_id', $id)->first();
        if ($data) {
            return Response::json($data);
        }
    }


    public function Designation_destroy(Request $request, $id)
    {
        Session::flash('error', 'Deleted Successfully..!');
        $delete = DB::table('org_designation')->where('org_designation_id', '=', $id)->delete();
        return back();
    }

///..............................................................End Master For Org-Designation.......................................  
    public function userindex(Request $request)
    {
		if (Auth::check() && Auth::user()->users_role != 1) {
            $land_permission = Session::get('all_module_permission');
            foreach ($land_permission as $key => $value_land) {
                if ($value_land['permission_value'] == 6) {
                $module_permission = $value_land;
                }
            }
        }
        $userData = DB::table('users')->get();

        $data['content'] = 'master.user';
        return view('layouts.content', compact('data'))->with(['userData' => $userData,'module_permission' => @$module_permission]);
    }

    public function add_users(Request $request)
	{      
        $upload_directory = "public/images/user_profile/";
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $profile_picture_tmp = "profile_picture-".time().rand(1000,5000).'.'.strtolower($file->getClientOriginalExtension());
            $file->move($upload_directory, $profile_picture_tmp); //  move file
            $imageName = $upload_directory.$profile_picture_tmp;
        } else {
            $imageName = "";
        }
        // echo $imageName;exit;
        // return $request;
		$data = array(
			'users_role' => '2',
			'name' => $request->name,
			'email' => $request->email,
			'username' => $request->user_name,
			'phone' => $request->phone,
			'user_image' => $imageName,
			'password' => bcrypt($request->password),
			'status' => $request->status,
			'created_at' => date('Y-m-d H:i:s'),
		);

		$add_user=new User();
		$add_user->users_role=2;
		$add_user->name=$request->name;
		$add_user->email=$request->email;
		$add_user->username=$request->user_name;
		$add_user->designation=$request->designation;
		$add_user->phone=$request->phone;
		$add_user->user_image=$imageName;
		$add_user->password=bcrypt($request->password);
		$add_user->status=1;
		$add_user->created_at=date('Y-m-d H:i:s');
		$add_user->save();
		// return $add_user;
		$module = $request->module;
			if($add_user!="")
			{
			if($module!="")
			{
				foreach ($module as $key => $value) {
					$permission = new user_permission();
					$permission->user_id = $add_user->id;
					$permission->employer_id = Session::get('gorgID');
					$permission->company_id = Session::get('gorgID');
					$permission->permission_value = $value;
					$permission->is_read = (!empty($request->input('read' . $value))) ? "yes" : "no";
					$permission->is_add = (!empty($request->input('add' . $value))) ? "yes" : "no";
					$permission->is_edit = (!empty($request->input('edit' . $value))) ? "yes" : "no";
					$permission->is_delete = (!empty($request->input('delete' . $value))) ? "yes" : "no";
					$permission->save();
				}
				// return $Adduser;
				
			}
			else
			{
				Session::flash('danger', 'Please Select Module');
				return redirect('users');
			}
		}
		else
		{
			Session::flash('danger', 'User No Created!');
			return redirect('users');
		}
		Session::flash('success', 'Inserted Successfully..!');
		return redirect('users');
    }

    public function add_users_form()
	{
		$module=module::get();
		// return $module;
		$data['content'] = 'master.add_user';
		return view('layouts.content', compact('data'))->with('module',$module);

    }

    public function users_edit(Request $request,$id)
	{
		$toReturn['module']=module::get()->toArray();
		$toReturn['data']=  DB::table('users')->where('id', $id)->first();
		$toReturn['permission_record']=user_permission::where('user_id',$id)->get()->toArray();
		// $decrypt= Crypt::decrypt($toReturn['data']->password);  
		// print_r($decrypt);
		// exit;
		$data['content'] = 'master.edit_user';
		return view('layouts.content', compact('data'))->with('toReturn',$toReturn);
    }
    
    public function update_user(Request $request)
	{
        $upload_directory = "public/images/user_profile/";
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');

            $add_user_edit= User::find($request->user_id);
            if(file_exists($add_user_edit->user_image)){
                unlink($add_user_edit->user_image);
            }
            $profile_picture_tmp = "profile_picture-".time().rand(1000,5000).'.'.strtolower($file->getClientOriginalExtension());
            $file->move($upload_directory, $profile_picture_tmp); //  move file
            $imageName = $upload_directory.$profile_picture_tmp;
        } else {
            $imageName = "";
        }
		// return $request->module_permission_id[1];
		// return $request;
        $add_user= User::find($request->user_id);
        
		$add_user->users_role=2;
		$add_user->name=$request->name;
		$add_user->email=$request->email;
		$add_user->username=$request->user_name;
		$add_user->designation=$request->designation;
        $add_user->phone=$request->phone;
        if($request->hasFile('profile_image'))
        $add_user->user_image = $imageName;
		if($request->password != "" || $request->password != null)
		$add_user->password=bcrypt($request->password);
		$add_user->status=$request->status;
		$add_user->created_at=date('Y-m-d H:i:s');
		$add_user->save();
		// return $add_user->id;
		$module = $request->module;
			// if($add_user!="")
			// {
			if($module!="")
			{
				foreach ($module as $key => $value) {
					if($request->module_permission_id[$key]!="")
					{
					$permission_update = user_permission::find($request->module_permission_id[$key]);
					$permission_update->user_id = $add_user->id;
					$permission_update->employer_id = Session::get('gorgID');
					$permission_update->company_id = Session::get('gorgID');
					$permission_update->permission_value = $value;
					$permission_update->is_read = (!empty($request->input('read'.$value))) ? "yes" : "no"; 
					$permission_update->is_add = (!empty($request->input('add'.$value))) ? "yes" : "no"; 
					$permission_update->is_edit = (!empty($request->input('edit'.$value))) ? "yes" : "no";
					$permission_update->is_delete = (!empty($request->input('delete'.$value))) ? "yes" : "no";
					$permission_update->save();
					}
					else{
						$permission_update = new user_permission();
						$permission_update->user_id = $add_user->id;
						$permission_update->employer_id = Session::get('gorgID');
						$permission_update->company_id = Session::get('gorgID');
						$permission_update->permission_value = $value;
						$permission_update->is_read = (!empty($request->input('read'.$value))) ? "yes" : "no"; 
						$permission_update->is_add = (!empty($request->input('add'.$value))) ? "yes" : "no"; 
						$permission_update->is_edit = (!empty($request->input('edit'.$value))) ? "yes" : "no";
						$permission_update->is_delete = (!empty($request->input('delete'.$value))) ? "yes" : "no";
						$permission_update->save();
					}
					// echo $permission_update;
				}
				// return $permission_update;
				
			}
			else
			{
				Session::flash('danger', 'Please Select Module');
				return redirect('users');
			}
		// }
		Session::flash('success', 'Update Successfully..!');
		return redirect('users');
    }
    
    public function delete_users (Request $request,$id)
	{
		Session::flash('error', 'Deleted Successfully..!');
		$delete = DB::table('users')->where('id', '=', $id)->delete();
		return back();
	}

	//Define item section
	public function itemData_index()
    {
		if (Auth::check() && Auth::user()->users_role != 1) {
            $land_permission = Session::get('all_module_permission');
            foreach ($land_permission as $key => $value_land) {
                if ($value_land['permission_value'] == 2) {
                $module_permission = $value_land;
                }
            }
		}
		// echo "<pre>";
        // print_r($module_permission);exit;
        $itemData = item::orderBy('id', 'DESC')->get();
        $data['content'] = 'master.item_list';
        return view('layouts.content', compact('data'))->with(['itemData'=> $itemData,'module_permission'=> @$module_permission]);
    }

    public function itemData_Add(Request $request)
    {
        // return $request;
        $data = array(
            'items_name' => $request->items_name,
            'status' => $request->status,
        );

        if ($request->ids != '') {
            Session::flash('success', 'Updated Successfully..!');
            $updatedata = DB::table('item')->where('id', $request->ids)->update($data);
            return back();
        } else {
            Session::flash('success', 'Inserted Successfully..!');
            $insertdata = DB::table('item')->insert($data);
            return back();
        }
    }

    public function itemData_Edit(Request $request, $id)
    {
        // return $id;
        $data =  DB::table('item')->where('id', $id)->first();
        if ($data) {
            return Response::json($data);
        }
    }


    public function itemData_destroy(Request $request, $id)
    {
        Session::flash('error', 'Deleted Successfully..!');
        $delete = DB::table('item')->where('id', '=', $id)->delete();
        return back();
	}
	
	//service section
	public function service_index()
    {
		if (Auth::check() && Auth::user()->users_role != 1) {
            $land_permission = Session::get('all_module_permission');
            foreach ($land_permission as $key => $value_land) {
                if ($value_land['permission_value'] == 6) {
                $module_permission = $value_land;
                }
            }
		}
		// echo "<pre>";
        // print_r($module_permission);exit;
        $serviceData =  DB::table('service_type')->orderBy('id', 'DESC')->get();
        $data['content'] = 'master.service_list';
        return view('layouts.content', compact('data'))->with(['serviceData'=> $serviceData,'module_permission'=> @$module_permission]);
    }

    public function service_Add(Request $request)
    {
        // return $request;
        
        if ($request->ids != '') {
			Session::flash('success', 'Updated Successfully..!'); 
			$data = array(
				'service_name' => $request->service_name,
				'service_description' => $request->description,
				'status' => $request->status,
				'update_by' => Auth::user()->id,
				'update_at' => date('Y-m-d'),
			);
            $updatedata = DB::table('service_type')->where('id', $request->ids)->update($data);
            return back();
        } else {
			$data = array(
				'service_name' => $request->service_name,
				'service_description' => $request->description,
				'status' => $request->status,
				'created_by' => Auth::user()->id,
			);
            Session::flash('success', 'Inserted Successfully..!');
            $insertdata = DB::table('service_type')->insert($data);
            return back();
        }
    }

    public function service_Edit(Request $request, $id)
    {
        // return $id;
        $data =  DB::table('service_type')->where('id', $id)->first();
        if ($data) {
            return Response::json($data);
        }
    }


    public function service_destroy(Request $request, $id)
    {
        Session::flash('error', 'Deleted Successfully..!');
        $delete = DB::table('service_type')->where('id', '=', $id)->delete();
        return back();
    }
}
