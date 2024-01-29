<?php
namespace App\Repositary;
interface FeesInterface{

   public function index();
   public function create();
   public function store($request);
   public function update($request);
   public function edit($id);
   public function destroy($request);
   public function show();

}
