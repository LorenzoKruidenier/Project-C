<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Order;
use App\RestaurantRating;

class Restaurants extends Controller
{
    function save(Request $req){
        $restaurant = new Restaurant;

        $data = $req;

        foreach ($data as $key => $value) {
            if($value == null){
                return redirect('register-restaurant')->with('exception', 'Niet alle velden zijn ingevuld!');
            }
        }

        // try {
            $restaurant->user_id = $req->userId;
            $restaurant->name = $req->name;
            $restaurant->email = $req->email;
            $restaurant->min_order_price = $req->minOrderPrice;
            $restaurant->delivery_price = $req->deliveryPrice;
            $restaurant->website = $req->website;
            $restaurant->city = $req->city;
            $restaurant->street = $req->street;
            $restaurant->zip_code = $req->zipCode;
            if(!$req->restaurantImage == null) {
                $restaurant->image = $req->file('restaurantImage')->store('public');
            }
            $restaurant->save();
            return redirect('register-restaurant/success');
        // } catch(\Exception $e){
            return redirect('register-restaurant')->with('exception', 'Aanmelding is niet succesvol verwerkt!');
        // }
    }

    function read(){
        $restaurants = Restaurant::all();
        return view('dashboard/dashboard',['restaurants'=>$restaurants]);
    }

    function approve(Request $req){
        try {
            $restaurant=Restaurant::find($req->restaurantId);
            $restaurant->approved = 1;
            $restaurant->save();
            $user=User::find($req->userId);
            $user->role = 2;
            $user->save();
            return redirect('dashboard')->with('success', 'Restaurant goedgekeurd!');
        } catch(\Exception $e){
            return redirect('dashboard')->with('exception', 'Goedkeuren restaurant mislukt!');
        }

    }
    function fetch(){
        $restaurants = Restaurant::all();
        for($x = 0; $x<count($restaurants); $x++){
            $restaurants[$x]["rating"] = DB::table('restaurant_rating')->where('restaurant_id',$restaurants[$x]["id"])->avg('food_score');
        }
        return view('/index',['restaurants'=>$restaurants]);
    }

    function orderByPriceDesc(){
        $restaurants = DB::table('restaurant')->orderBy('min_order_price','desc')->get();
        return view('/index',['restaurants'=>$restaurants]);
    }
    function orderByPriceAsc(){
        $restaurants = DB::table('restaurant')->orderBy('min_order_price','asc')->get();
        return view('/index',['restaurants'=>$restaurants]);
    }
    function rateRestaurant(Request $req,$restaurantId){
        $currentUserOrders = Order::where([['user_id','=',\Auth::user()->id],
        ['restaurant_id','=',$restaurantId]])->get();
        if(count($currentUserOrders) > 0){
            $rating = new RestaurantRating;
            $rating->restaurant_id = $restaurantId;
            $rating->food_score = $req->foodScore;
            $rating->delivery_score = $req->deliveryScore;
            $rating->comment = $req->reviewComment;
            $rating->date = $req->reviewDate;
            $rating->save();
        }
    }
}
