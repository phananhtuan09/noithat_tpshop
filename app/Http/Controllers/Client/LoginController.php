<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Photo;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Blog;
use App\Models\Customer;
use App\Models\Social;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
class LoginController extends Controller
{

    public function index()
    {
        $setting = Setting::where('id','1')->first();
        $seo_title = $setting->seo_title;
        $seo_description = $setting->seo_title;
        $seo_keywords = $setting->seo_keywords;
        $logo_header =  Photo::where('type','logoheader')->first();
        $logo_footer = Photo::where('type','logofooter')->first();
        $tieuchis = Photo::where('type','criteria')->where('hienthi',1)->get();
        $sliders = Photo::where('type','slider')->where('noibat',1)->where('hienthi',1)->orderby('id','DESC')->get();
        $banner = Photo::where('type','banner')->first();
        $favicon = Photo::where('type','favicon')->first();
        $Categorys = Category::where('type','lv1')->where('trangthai','1')->orderby('id','DESC')->get();
        $Items = Category::where('type','lv2')->where('trangthai','1')->orderby('id','DESC')->get();
        $Brands = Brand::where('trangthai','1')->orderby('id','DESC')->get();
        $servicenbs = Blog::where('hienthi','1')->where('noibat','1')->where('type','service')->orderby('id','DESC')->limit(5)->get();
        $chinhsachs = Blog::where('hienthi','1')->where('noibat','1')->where('type','policy')->orderby('id','DESC')->limit(5)->get();

        // content
        // dd($sliders);
        return view('client.pages.login')->with(compact('setting','seo_keywords','seo_title','seo_description','seo_keywords','sliders','logo_header','logo_footer','favicon','tieuchis','banner','Categorys','Items','Brands','servicenbs','chinhsachs'));
    }

    public function login(Request $request)
    {
        $this->validate($request,
            [
                'email' => 'required|max:65|email:rfc,dns',
                'password' => 'required|min:6|max:65',

            ],
            [
                'required' => ':attribute không được để trống',
                'min' => ':attribute Không được nhỏ hơn :min kí tự',
                'max' => ':attribute Không được lớn hơn :max kí tự',
                'email' => 'Email không hợp lệ',

            ],
            [
                'email' => 'Email',
                'password' => 'Mật khẩu',
            ],
        );
        $data = $request->all();
        $customer = Customer::where('email',$data['email'])->first();
        if($customer){
            if (password_verify($data['password'], $customer->password)) {
                 Session::put('user_name',$customer->name);
                 Session::put('user_id',$customer->id);
                return Redirect()->route('shop.index');
            }
            else{
                Session::flash('error_login','Sai tài khoản hoặc mật khẩu');
                return back();
            }
        }
        else{
            Session::flash('error_login','Sai tài khoản hoặc mật khẩu');
            return back();
        }
    }
    public function logout()
    {
        Session::flush();
        return Redirect()->route('shop.index');
    }
    // Google login
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Google callback
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        

         $this->_registerOrLoginUser($user,'google');


        // Return home after login
         return Redirect()->route('shop.index');

    }

    // Facebook login
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    // Facebook callback
    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();
        
       
         $this->_registerOrLoginUser($user,'facebook');

        // Return home after login
        return Redirect()->route('shop.index');
    }
    protected function _registerOrLoginUser($data,$provider)
    {
        $user = Social::where('provider_id', '=', $data->id)->first();
        $customer = Customer::where('provider_id','=',$data->id)->first();
        if (!$user) {
            $user = new Social();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->provider_id = $data->id;
            $user->customer_id = '';
            $user->avatar = $data->avatar;
            $user->provider = $provider;
            $user->save();
            
        }
        if(!$customer){
            $customer = new Customer();
            $customer->name = $data->name;
            $customer->email = $data->email;
            $customer->password = '';  
            $customer->phone = '';
            $customer->provider_id = $data->id;
            $customer->save();

        }

        

        Auth::login($user);
         Session::put('user_name',$user->name);
         Session::put('user_id',$user->id);
         Session::put('user_avatar',$user->avatar);
    }
    public function view_profile($profile_id){
        $setting = Setting::where('id','1')->first();
        $seo_title = $setting->seo_title;
        $seo_description = $setting->seo_title;
        $seo_keywords = $setting->seo_keywords;
        $logo_header =  Photo::where('type','logoheader')->first();
        $logo_footer = Photo::where('type','logofooter')->first();
        $tieuchis = Photo::where('type','criteria')->where('hienthi',1)->get();
        $sliders = Photo::where('type','slider')->where('noibat',1)->where('hienthi',1)->orderby('id','DESC')->get();
        $banner = Photo::where('type','banner')->first();
        $favicon = Photo::where('type','favicon')->first();
        $Categorys = Category::where('type','lv1')->where('trangthai','1')->orderby('id','DESC')->get();
        $Items = Category::where('type','lv2')->where('trangthai','1')->orderby('id','DESC')->get();
        $Brands = Brand::where('trangthai','1')->orderby('id','DESC')->get();
        $servicenbs = Blog::where('hienthi','1')->where('noibat','1')->where('type','service')->orderby('id','DESC')->limit(5)->get();
        $chinhsachs = Blog::where('hienthi','1')->where('noibat','1')->where('type','policy')->orderby('id','DESC')->limit(5)->get();

        $account = Customer::where('id',$profile_id)->first();
        return view('client.pages.view_profile')->with(compact('setting','seo_keywords','seo_title','seo_description','seo_keywords','sliders','logo_header','logo_footer','favicon','tieuchis','banner','Categorys','Items','Brands','servicenbs','chinhsachs','account'));
    }


  
}
