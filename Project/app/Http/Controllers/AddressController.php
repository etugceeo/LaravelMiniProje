<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        $list = Address::orderBy('id','desc')->paginate(8);
        //paginate(8) sayfalandırma
        return view('address.index',compact('list'));
    }
    public  function form($id= 0)
    {
        //id >0 ise düzenle, 0 ise yeni kayıt
        $entry = new Address;//id değeri gelemdiğin boş bir kullanıcı kaydı


        if($id > 0){
            $entry = Address::find($id);

        }
        return view('address.form',compact('entry'));
        //form entry bilgileri ile gelmesini için compact
    }

    public function kaydet($id=0){
        //request tüm isteği al
        //validate formdan gelen elemanların doğrulama işlemleri

        $this->validate(request(),[
            'autocomplete' => 'required',
            'country'=> 'required',

        ]);

        $data = request()->only('autocomplete','company_id','location_field','street_number','route','locality');
        if ($id>0)
        {
            //güncelle
            $entry = Address::where('id',$id)->firstOrFail();
            $entry->update($data);

            /*
            $entry = Person::find($id);
            $entry->save($data);
            */

        }
        else
        {
            //kayıt oluştur
            $entry = Address::create($data);

        }

        return redirect()
            ->route('address.duzenle',$entry->id)
            ->with('mesaj',($id)?'Güncellendi':'kaydedildi')
            ->with('mesaj_tur','success');
        /*
         *
         * */





    }

    public function sil($id)
    {
        Address::destroy($id);
        return redirect()
            ->route('address')
            ->with('mesaj', 'kayıt silindi')
            ->with('mesaj_tur', 'success');

    }
}
