<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Website;
use App\Models\Video;
use App\Models\Package;
use App\Models\User;





class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public  function __construct()
    {

         if(config('app.env') === 'production') {
            \URL::forceScheme('https');
       }


       $categories = Category::take(100)->get();
        View::share('categories', $categories);

         $tags = Tag::take(100)->get();
        View::share('tags', $tags);


        $website = Website::take(5)->get();

        View::share('website', $website);

        $video = Video::take(100)->orderBy('created_at', 'desc')->get();

        View::share('video', $video);

        $packages = Package::take(10)->get();

        View::share('packages', $packages);


        $subscriber = User::all();

        View::share('subscriber', $subscriber);
        
        
        


    }

}
