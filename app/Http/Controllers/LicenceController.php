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

        $licence = new Licence();
        $licence->licence_name = $licenceName;
        $licence->name = $name;
        $licence->surname = $surname;
        $licence->email = $email;
        $licence->purchase_date = $purchaseDate;

        $licence->save();
        return redirect('/home');
    }
}
