<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Charts\CovidChart;

class InfoController extends Controller
{
    public function index()
    {
        $response = collect(Http::get('https://api.kawalcorona.com/indonesia/provinsi')->json());
        $data = $response->flatten(1);
        $label =$data->pluck('Provinsi');
        $response2 = collect(Http::get('https://api.kawalcorona.com/indonesia')->json());
        $positif = $response2->pluck('positif');
        $meninggal = $response2->pluck('meninggal');
        $sembuh = $response2->pluck('sembuh');
        $provpositif = $data->pluck('Kasus_Posi');
        $chart = new CovidChart;
        $chart->labels($label);
        $colors = $label->map(function($item){
            return '#' . substr(md5(mt_rand()),0,6);
        });
        $chart->dataset('Data Kasus Positif Corona Di Indonesia','line',$provpositif)->backgroundColor($colors);

        return view('index',[
           'positif' => $positif,
           'data' => $data,
           'meninggal' => $meninggal,
           'sembuh' => $sembuh,
           'chart' => $chart,
        ]);
        
        
        


    }
}
