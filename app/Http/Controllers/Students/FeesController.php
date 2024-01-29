<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFees;
use App\Repositary\FeesInterface;
use Illuminate\Http\Request;

class FeesController extends Controller
{
    protected $fees;
    public function __construct(FeesInterface $fees)
    {
        return $this->fees=$fees;
    }
    public function index()
    {
       return $this->fees->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->fees->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFees $request)
    {
        return $this->fees->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->fees->show();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return $this->fees->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreFees $request)
    {
        return $this->fees->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->fees->destroy($request);
    }
}
