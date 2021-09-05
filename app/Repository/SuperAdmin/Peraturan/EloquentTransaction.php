<?php


namespace App\Repository\SuperAdmin\Peraturan;


use Illuminate\Support\Facades\DB;

trait EloquentTransaction
{
    public function __construct()
    {
        DB::beginTransaction();

    }

}
