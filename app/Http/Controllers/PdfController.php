<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;


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
            'readUrl'=>'required|mimes:pdf,',
            'ageGroup'=>'required'
        ]);
        
        $newImageName='https://clicklab.app/uploads/images/read/'.$req->image->getClientOriginalName();
        $req->image->move("/var/www/clicklab.app/uploads/images/read/",$newImageName);
        $newpdfName='https://clicklab.app/uploads/pdf/'.$req->readUrl->getClientOriginalName();
        $req->readUrl->move("/var/www/clicklab.app/uploads/pdf/",$newpdfName);
        $pdf->title=$req->title;
        $pdf->readUrl=$newpdfName;
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
