<?php

namespace laravelAPI\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){
        
        //Listing clients
        return \laravelAPI\Client::all();
        
    }
    
    public function store(Request $request){
        
        return \laravelAPI\Client::create($request->all());
        
    }
    
    public function save(Request $request, $id){
        
        
        return \laravelAPI\Client::where('id', $id)->update($request->all());
        
    }
    
    public function show($id){
        
        return \laravelAPI\Client::find($id);
        
    }
    
    public function destroy($id){
        
        return \laravelAPI\Client::destroy($id);
        
    }
    
}
