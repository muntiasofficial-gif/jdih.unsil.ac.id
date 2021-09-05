<?php


namespace App\Repository\SuperAdmin\Peraturan;


use Illuminate\Http\Request;

interface PeraturanRepoInterface
{

    public function create(Request $request);
    public function remove(int $peraturan_id);
    public function change(Request $request,int $peraturan_id);
    public function getById(int $peraturan_id);
}
