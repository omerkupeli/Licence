<?php

namespace App\Http\Controllers;

use App\Models\Licence;
use App\Http\Requests\StoreLicenceRequest;
use App\Http\Requests\UpdateLicenceRequest;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
class LicenceController extends Controller
{
    public function getLicences()
{
    if (Auth::check()) {
        $user = Auth::user();
        $licences = Licence::where('user_id', $user->id)->get();
        return view('homePage', ['licences' => $licences]);
    }

   
}


    public function store(Request $request)
    {
        $user = Auth::user();

        $licence = new Licence();
        $licence->lisansadi = $request->licence_name;
        $licence->isim = $request->name;
        $licence->soyisim = $request->surname;
        $licence->email = $request->email;
        $licence->aliştarihi = $request->purchase_date;
        $licence->süre = $request->duration;
        $licence->bitiştarihi = $request->end_date;
        $licence->user_id = $user->id;

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
