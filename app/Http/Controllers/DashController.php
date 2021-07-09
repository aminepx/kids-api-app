<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class DashController extends Controller
{
    public function addCategory()
    {
        return view('pages.add');
    }
    public function feed(){

        $categories=Category::all();
        return view('pages/feed',['categories'=>$categories]);
    }




    public function destroy($id){
    
      Category::find($id)->delete();
        return redirect('/cat');
    }


    public function updateForm($id)
    {
      $category=  Category::find($id);
       return view('pages.updateForm',['cat'=>$category]);
    }


    public function edit(Request $req,$id){
      
        $cat=Category::find($id);
        $req->validate([
          'name'=>'required',
          'page_type'=>'required',
          'jsonurl'=>'required',
          'image'=>'required|mimes:jpg,png,jpeg'
      ]);

      $newImageName='https://clicklab.app/uploads/images/categories/'.$req->image->getClientOriginalName();
      $req->image->move("/var/www/clicklab.app/public_html/uploads/images/categories/",$newImageName);
        $cat->name=$req->name;
        $cat->page_type=$req->page_type;
        $cat->jsonurl=$req->jsonurl;
        $cat->image=$newImageName;
    
        $cat->save();
        return redirect('/cat');
      }


      public function add()
    {
        return view('pages.add');
    }


      public function store(Request $req){
      
        $cat=new Category();

        $req->validate([
            'name'=>'required',
            'page_type'=>'required',
            'jsonurl'=>'required',
            'image'=>'required|mimes:jpg,png,jpeg'
        ]);
        
         
        $newImageName='https://clicklab.app/uploads/images/categories/'.$req->image->getClientOriginalName();
        $req->image->move("/var/www/clicklab.app/public_html/uploads/images/categories/",$newImageName);

        $cat->name=$req->name;
        $cat->page_type=$req->page_type;
        $cat->jsonurl=$req->jsonurl;
        $cat->image=$newImageName;
    
        $cat->save();
        return redirect('/cat');
    
     
      }
    
}
