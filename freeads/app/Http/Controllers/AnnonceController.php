<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\AdStore;
use App\Http\Requests\AdEdit;


class AnnonceController extends Controller
{
    public function create()
    {

        return view('create');
    
    }

    public function store(Adstore $request)
    {
        
        $validated = $request->validated();
        
        $path = $request->file('photo')->store('public/ads');
        $pathSaved = $request->file('photo')->store('/ads');

        $ad = new Annonce();
        $ad->title = $validated['title'];
        $ad->description = $validated['description'];
        $ad->photo = $pathSaved;
        $ad->localisation = $validated['localisation'];
        $ad->price = $validated['price'];
        $ad->id_users = auth()->id();
        $ad->save();

        return view('success');
    }

    public function showAd()
    {

        $ads = DB::table('ads')
                    ->orderBy('created_at', 'DESC')
                    ->paginate(2);

        return view('viewAd', compact('ads'));
    }

    public function showMyAd()
    {
        $myAds = DB::table('ads')
                    ->where('id_users', auth()->id())
                    ->orderBy('created_at', 'DESC')
                    ->paginate(3);

        return view('viewMyAd', compact('myAds'));
    }

    public function delete($id)
    {
        $deleteAd = DB::table('ads')
                        ->where('id', $id)
                        ->delete();

        return view('deletedSucess', compact('deleteAd'));
    }

    public function showEdit($id)
    {
        $annonce = Annonce::All();
        $editMyAds = $annonce->find($id);

        return view('editMyAd', compact('editMyAds'));
    }

    public function edit($id, AdEdit $request)
    {
        $validated = $request->validated();
        
        $path = $request->file('photo')->store('public/ads');
        $pathSaved = $request->file('photo')->store('/ads');

        $ad = new Annonce();
        $ad->find($id)->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'photo' => $pathSaved,
            'localisation' => $validated['localisation'],
            'price' => $validated['price']
            ]);

        return view('editedSucess', compact('ad'));
    }

    public function search()
    {
        
        return view('searchAds');
    }

    public function searchName(Request $request)
    {
        $ads = DB::table('ads')
                    ->where('title', 'like', '%'.$request['title'].'%')
                    ->get();

        return view('researchResult', compact('ads'));
    }

    public function searchPrice(Request $request)
    {
        $ad = new Annonce();
        $ads = Annonce::All()->whereBetween('price', [$request['pricemin'], $request['pricemax']]);

        return view('researchResult', compact('ads'));
    }

    public function searchLocalisation(Request $request)
    {
        $ads = DB::table('ads')->where('localisation', 'like', '%'.$request['localisation'].'%')->get();

        return view('researchResult', compact('ads'));
    }
}
