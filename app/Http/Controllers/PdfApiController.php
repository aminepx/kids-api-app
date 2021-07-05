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
            'readUrl'=>'required'
        ]);

        $newImageName='myUrl'.'-'.time() . '.' . $req->image->extension();
        $req->image->move(public_path("storage/pdf/images"),$newImageName);
        
       

        $newpdfName=$req->title .'-'. time() . '.' . $req->readUrl->extension();
        $req->readUrl->move("storage/pdf",$newpdfName);
        
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
            
        $delete=File::find($id);
        unlink('storage/pdf/images/'.$delete->image);
        unlink('storage/pdf/'.$delete->readUrl);
        $delete->delete();

    }
}
