<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Repositary\FeeInvoicesInterface;
use Illuminate\Http\Request;

class FeesInvoicesController extends Controller
{
    protected $feesInvoices;
    public function __construct( FeeInvoicesInterface $feesInvoices)
    {
      return $this->feesInvoices = $feesInvoices;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->feesInvoices->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->feesInvoices->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return $this->feesInvoices->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return $this->feesInvoices->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        return $this->feesInvoices->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->feesInvoices->destroy($request);
    }
}
