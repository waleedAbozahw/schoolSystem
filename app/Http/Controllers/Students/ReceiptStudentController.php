<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Repositary\ReceiptStudentInterface;
use Illuminate\Http\Request;

class ReceiptStudentController extends Controller
{
    protected $receiptStudent;

    public function __construct(ReceiptStudentInterface $receiptStudent)
    {
        $this->receiptStudent=$receiptStudent;
    }

    public function index()
    {
        return $this->receiptStudent->index();
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
        return $this->receiptStudent->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return $this->receiptStudent->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return $this->receiptStudent->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        return $this->receiptStudent->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->receiptStudent->destroy($request);
    }
}
