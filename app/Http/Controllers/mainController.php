<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Main;
use Inertia\Inertia;
use App\Events\MainStoreEvent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class mainController extends Controller
{
    public function index(){

        $mainData = Main::all();
        $json = response()->json($mainData);
        event(new MainStoreEvent($json));
        return Inertia::render("main");
    }

    public function store(Request $request){
        //dd($request->all());
        $main = new Main();
        $main->test = $request->test;
        $main->test1 = $request->test1;
        $main->save();
        
    }

    public function update(Request $request){
        //dd($request->all());
        $existingRecord  = Main::find($request->id);
        if($existingRecord){
            $existingRecord->test = $request->test;
            $existingRecord->test1 = $request->test1;
            $existingRecord->save();
        }
    }

    public function show(){
        $mainData = Main::all(); // 혹은 Main::paginate() 등으로 필요한 데이터를 조회
        return response()->json($mainData);
    }
}
