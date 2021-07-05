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
            'readUrl'=>'required',
            'ageGroup'=>'required'
        ]);
        
        $newImageName='myUrl'.'-'.time(). '.' . $req->image->extension();
        $req->image->move(public_path("storage/pdf/images"),$newImageName);
        $newpdfName=$req->title .'-' .time() . '.' . $req->readUrl->extension();
        $req->readUrl->move("storage/pdf",$newpdfName);
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
        $delete=File::find($id);
        unlink('storage/pdf/images/'.$delete->image);
        unlink('storage/pdf/'.$delete->readUrl);
        $delete->delete();
        return redirect('/all-pdf');
    }
    public function download($file){
        
        return response()->download(public_path(('storage/pdf/'.$file)));
    }
}
