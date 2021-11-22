<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $kateogri = Category::get();
        $label = [];
        foreach ($kateogri as $i => $v) {
            $value[$i] = Product::where('category_id', $v->id)->count();
            $label[$i] = $v->nama;
        }

        return view('dashboard.dashboard', [
            'title' => 'Dashboard',
            'icon' => 'fa fa-dashboard'
        ])->with('value', json_encode($value))
            ->with('label', json_encode($label));
    }
}
