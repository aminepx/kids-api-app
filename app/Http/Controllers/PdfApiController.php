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
            'readUrl'=>'required',
            'ageGroup'=>'required'
        ]);

        $newImageName='https://clicklab.app/uploads/images/read/'.$req->image->getClientOriginalName();
        $req->image->move("/var/www/clicklab.app/uploads/images/read/",$newImageName);
        
       

        $newpdfName='https://clicklab.app/uploads/pdf/'.$req->image->getClientOriginalName();
        $req->readUrl->move("/var/www/clicklab.app/uploads/pdf/",$newpdfName);
        
        $pdf->title=$req->title;
        $pdf->description=$req->description;
        $pdf->ageGroup=$req->ageGroup;
        $pdf->readUrl=$newpdfName;
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
