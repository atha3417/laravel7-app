<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home() {
        return view('pages.home');
    }

    public function about() {
        return view('pages.about');
    }

    public function contact() {
        $data = [
            'alamat' => [
                [
                    'tipe' => "rumah",
                    'alamat' => "Jl. Abc No 123",
                    'kota' => "Bandung"
                ],
                [
                    'tipe' => "kantor",
                    'alamat' => "Jl. Cba No 321",
                    'kota' => "Tangerang"
                ]
            ]
        ];
        return view('pages.contact', $data);
    }
}
