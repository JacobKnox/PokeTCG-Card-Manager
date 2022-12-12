<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class CollectionController extends Controller
{
    public static function clear($id){
        DB::table('collectionrelationships')->where('collection_id', $id)->delete();
    }
}