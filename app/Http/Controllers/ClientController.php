<?php

namespace laravelAPI\Http\Controllers;

use Illuminate\Http\Request;
use laravelAPI\Services\ClientService;
use laravelAPI\Repositories\ClientRepository;

class ClientController extends Controller
{

    private $repository;
    private $service;

    public function __construct(ClientService $service, ClientRepository $repository){
        
        $this->service = $service;
        $this->repository = $repository;

    }

    public function index(){
        
        //Listing clients
        return $this->service->all();
        
    }
    
    public function store(Request $request){
        
        return $this->service->create($request->all());
        
    }
    
    public function save(Request $request, $id){
        
        
        return $this->service->update($request->all(), $id);
        
    }
    
    public function show($id){
        
        return $this->repository->find($id);
        
    }
    
    public function destroy($id){
        
        return $this->repository->destroy($id);
        
    }
    
}
