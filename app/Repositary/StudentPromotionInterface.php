<?php
namespace App\Repositary;

interface StudentPromotionInterface{
    public function index();

    public function store($request);

    public function create();

    public function destroy($request);
}
