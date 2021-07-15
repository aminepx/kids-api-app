<?php

namespace App\Http\Controllers;

use App\Models\AudioUrl;
use Illuminate\Http\Request;

class AudioUrlController extends Controller
{
   

    public function saveUrl(Request $req){
      
        $aud=new AudioUrl();

    
        
         
        $newAudioName='https://clicklab.app/uploads/audios/listen/'.$req->audio->getClientOriginalName();
        $req->audio->move("/var/www/clicklab.app/public_html/uploads/audios/listen/",$newAudioName);
        
        $aud->title=$req->title;
        $aud->audio_id=$req->audio_id;
        $aud->audio=$newAudioName;
    
        $aud->save();
        return back();
      }

      
      public function myAudioUrl()
    {
        $audiourl=AudioUrl::all();
        return view('audiourl-pages.feed',['audiourls'=>$audiourl]);
    }

    public function destroyurl($id){
    
        AudioUrl::find($id)->delete();
          return back();
      }
}
