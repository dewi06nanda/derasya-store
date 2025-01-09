<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $barangs = Barang::limit(8)->get();
        return view('user.homepage', ['barangs' => $barangs]);
    }

    public function product()
    {
        $barangs = Barang::all();
        return view('user.product', ['barangs' => $barangs]);
    }

    public function detailProduct(Barang $barang)
    {
        $barangs = Barang::inRandomOrder()->take(4)->get();
        return view('user.detailProduct', ['barang' => $barang, 'barangs' => $barangs]);
    }

    public function about() {
        return view('user.about');
    }
}
