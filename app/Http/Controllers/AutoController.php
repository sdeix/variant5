<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Claim;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AutoController extends Controller
{

    public function index(Request $request)
    {
        $cars = [];
        $claimform = false;
        $message = '';
        if ($request->method() == 'POST') {


            $brand = $request->input('brand');
            $engincapacity = $request->input('engincapacity');
            $releasedate = $request->input('releasedate');
            $model = $request->input('model');

            $query = Car::query();

            if ($brand) {
                $query->where('brand', $brand);
            }

            if ($engincapacity) {
                $query->where('engincapacity', $engincapacity);
            }

            if ($releasedate) {
                $query->where('releasedate', $releasedate);
            }

            if ($model) {
                $query->where('model', $model);
            }
            $cars = $query->get();
            if (count($cars) == 0) {
                $claimform = true;
            }
            if ($request->input('name') && count($cars) == 0) {
                $client = Client::create([
                    'name' => $request->input('name'),
                    'contact' => $request->input("contact")
                ]);
                Claim::create([
                    'brand' => $request->input('brand'),
                    'engincapacity' => $request->input('engincapacity'),
                    'releasedate' => $request->input('releasedate'),
                    'model' => $request->input('model'),
                    'client' => $client->id
                ]);
                $message = 'Заявка заполнена, вас оповестят когда машина появится в наличии';
                $claimform = false;
            }




        }
        return view('welcome', ['cars' => $cars, 'claimform' => $claimform, 'message' => $message]);
    }

    public function cars(Request $request)
    {
        if ($request->method() == "POST") {
            Car::create([
                'brand' => $request->input('brand'),
                'engincapacity' => $request->input('engincapacity'),
                'releasedate' => $request->input('releasedate'),
                'model' => $request->input('model'),
            ]);

            $claims = Claim::all();
            foreach($claims as $claim){

            $brand = $claim->brand;
            $engincapacity = $claim->ngincapacity;
            $releasedate = $claim->releasedate;
            $model = $claim->model;

            $query = Car::query();

            if ($brand) {
                $query->where('brand', $brand);
            }

            if ($engincapacity) {
                $query->where('engincapacity', $engincapacity);
            }

            if ($releasedate) {
                $query->where('releasedate', $releasedate);
            }

            if ($model) {
                $query->where('model', $model);
            }
            $cars = $query->get();
            if (count($cars) != 0) {
                Claim::where('id',$claim->id)->update(['active' => true]);
                User::where('id', auth()->user()->id)->update(['notification' => true]);
                return redirect('/');
            }

            }
        }
        $cars = Car::all();
        return view('cars', ['cars' => $cars]);
    }
    public function clients(Request $request)
    {
        $clients = Client::all();
        return view('clients', ['clients' => $clients]);
    }
    public function claims(Request $request)
    {
        User::where('id', auth()->user()->id)->update(['notification' => false]);

        $claims = Claim::all();
        return view('claims', ['claims' => $claims]);
    }
    
    public function deleteclaim($id){
        Claim::where('id',$id)->delete();
        return redirect('/claims');
    }
    public function deletecar($id){
        Car::where('id',$id)->delete();
        return redirect('/cars');
    }
    public function deleteclient($id){
        Client::where('id',$id)->delete();
        return redirect('/clients');
    }
}
