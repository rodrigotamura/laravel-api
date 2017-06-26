<?php

namespace laravelAPI\Http\Controllers;

use Illuminate\Http\Request;
use laravelAPI\Services\ProjectService;
use laravelAPI\Repositories\ProjectRepository;

class ProjectController extends Controller
{

    private $repository;
    private $service;

    public function __construct(ProjectService $service, ProjectRepository $repository){
        
        $this->service = $service;
        $this->repository = $repository;

    }

    public function index(){
        
        //Listing Projects
        return $this->service->all();
        
    }
    
    public function store(Request $request){
        
        return $this->service->create($request->all());
        
    }
    
    public function save(Request $request, $id){
        return $this->service->update($request->all(), $id);
    }
    
    public function show($id){
        
        return $this->service->show($id);
        
    }
    
    public function destroy($id){
        
        return $this->service->destroy($id);
        
    }
    
}
