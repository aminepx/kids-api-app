<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //this function allows you to get all categories fromat json

    public function mycategories()
    {
        $categories=Category::all();
        return response()->json(['categories'=>$categories]);
    }

    //with this function you can insert data from inputs

    public function store(Request $req)
  {
    $cat= new Category();
    $req->validate([
      'name'=>'required',
      'page_type'=>'required',
      'jsonurl'=>'required',
      'image'=>'required|mimes:jpg,png,jpeg'
  ]);

  $newImageName='https://clicklab.app/public_html/uploads/images/categories/'.$req->image->getClientOriginalName();
  $req->image->move("/var/www/clicklab.app/public_html/uploads/images/categories/",$newImageName);
  $cat->name=$req->name;
  $cat->page_type=$req->page_type;
  $cat->jsonurl=$req->jsonurl;
  $cat->image=$newImageName;
  $cat->save();
  }

  //this function make you delete a category relying on the
  public function destroy($id){
    Category::find($id)->delete();
}
  public function update(Request $req,$id){

    $newImageName='https://clicklab.app/public_html/uploads/images/categories/'.$req->image->getClientOriginalName();
    $req->image->move("/var/www/clicklab.app/public_html/uploads/images/categories/",$newImageName);
      
    $cat=Category::find($id);
    $cat->name=$req->name;
    $cat->image=$newImageName;
    $cat->page_type=$req->page_type;
    $cat->jsonurl=$req->jsonurl;

    $cat->update();
  }

  
}
