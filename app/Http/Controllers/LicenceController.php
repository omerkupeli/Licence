<?php

namespace App\Http\Controllers;

use App\Models\Licence;
use App\Http\Requests\StoreLicenceRequest;
use App\Http\Requests\UpdateLicenceRequest;

use Illuminate\Http\Request;
class LicenceController extends Controller
{
    public function getLicences(){
        $licences = Licence::all();
        return view('homePage', ['licences' => $licences]);
    }

    public function createLicence(Request $request){
        $licence = new Licence();
        $licence->lisansadi = $request->licence_name;
        $licence->isim = $request->name;
        $licence->soyisim = $request->surname;
        $licence->email = $request->email;
        $licence->purchase_date = $request->purchase_date;
        $licence->save();
        return redirect('/homePage');
    }
    public function store(Request $request)
    {
        
        $licenceName = $request->input('licence_name');
        $name = $request->input('name');
        $surname = $request->input('surname');
        $email = $request->input('email');
        $purchaseDate = $request->input('purchase_date');
        $duration = $request->input('duration');
        $endDate = $request->input('end_date');

        $licence = new Licence();
        $licence->lisansadi = $licenceName;
        $licence->isim = $name;
        $licence->soyisim = $surname;
        $licence->email = $email;
        $licence->aliştarihi = $purchaseDate;
        $licence->süre = $duration;
        $licence->bitiştarihi = $endDate;


        $licence->save();
        return redirect('/home');
    }

    public function deleteLicence($id){
        $licence = Licence::find($id);
        $licence->delete();
        return redirect('/home');
    }

    public function updateLicence(Request $request){
        $licence = Licence::find($request->id);
        $licence->lisansadi = $request->licence_name;
        $licence->isim = $request->name;
        $licence->soyisim = $request->surname;
        $licence->email = $request->email;
        $licence->aliştarihi = $request->purchase_date;
        $licence->süre = $request->duration;
        $licence->bitiştarihi = $request->end_date;
        $licence->save();
        return redirect('/home');
    }


    public function editLicence($id){
        $licence = Licence::find($id);
        return view('editLicence', ['licence' => $licence]);
    }
}
