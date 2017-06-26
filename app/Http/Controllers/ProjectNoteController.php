<?php

namespace laravelAPI\Http\Controllers;

use Illuminate\Http\Request;
use laravelAPI\Services\ProjectNoteService;
use laravelAPI\Repositories\ProjectNoteRepository;

class ProjectNoteController extends Controller
{

    private $repository;
    private $service;

    public function __construct(ProjectNoteService $service, ProjectNoteRepository $repository){
        
        $this->service = $service;
        $this->repository = $repository;

    }

    public function index(){
        
        //Listing ProjectNotes
        return $this->repository->all();
        
    }
    
    public function store(Request $request){
        
        return $this->service->create($request->all());
        
    }
    
    public function save(Request $request, $id){
        
        
        return $this->repository->where('id', $id)->update($request->all());
        
    }
    
    public function show($id){
        
        return $this->repository->find($id);
        
    }
    
    public function destroy($id){
        
        return $this->repository->destroy($id);
        
    }
    
}
