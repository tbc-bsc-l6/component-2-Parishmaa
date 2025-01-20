<?php

namespace App\Repositories;

interface ProductRepositoryInterface {
    public function update($data);
    public function store($data);
}