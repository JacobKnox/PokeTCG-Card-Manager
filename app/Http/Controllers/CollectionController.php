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

    public static function show($id){
        $collection = Collection::where('id', intval($id))->first();
        return view('collection', ['collection' => $collection]);
    }

    public static function addCard(Request $request, $collectionid = null, $cardid = null){
        if($collectionid == null || $cardid == null){
            $input = $request->all();
            $collectionid = $input['collectionid'];
            $cardid = $input['cardid'];
        }
        $collection = Collection::where('id', intval($collectionid))->first();
        $collection->addCards([$cardid]);

        return back();
    }

    public static function newCollection(Request $request){
        $input = $request->all();

        $collection = new Collection();
        $collection->name = $input['name'];
        $collection->description = $input['description'];
        $collection->num_cards = 0;
        $collection->user_id = UserController::getUser()->id;
        $collection->save();

        return back();
    }
}