<?php
namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title'   => 'My CI4 Application',
            'heading' => 'My CI4 Application',
        ];
        return view('pages/home', $data);
    }

    public function about()
    {
        $data = [
            'title'   => 'About Us',
            'heading' => 'About the Developer',
            'message' => 'This application was developed by Joseph Victor A. Valones, a student of FEU Alabang, integrating TFA (Tasks for All), TSA (Tasks for Today), and the Midterm POS Project on CodeIgniter 4.',
        ];
        return view('pages/about', $data);
    }
}
