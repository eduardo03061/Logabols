<?php

namespace App\Exports;

use App\Models\Inventory;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;

class InventoryExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        $user_id = Auth::user()->id;
        return Inventory::where('id_user', $user_id)->get();
    }
}
