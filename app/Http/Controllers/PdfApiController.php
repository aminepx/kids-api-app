<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class PdfApiController extends Controller
{
  

    public function storeOnePdf(Request $req){
      
        $pdf=new File();
        
        $req->validate([
            'title'=>'required',
            'image'=>'required|mimes:jpg,png,jpeg',
            'pdfUrl'=>'required'
        ]);

        $newImageName='myUrl'.'-'.time() . '.' . $req->image->extension();
        $req->image->move(public_path("pdf/images"),$newImageName);
        
        
        
        $newpdfName=$req->title .'-'. time() . '.' . $req->pdfUrl->extension();
        $req->pdfUrl->move("pdf",$newpdfName);
        
        $pdf->title=$req->title;
        
        $pdf->pdfUrl=$newpdfName;
        $pdf->image=$newImageName;
        

    
        $pdf->save();
        
      }
      public function getAllPdf(){

        $pdf=File::all();
        return response()->json(['pdf'=>$pdf]);
        
    }
    public function destroyOnepdf($id){
        File::find($id)->delete();
    }
}
