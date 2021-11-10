<?php


namespace App\Repository\SuperAdmin\Peraturan;


use App\Models\Peraturan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Collection;

class PeraturanRepo implements PeraturanRepoInterface
{


    public function create(Request $request)
    {
        DB::beginTransaction();
        try {
            $input = $request->only((new Peraturan())->getFillable());
            if ($input['status'] == Peraturan::BERLAKU) {
                if ($input['parent_id']) Peraturan::findOrFail($input['parent_id'])->update(['status' => Peraturan::TIDAK_BERLAKU]);
            }
            $peraturan = Peraturan::create($input);
            DB::commit();
            return $peraturan;
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            return false;
        }
        // TODO: Implement create() method.
    }

    public function remove(int $peraturan_id)
    {

        DB::beginTransaction();
        try {
            $peraturan = Peraturan::findOrFail($peraturan_id);
            $peraturan->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            return false;
        }
        // TODO: Implement remove() method.
    }

    public function change(Request $request, int $peraturan_id)
    {
        DB::beginTransaction();
        try {
            $peraturan = Peraturan::findOrFail($peraturan_id);
            $update = $request->only((new Peraturan())->getFillable());
            $peraturan->update($update);
            DB::commit();
            return $peraturan;
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            return false;
        }
        // TODO: Implement change() method.
    }

    public function getById(int $peraturan_id)
    {
        $peraturan = Peraturan::findOrFail($peraturan_id);
        return $peraturan;

    }
}
