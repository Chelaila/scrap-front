<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Provider;
use App\Models\Category;
use App\Models\Product;

use App\Jobs\ScrappJob;
use App\Exports\ScrappingExport;


class GeneralController extends Controller
{
    public function index()
    {
        $providers = Provider::all();
        $categories = Category::all();

        return view('scrapp.index', compact('providers', 'categories'));
    }

    public function scrappApi(Request $request)
    {
            // Get data from the form
        $name = $request->input('provider');
        $type = $request->input('type');
        $value = '';
        switch ($type) {
            case 'search':
                $s = $request->input('search');
                $value = explode(",",$s);
                break;
            case 'links':
                $value = $request->input('links');
                break;
            case 'categories':
                $value =$request->input('categories');
                break;
            default:
                break;
        }
        $payload = [
            'name' => $name,
            'configurations' => [
                [
                  'type' => $type,
                  'value' => $value
                ]
            ]
        ];
        dispatch(new ScrappJob($payload));
        return redirect()->route('index');
    }

    public function exportExcel(Request $request)
    {
         // Validate the form input
        $request->validate([
            'value' => 'required|string',
        ]);

        // Get the submitted value
        $value = $request->input('value');

        // Create an instance of your export class
        $export = new ScrappingExport($value);

        // Download the Excel file
        return Excel::download($export, $value.'.xlsx');
    }
}
