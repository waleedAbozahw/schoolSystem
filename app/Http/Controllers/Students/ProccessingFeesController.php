<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Repositary\ProccessingFeesInterface;
use Illuminate\Http\Request;

class ProccessingFeesController extends Controller
{
    protected $proccessingFees;
    public function __construct(ProccessingFeesInterface $proccessingFees)
    {
       $this->proccessingFees=$proccessingFees;
    }

    public function index()
    {
      return  $this->proccessingFees->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       // return  $this->proccessingFees->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return  $this->proccessingFees->store($request);
    }

    public function show($id)
    {
        return  $this->proccessingFees->show($id);
    }


    public function edit($id)
    {
        return  $this->proccessingFees->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        return  $this->proccessingFees->update($request);
    }

    public function destroy(Request $request)
    {
        return  $this->proccessingFees->destroy($request);
    }
}
