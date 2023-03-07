<?php

namespace App\Interface;

interface StoreUserInterface
{
    public function storeOrUpdate(array $data, $id=null);
}
