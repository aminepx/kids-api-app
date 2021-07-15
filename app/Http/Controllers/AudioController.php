<?php

namespace App\Http\Controllers;

use App\Models\Audio;
use App\Models\AudioUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AudioController extends Controller
{
    public function addAudio()
    {
        return view('audio-pages.add');
    }

    public function save(Request $req){
      
        $aud=new Audio();

        $req->validate([
            'title'=>'required',
            'image'=>'required|mimes:jpg,png,jpeg'
        ]);
        
         
        $newImageName='https://clicklab.app/uploads/images/listen/'.$req->image->getClientOriginalName();
        $req->image->move("/var/www/clicklab.app/public_html/uploads/images/listen/",$newImageName);
        $aud->title=$req->title;
        $aud->description=$req->description;
        $aud->image=$newImageName;
    
        $aud->save();
        return redirect('/audios');
      }

      
      public function innerjoin()
    {
        $audios=Audio::with('audioUrl')->get();
        $decode=json_decode($audios,true);
        // return view('audio-pages.feed',['audios'=>$audios]);
        return response()->json(['audios'=>$decode]);
    }

    public function destroy($id){
    
        Audio::find($id)->delete();
          return redirect('/audios');
      }
      public function addAudioUrl($id)
      {
        $audios=Audio::find($id);
          return view('audiourl-pages.addurl',['audios'=>$audios]);
      }



      // public function innerjoin()
      // {
      //   return DB::table('audio')
      
      //   ->join('audio_urls','audio.id','=','audio_urls.audios_id')
      //   ->select('audio.id as audio_id','audio.title as title','audio_urls.id as url_id','audio_urls.title as title_url','audio_urls.audio as audio','audio_urls.audios_id as audio_id')
      //   ->get();

      // }

      public function myAudios()
      {
        $audios=Audio::all();

        $decode=json_decode($audios,true);
          return view('audio-pages.feed',['audios'=>$decode]);
        
      }
      
}
