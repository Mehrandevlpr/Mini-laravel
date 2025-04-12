<?php

namespace App\Models\contracts;

interface CrudInterface
{
    #create 
    public function create(array $data): int;

    #Read(select) : Single | multiple
    public function find(int $id): object;
    public function get(array $col, array $where): int;

    #Update
    public function update(array $col, array $where): int;

    #Delete
    public function delete(array $where): int;
}
