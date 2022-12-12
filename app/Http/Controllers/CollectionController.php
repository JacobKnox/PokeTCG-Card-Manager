<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Collection;

class CollectionController extends Controller
{
    public static function clear($id){
        DB::table('collectionrelationships')->where('collection_id', $id)->delete();
    }

    public static function newCollection(Request $request){
        $input = $request->all();

        $collection = new Collection();
        $collection->name = $input['name'];
        $collection->description = $input['description'];
        $collection->num_cards = 0;
        $collection->user_id = UserController::getUser()->id;
        $collection->save();
    }
}