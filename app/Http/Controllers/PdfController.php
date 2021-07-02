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
            'pdfUrl'=>'required'
        ]);

        $newImageName='myUrl'.'-'.time(). '.' . $req->image->extension();
        $req->image->move(public_path("pdf/images"),$newImageName);
        $newpdfName=$req->title .'-' .time() . '.' . $req->pdfUrl->extension();
        $req->pdfUrl->move("pdf",$newpdfName);
        $pdf->title=$req->title;
        $pdf->pdfUrl=$newpdfName;
        $pdf->image=$newImageName;
        
        $pdf->save();
        return redirect('/all-pdf');
      }
      public function getPdf(){

        $pdf=File::all();
        return view('pdf-pages/feed-pdf',['pdf'=>$pdf]);
    }
    public function destroypdf($id){
        $delete=File::find($id);
        unlink('pdf/images/'.$delete->image);
        unlink('pdf/'.$delete->pdfUrl);
        $delete->delete();
        return redirect('/all-pdf');
    }
    public function download($file){
        
        return response()->download(public_path(('pdf/'.$file)));
    }
}
