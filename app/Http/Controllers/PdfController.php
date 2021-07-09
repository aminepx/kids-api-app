<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use ZipArchive;

class PdfController extends Controller
{
    public function addPdf()
    {
        return view('pdf-pages.add-pdf');
    }

    public function storePdf(Request $req){
      
        $pdf=new File();
        
        $req->validate([
            'title'=>'required',
            'image'=>'required|mimes:jpg,png,jpeg',
            'readUrl'=>'required|mimes:pdf,zip',
            'ageGroup'=>'required'
        ]);
        
        $newImageName='https://clicklab.app/uploads/images/read/'.$req->image->getClientOriginalName();
        $req->image->move("/var/www/clicklab.app/public_html/uploads/images/read/",$newImageName);
        $newpdfName='https://clicklab.app/uploads/pdf/read/'.$req->readUrl->getClientOriginalName();
        //$req->readUrl->move("/var/www/clicklab.app/public_html/uploads/pdf/read/",$newpdfName);
        $pdf->title=$req->title;
         $pdf->readUrl=$newpdfName;
        if(substr($pdf->readUrl,strlen($pdf->readUrl)-3,strlen($pdf->readUrl))=='zip'){
            
            $zip= new ZipArchive;
            $newpdfName='https://clicklab.app/uploads/pdf/read/'.$req->readUrl->getClientOriginalName();
            
         $res=$zip->open($req->readUrl->move("/var/www/clicklab.app/public_html/uploads/pdf/read/",$newpdfName));
         if ($res===true){
             $zip->extractTo('/var/www/clicklab.app/public_html/uploads/pdf/read/');
             $zip->close();
             $pdf->readUrl=$newpdfName=substr($newpdfName,0,strlen($newpdfName)-4)."/";
         }
        
      
  }
  else{
    $newpdfName='https://clicklab.app/uploads/pdf/read/'.$req->readUrl->getClientOriginalName();
    $req->readUrl->move("/var/www/clicklab.app/public_html/uploads/pdf/read/",$newpdfName);
    $pdf->readUrl=$newpdfName;

 }   
         


        
        $pdf->image=$newImageName;
        $pdf->ageGroup=$req->ageGroup;
        $pdf->description=$req->description;
        $pdf->save();
        return redirect('/all-pdf');
      }
      public function getPdf(){

        $pdf=File::all();
        return view('pdf-pages/feed-pdf',['pdf'=>$pdf]);
    }
    public function destroypdf($id){
        File::find($id)->delete();
        return redirect('/all-pdf');
    }
   
}


