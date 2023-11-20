<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Help;
use App\Models\HelpItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HelpController extends Controller
{
    public function index()
    {
        $helps = Help::orderBy('id', 'ASC')->get();
        $helpItems = HelpItem::all();



        // $data = [];
        // foreach ($helps as  $help) {
        //     $data = [
        //         'id'                => $help->id,
        //         'helpItems '        => [],
        //     ];

        //     // foreach ($helpItems->help_id as $helpItems) {
        //     //     $data[$key]['helpItems'] = array_merge($data[$key]['helpItems'], [
        //     //         'help_id'    => $helpItems['help_id'],
        //     //     ]);
        //     // }
        // }

        // return $helps;
        return view('frontend.help.index', compact('helps', 'helpItems'));
    }
    public function search(Request $request)
    {
        $search = $request->search;
        $helpItems = HelpItem::where('title', 'like', "%" . $search . "%")
            ->paginate(5);
        return view('frontend.help.search', compact('helpItems'));
    }
}
