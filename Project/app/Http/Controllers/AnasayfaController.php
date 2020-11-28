<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnasayfaController extends Controller
{
    public function index()
    {
        $isim = "elif";
        $soyadi = "örge";
        $kullanicilar = [
            ['id'=>1,'kullanici_adi'=> 'elif'],
            ['id'=>2,'kullanici_adi'=> 'tuğçe'],
            ['id'=>3,'kullanici_adi'=> 'miraç'],
            ['id'=>4,'kullanici_adi'=> 'gökçe'],
            ['id'=>5,'kullanici_adi'=> 'nazlı']
        ];

        //return view('anasayfa')->with(['isim'=>$isim,'soyadi'=>$soyadi]);
       // return view('anasayfa', ['isim'=>'elif']); //view içine değişken bu şekilde diziyle de gönderilir
        //compact('isim',...) bun fonk değişkenlerden dizi oluşturur
        return view('anasayfa', compact('isim', 'soyadi','kullanicilar'));

    }
}
