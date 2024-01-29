<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Repositary\PaymentRepositaryInterface;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected $payment;
    public function __construct(PaymentRepositaryInterface $payment)
    {
       $this->payment=$payment;
    }
    public function index()
    {
        return $this->payment->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       // return $this->payment->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->payment->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return $this->payment->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return $this->payment->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        return $this->payment->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->payment->destroy($request);
    }
}
