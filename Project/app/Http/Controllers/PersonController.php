<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index()
    {
        $list = Person::orderBy('id','desc')->paginate(8);
        //paginate(8) sayfalandırma
        return view('person.index',compact('list'));
    }
    public  function form($id= 0)
    {
        //id >0 ise düzenle, 0 ise yeni kayıt
        $entry = new Person;//id değeri gelemdiğin boş bir kullanıcı kaydı


        if($id > 0){
           $entry = Person::find($id);

        }
        return view('person.form',compact('entry'));
        //form entry bilgileri ile gelmesini için compact
    }

    public function kaydet($id=0){
        //request tüm isteği al
        //validate formdan gelen elemanların doğrulama işlemleri

        $this->validate(request(),[
            'name' => 'required',
            'email'=> 'required',
            'title'=>'required',
            'surname'=>'required'
        ]);

         $data = request()->only('name','surname','company_id','title','email','phone');
        if ($id>0)
        {
            //güncelle
            $entry = Person::where('id',$id)->firstOrFail();
            $entry->update($data);

            /*
            $entry = Person::find($id);
            $entry->save($data);
            */

        }
        else
        {
            //kayıt oluştur
            $entry = Person::create($data);
            /**/

        }

        return redirect()
            ->route('person.duzenle',$entry->id)
            ->with('mesaj',($id)?'Güncellendi':'kaydedildi')
            ->with('mesaj_tur','success');





    }

    public function sil($id)
    {
        Person::destroy($id);
        return redirect()
            ->route('person')
            ->with('mesaj','kayıt silindi')
            ->with('mesaj_tur','success');

    }

}
