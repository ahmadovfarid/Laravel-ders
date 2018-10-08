<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use  Illuminate\Support\Facades\DB;
class sepet extends Model
{
	use SoftDeletes;
    protected $table="sepet";

     protected $guarded=[];

    const CREATED_AT="yaratma_tarixi";
    const UPDATED_AT="yenileme_tarixi";
    const DELETED_AT="silinme_tarixi";
    
    
    public function sifaris(){
    	return $this->hasOne('App\Models\sifaris');
    }
    public static function aktif_sepet_id(){
    	 $aktif_sepet=DB::table(sepet as s)
    	 ->leftJoin('sifaris as si','si.sepet_id','=','s.id')
    	 ->where('s.kullanici_id',auth()->id())
    	 ->whereRaw('si.id is null')
    	 ->orderByDesc('s.yaratma_tarixi')
    	 ->select('s.id')->first();
    	  if(!is_null($aktif_sepet)) return $aktif_sepet->id;
    }
}