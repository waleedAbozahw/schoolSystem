<?php
namespace App\Repositary;

interface PaymentRepositaryInterface{

    public function index();

    public function show($id);

    public function edit($id);

    public function store($request);

    public function update($request);

    public function destroy($request);

}
