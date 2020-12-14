<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use const http\Client\Curl\Versions\CURL;

class CompanyController extends Controller
{

        public function index()
    {
        $list = Company::orderBy('id','desc')->paginate(8);
        //paginate(8) sayfalandırma
        return view('company.index',compact('list'));
    }
        public  function form($id= 0)
    {
        //id >0 ise düzenle, 0 ise yeni kayıt
        $entry = new Company();//id değeri gelemdiğin boş bir kullanıcı kaydı


        if($id > 0){
            $entry = Company::find($id);

        }
        return view('company.form',compact('entry'));
        //form entry bilgileri ile gelmesini için compact
        /**/
    }

        public function kaydet($id=0)
        {
            //request tüm isteği al
            //validate formdan gelen elemanların doğrulama işlemleri

            $this->validate(request(),[
                'company_name' => 'required',
                'website'=> 'required'
            ]);

            $data = request()->only('company_name', 'website');
            if ($id > 0) {
                //güncelle
                $entry = Company::where('id', $id)->firstOrFail();
                $ch = curl_init($data['website']);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $content = curl_exec($ch);
                $data['web_html']=$content;
                curl_close($ch);
                $entry->update($data);


            }
            {
                //kayıt oluştur
                /*
                $a=$data['website'];
                $veri = file_get_contents($a);
                $data[web_html]=$veri;
                */
                $ch = curl_init($data['website']);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $content = curl_exec($ch);
                $data['web_html']=$content;
                curl_close($ch);
                $entry = Company::create($data);

            }

            return redirect()
                ->route('company.duzenle', $entry->id)
                ->with('mesaj', ($id) ? 'Güncellendi' : 'kaydedildi')
                ->with('mesaj_tur', 'success');
        }

        public function sil($id)
      {
          $sirket = Company::find($id);
          $company_kisi_adet= $sirket->people()->count();
          if ($company_kisi_adet > 0) {
              return redirect()
                  ->route('company')
                  ->with('mesaj', "Bu şirkette $company_kisi_adet kişi kayıtlı. bu yüüzden silme
                  işlemi yapılmamıştır")
                  ->with('mesaj_tur', 'warning');

          }
          //$sirket->people()->detach();
          $sirket->delete();

          return redirect()
              ->route('company')
              ->with('mesaj', 'Kayıt silindi');




      }


}
