<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Video;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Message;
use App\Models\Website;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class WebsiteController extends Controller
{
    
    
    public function policy()
    {
        $categories = Category::all();
        return view('website.company', compact('categories'));
        
        
    }
    
    public function package()
    {
        
        $categories = Category::all();
        return view('website.boostpackage', compact('categories'));
        
        
    }
    
    
    public function categoryallview($id)
    {
        $allcategory = Video::where('category_id', $id)->get();
        $findcategory = Category::where('id', $id)->get()->first();
        $getid = $findcategory->categories;
        return view('website.category', compact('allcategory', 'getid'));
    }
    
    
    public function playvideo($id)
    {

        $categoryid = Video::where('id', $id)->get()->first();

        $find = $categoryid->category_id;

        $cate = Category::where('id', $find)->get()->first();

        $namecategory = $cate->categories;
        
        $catsids = $cate->id; 

        $findall = Video::where('category_id', $catsids)->get();

        $videos = Video::where('id', $id)->get()->first();
        
        $videoid = $videos->video;

        return view('website.singlevideo', compact('videoid', 'findall', 'namecategory'));

    }
    
    public function videoupdate($id)
    {
        $video =Video::where('id', $id)->get()->first();

        return view('Maintainadmin.video.updatevideo', compact('video'));

    }

    public function update(Request $request)
    {
        

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'thambleimage' => 'required|image',
            'video' => 'required',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $id = $request->input('id');

        $Video = Video::where('id', $id)->get()->first();

        $thambleimage = $request->file('thambleimage');
        $thambleimage_new_name = time().$thambleimage->getClientOriginalName();
        $thambleimage->move('uploads/videos', $thambleimage_new_name);


        $Video->title = $request->title;
        $Video->category_id = $request->category_id;
        $Video->tag_id = $request->tag_id;
        $Video->thambleimage = 'uploads/videos/'.$thambleimage_new_name;
        $Video->video = $request->video;
        $Video->description = $request->description;
        $Video->user_id = auth()->id();
        $Video->save();


         return redirect()->back()->with('success', 'Video Update successfully');



    }
    
    
    public function webvideo()
    {
    
    $videos1 = Video::where('category_id', 7)->take(4)->orderBy('created_at', 'desc')->latest()->get();



    $videos2 = Video::where('category_id', 19)->take(4)->orderBy('created_at', 'desc')->latest()->get();

   

    $videos3 = Video::where('category_id', 10)->take(4)->orderBy('created_at', 'desc')->latest()->get();


    $videos4 = Video::where('category_id', 11)->take(4)->orderBy('created_at', 'desc')->latest()->get();


    $videos5 = Video::where('category_id', 12)->take(4)->orderBy('created_at', 'desc')->latest()->get();


        $videos6 = Video::where('category_id', 20)->take(4)->orderBy('created_at', 'desc')->latest()->get();

        return view('website.index', compact('videos1','videos2','videos3','videos4','videos5','videos6'));

    }
    
    
    
    

	//video store on database
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'category_id' => 'required|string',
            'tag_id' => 'required|string',
            'thambleimage' => 'required|image',
            'video' => 'required',
            'userid' => 'required',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $thambleimage = $request->file('thambleimage');
        $thambleimage_new_name = time().$thambleimage->getClientOriginalName();
        $thambleimage->move('uploads/videos', $thambleimage_new_name);

        

        $video = new Video;
        $video->title = $request->title;
        $video->category_id = $request->category_id;
        $video->tag_id = $request->tag_id;
        $video->thambleimage = 'uploads/videos/'.$thambleimage_new_name;
        $video->video = $request->video;
        $video->user_id = $request->userid;
        $video->description = $request->description;
        $video->save();

        return redirect()->back()->with('success', 'Video added successfully');
    }


    public function addcatrgory(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'categories' => 'required',
            'description' => 'required',
          ]);  

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        

        $category = new Category;
        $category->categories = $request->categories;
        $category->description = $request->description;
        
        $category->save();

        return redirect()->back()->with('success', 'Category added successfully');


    }

    public function addtag(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'tag' => 'required',
            'description' => 'required',
          ]);  

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        

        $tag = new Tag;
        $tag->tag = $request->tag;
        $tag->description = $request->description;
        
        $tag->save();

        return redirect()->back()->with('success', 'tag added successfully');



    }

    public function addwebsitecontent(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'footer' => 'required|string',
            'logo' => 'required|image',
            'aboutus' => 'required|string',
            'ruls' => 'required|string',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $logo = $request->file('logo');
        $thambleimage_new_name = time().$logo->getClientOriginalName();
        $logo->move('uploads/videos', $thambleimage_new_name);

        

        $website = new Website;
        $website->title = $request->title;
        $website->footer = $request->footer;
        $website->logo = 'uploads/videos/'.$thambleimage_new_name;
        $website->aboutus = $request->aboutus;
        $website->ruls = $request->ruls;
        $website->save();

        return redirect()->back()->with('success', 'Website Content added successfully');


    }


    //video delete option 

    public function deletevideo(Request $request, $id)
    {

        $video = Video::find($id);

        if($video){

            $video->delete();

            Session::flash('success', 'Video hase been delete');

        }
        return redirect()->back();


    }
    
    public function categorydelete(Request $request, $id)
    {

        $category = Category::find($id);

        if($category){

            $category->delete();

            Session::flash('success', 'Category hase been delete');

        }
        return redirect()->back();
    }

    public function subcategorydelete(Request $request, $id)
    {

        $subcategory = Tag::find($id);

        if($subcategory){

            $subcategory->delete();

            Session::flash('success', 'subcategory hase been delete');

        }
        return redirect()->back();
    }

}
