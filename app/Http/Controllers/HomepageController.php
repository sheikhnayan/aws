<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product_item;
use App\product_category;
use App\product_company;
use App\product_measurement;
use App\product_color_info;
use App\product_color;
use App\product_size;
use App\product_size_info;
use App\product_info;
use App\product_image;
use App\product_subcategory;
use App\seller;
use App\explore_banner;
use App\slider;
use App\customer_message;
use App\offer_setup;
use App\ProductRating;
use App\FlashDeal;
use App\ExchangeRequest;
use Validator;
use DB;
use Auth;
use Image;

class HomepageController extends Controller
{
  public function index()
  {
    date_default_timezone_set('Asia/Dhaka');
    $recent = product_info::orderBy('id', 'ASC')->where('status', '1')->take(6)->get();

    $man_item = DB::table('product_item')->where('id', 113)->first();
    $woman_item = DB::table('product_item')->where('id', 115)->first();

    $man_categories = Db::table('product_category')->where('item_id', 113)->get();
    $woman_categories = Db::table('product_category')->where('item_id', 115)->get();

    $men = product_info::orderBy('id', 'desc')->where('status', '1')->where('item_id', 21)->take(12)->get();

    $women = product_info::orderBy('id', 'desc')->where('status', '1')->where('item_id', 22)->take(12)->get();

    $Electronics = product_info::orderBy('id', 'desc')->where('status', '1')->where('item_id', 24)->take(12)->get();

    $life = product_info::orderBy('id', 'desc')->where('status', '1')->where('item_id', 4)->take(10)->get();

    $allitems = DB::table('product_item')->where('shop_by', '1')->get();
    $allcats = product_category::where('shop_by', '1')->orderby('sl')->get();
    $brand = DB::table('product_company')->where('home_show', '1')->where('status', '1')->orderby('sl','ASC')->paginate(35);

    $seller = seller::orderBy('id', 'ASC')->get();

    // ------------------Slider--------------------
    $slider = slider::orderBy('id', 'ASC')->take(1)->first();
    $slidermore = slider::orderBy('id', 'ASC')->skip(1)->take(5)->get();

    // --------------Banner------------------
    $topbannerleft = explore_banner::orderBy('sl', 'ASC')->take(4)->get();
    $topbannerright = explore_banner::orderBy('sl', 'ASC')->skip(4)->take(3)->get();
    $midbannertop = explore_banner::orderBy('sl', 'ASC')->skip(6)->take(3)->get();
    $midbannerbottom = explore_banner::orderBy('sl', 'ASC')->skip(12)->take(2)->get();
    $midbanner = explore_banner::orderBy('sl', 'ASC')->skip(14)->take(12)->get();
    $bottombannertop = explore_banner::orderBy('sl', 'ASC')->skip(26)->take(2)->get();
    $bottombannerbottom = explore_banner::orderBy('sl', 'ASC')->skip(28)->take(8)->get();
    $footerbanner = explore_banner::orderBy('sl', 'ASC')->skip(36)->take(4)->get();

    $datetime = DB::select('SELECT NOW() as dates');
    foreach ($datetime as $key => $value) {
      $newdate =   $value->dates;
    }

    // $flashsale = offer_setup::orderBy('id', 'DESC')
    // ->where('start_date_time', '<=', $newdate)
    // ->where('end_date_time', '>=', $newdate)
    // ->where('type', '1')
    // ->where('status', '1')
    // ->get();

    $flashdeals = FlashDeal::orderBy('sl', 'asc')->where('status', 1)->get();




    $exclusive = offer_setup::orderBy('id', 'DESC')
    ->where('type', '3')
    ->where('status', '1')
    ->limit(6)
    ->get();

    return view('User.layouts.home', compact('recent', 'men', 'women', 'Electronics', 'life', 'topbannerleft', 'topbannerright', 'midbannertop', 'midbannerbottom', 'midbanner', 'bottombannertop', 'bottombannerbottom', 'footerbanner', 'slider', 'slidermore', 'seller', 'flashdeals', 'newdate', 'exclusive', 'allitems', 'brand', 'allcats', 'man_item', 'woman_item', 'man_categories', 'woman_categories'));
  }

  public function fetch_time(Request $request)
  {
    $datetime = DB::select('SELECT NOW() as dates');
    foreach ($datetime as $key => $value) {

      $newdate =   $value->dates;
    }

    return $newdate;
  }


  public function About_us()
  {
    $about = DB::table('about_us')
    ->first();
    return view('User.about', compact('about'));
  }


  public function Term_Condition()
  {
    $term = DB::table('terms_use')
    ->first();
    return view('User.term', compact('term'));
  }


  public function Privacy_Policy()
  {
    $privacy_policy = DB::table('privacy_policy')
    ->first();
    return view('User.privacy_policy', compact('privacy_policy'));
  }

  public function cookie_policy()
  {
    $cookie_policy = DB::table('cookie_policy')
    ->first();
    return view('User.cookie_policy', compact('cookie_policy'));
  }

  public function purchasing_policy()
  {
    $purchasing_policy = DB::table('purchasing_policy')
    ->first();
    return view('User.purchasing_policy', compact('purchasing_policy'));
  }

  public function return_policy()
  {
    $return_policy = DB::table('return_policy')
    ->first();
    return view('User.return_policy', compact('return_policy'));
  }

  public function seller_policy()
  {
    $seller_policy = DB::table('seller_policy')
    ->first();
    return view('User.seller_policy', compact('seller_policy'));
  }

  public function merchant_zone()
  {
    $merchant_zone = DB::table('merchant_zone')
    ->first();
    return view('User.merchant_zone', compact('merchant_zone'));
  }

  public function seller_zone()
  {
    $seller_zone = DB::table('seller_zone')
    ->first();
    return view('User.seller_zone', compact('seller_zone'));
  }

  public function FAQ()
  {
    $faq_infos = DB::table('faq_infos')
    ->first();
    return view('User.faq_infos', compact('faq_infos'));
  }

  public function Contact_us()
  {

    $contact_us = DB::table('contact_us')
    ->first();
    return view('User.contact_us', compact('contact_us'));
  }



  public function howbuy()
  {
    $type = "How To Buy";
    $data = DB::table('how_buys')
    ->first();
    return view('User.details', compact('data', 'type'));
  }
  
  
    public function privacy_policys()
  {
    $type = "Privacy & Policy";
    $data = DB::table('privacy_policy')
    ->first();
    return view('User.details', compact('data', 'type'));
  }
  
  
  
  public function replacement()
  {
    return view('User.details');
  }
  public function Career()
  {
    $type = "Career";
    $data = DB::table('career_infos')
    ->first();
    return view('User.Career', compact('data', 'type'));
  }
  public function COD()
  {
    $type = "COD";
    $data = DB::table('cod_us')
    ->first();
    return view('User.details', compact('data', 'type'));
  }

  public function customermessage(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'name' => 'required',
      'description' => 'required',
    ]);

    if ($validator->fails()) {
      return redirect()->back()
      ->withErrors($validator)
      ->withInput();
    }
    customer_message::create($request->all());

    $notification = array(
      'messege'   => 'Message Send Successfully',
      'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);
  }

  public function shop()
  {
    $shop = DB::table('product_productinfo')
    ->where('status', '1')
    ->orderBy('id', 'DESC')
    ->paginate(48);
    $brand = product_company::all();
    $size = product_size_info::all();
    $color = product_color_info::all();
    return view('User.shop', compact('shop', 'brand', 'size', 'color'));
  }


  public function newproduct_show()
  {
    $shop = DB::table('product_productinfo')
    ->where('status', '1')
    ->orderBy('id', 'DESC')
    ->paginate(48);
    $brand = product_company::all();
    $size = product_size_info::all();
    $color = product_color_info::all();
    return view('User.shop', compact('shop', 'brand', 'size', 'color'));
  }
  public function item_wise($name, $id)
  {
    $product_cat = DB::table('product_productinfo')
    ->join('product_category', 'product_productinfo.category_id', 'product_category.id')
    ->where('product_productinfo.item_id', $id)
    ->select('product_productinfo.*', 'product_category.category_name')
    ->orderBy('product_productinfo.id', 'DESC')
    ->where('product_productinfo.status', '1')
    ->paginate(16);
    $item = product_item::find($id);
    $brand = product_company::join('product_productinfo', 'product_productinfo.brand_id', 'product_company.id')->where('product_productinfo.item_id', $id)->select('product_company.*')
    ->groupby('product_company.id')
    ->get();
    $color = DB::table('product_color')
    ->join('product_productinfo', 'product_productinfo.id', 'product_color.product_id')
    ->where('product_productinfo.item_id', $id)
    ->select('product_color.*')
    ->orderBy('product_color.color', 'ASC')
    ->groupby('product_color.color')
    ->get();

    $size = DB::table('product_size')
    ->join('product_productinfo', 'product_productinfo.id', 'product_size.product_id')
    ->where('product_productinfo.item_id', $id)
    ->select('product_size.*')
    ->orderBy('product_size.size', 'ASC')
    ->groupby('product_size.size')
    ->get();


    $category = DB::table('product_category')->where('item_id', $id)->get();





    return view('User.item', compact('product_cat', 'brand', 'size', 'color', 'id', 'item', 'category'));
  }


  public function category_wise($name, $id)
  {
    $product_cat = DB::table('product_productinfo')
    ->join('product_category', 'product_productinfo.category_id', 'product_category.id')
    ->where('product_productinfo.category_id', $id)
    ->select('product_productinfo.*', 'product_category.category_name')
    ->orderBy('product_productinfo.id', 'DESC')
    ->where('product_productinfo.status', '1')
    ->paginate(12);

    $category = product_category::find($id);
    $brand = product_company::join('product_productinfo', 'product_productinfo.brand_id', 'product_company.id')->where('product_productinfo.category_id', $id)->select('product_company.*')->groupby('product_company.id')->get();
    $color = DB::table('product_color')
    ->join('product_productinfo', 'product_productinfo.id', 'product_color.product_id')
    ->where('product_productinfo.category_id', $id)
    ->select('product_color.*')
    ->orderBy('product_color.color', 'ASC')
    ->groupby('product_color.color')
    ->get();

    $size = DB::table('product_size')
    ->join('product_productinfo', 'product_productinfo.id', 'product_size.product_id')
    ->where('product_productinfo.category_id', $id)
    ->select('product_size.*')
    ->orderBy('product_size.size', 'ASC')
    ->groupby('product_size.size')
    ->get();



    $subcategory = DB::table('product_subcategory')->where('category_id', $id)->get();



    return view('User.category', compact('product_cat', 'brand', 'size', 'color', 'id', 'category', 'subcategory'));
  }



  public function categorys_wise($name, $id)
  {
    $product_cat = DB::table('product_productinfo')
    ->join('product_category', 'product_productinfo.category_id', 'product_category.id')
    ->where('product_productinfo.category_id', $id)
    ->select('product_productinfo.*', 'product_category.category_name')
    ->orderBy('product_productinfo.id', 'DESC')
    ->where('product_productinfo.status', '1')
    ->where('discount_per', '>', 0)
    ->paginate(16);

    $category = product_category::find($id);
    $brand = product_company::join('product_productinfo', 'product_productinfo.brand_id', 'product_company.id')->where('product_productinfo.category_id', $id)->select('product_company.*')->groupby('product_company.id')->get();
    $color = DB::table('product_color')
    ->join('product_productinfo', 'product_productinfo.id', 'product_color.product_id')
    ->where('product_productinfo.category_id', $id)
    ->select('product_color.*')
    ->orderBy('product_color.color', 'ASC')
    ->groupby('product_color.color')
    ->get();

    $size = DB::table('product_size')
    ->join('product_productinfo', 'product_productinfo.id', 'product_size.product_id')
    ->where('product_productinfo.category_id', $id)
    ->select('product_size.*')
    ->orderBy('product_size.size', 'ASC')
    ->groupby('product_size.size')
    ->get();



    $subcategory = DB::table('product_subcategory')->where('category_id', $id)->get();



    return view('User.categorys', compact('product_cat', 'brand', 'size', 'color', 'id', 'category', 'subcategory'));
  }








  public function subcategory_wise($name, $id)
  {
    $product_cat = DB::table('product_productinfo')
    ->join('product_category', 'product_productinfo.category_id', 'product_category.id')
    ->where('product_productinfo.subcategory_id', $id)
    ->select('product_productinfo.*', 'product_category.category_name')
    ->orderBy('product_productinfo.id', 'DESC')
    ->where('product_productinfo.status', '1')
    ->paginate(18);


    $subcategory = product_subcategory::find($id);
    $brand = product_company::join('product_productinfo', 'product_productinfo.brand_id', 'product_company.id')->where('product_productinfo.subcategory_id', $id)->groupby('product_company.id')->select('product_company.*')->get();




    $color = DB::table('product_color')
    ->join('product_productinfo', 'product_productinfo.id', 'product_color.product_id')
    ->where('product_productinfo.subcategory_id', $id)
    ->select('product_color.*')
    ->orderBy('product_color.color', 'ASC')
    ->groupby('product_color.color')
    ->get();

    $size = DB::table('product_size')
    ->join('product_productinfo', 'product_productinfo.id', 'product_size.product_id')
    ->where('product_productinfo.subcategory_id', $id)
    ->select('product_size.*')
    ->orderBy('product_size.size', 'ASC')
    ->groupby('product_size.size')
    ->get();

    return view('User.subcategory', compact('product_cat', 'brand', 'size', 'color', 'id', 'subcategory'));
  }



  public function subcategorys_wise($name, $id)
  {
    $product_cat = DB::table('product_productinfo')
    ->join('product_category', 'product_productinfo.category_id', 'product_category.id')
    ->where('product_productinfo.subcategory_id', $id)
    ->select('product_productinfo.*', 'product_category.category_name')
    ->orderBy('product_productinfo.id', 'DESC')
    ->where('product_productinfo.status', '1')
    ->where('discount_per', '>', 0)
    ->paginate(16);


    $subcategory = product_subcategory::find($id);
    $brand = product_company::join('product_productinfo', 'product_productinfo.brand_id', 'product_company.id')->where('product_productinfo.subcategory_id', $id)->groupby('product_company.id')->select('product_company.*')->get();
    $color = DB::table('product_color')
    ->join('product_productinfo', 'product_productinfo.id', 'product_color.product_id')
    ->where('product_productinfo.subcategory_id', $id)
    ->select('product_color.*')
    ->orderBy('product_color.color', 'ASC')
    ->groupby('product_color.color')
    ->get();

    $size = DB::table('product_size')
    ->join('product_productinfo', 'product_productinfo.id', 'product_size.product_id')
    ->where('product_productinfo.subcategory_id', $id)
    ->select('product_size.*')
    ->orderBy('product_size.size', 'ASC')
    ->groupby('product_size.size')
    ->get();

    return view('User.subcategorys', compact('product_cat', 'brand', 'size', 'color', 'id', 'subcategory'));
  }




  public function brand_list_info()
  {


    $brandinfo = DB::table('product_company')->inRandomorder()->where('status',1)->paginate(12);

    return view('User.brand_list_view', compact('brandinfo'));
  }


  public function search_brand_list(Request $request)
  {

    $brandinfos = product_company::orderby('sl', 'ASC')->where('company_name', 'like', '%' . $request->searchtext . '%')->get();

    return view('User.brand_search_list_view', compact('brandinfos'));
  }

  public function brand_product_info($name, $id)
  {
    $product_cat = DB::table('product_productinfo')
    ->join('product_company', 'product_productinfo.brand_id', 'product_company.id')
    ->where('product_productinfo.brand_id', $id)
    ->select('product_productinfo.*', 'product_company.company_name')
    ->orderBy('product_productinfo.id', 'DESC')
    ->where('product_productinfo.status', '1')
    ->paginate(12);


    $brandinfo = product_company::find($id);

    $brand = DB::table('product_company')->inRandomorder()->get();

    $color = DB::table('product_color')
    ->join('product_productinfo', 'product_productinfo.id', 'product_color.product_id')
    ->where('product_productinfo.brand_id', $id)
    ->select('product_color.*')
    ->orderBy('product_color.color', 'ASC')
    ->groupby('product_color.color')
    ->get();

    $size = DB::table('product_size')
    ->join('product_productinfo', 'product_productinfo.id', 'product_size.product_id')
    ->where('product_productinfo.brand_id', $id)
    ->select('product_size.*')
    ->orderBy('product_size.size', 'ASC')
    ->groupby('product_size.size')
    ->get();

    return view('User.brand_product', compact('product_cat', 'brand', 'size', 'color', 'id', 'brandinfo'));
  }


  public function single_product($name, $id)
  {


    $viewproduct = DB::table('product_productinfo')
    ->join('product_item', 'product_item.id', 'product_productinfo.item_id')
    ->leftJoin('product_category', 'product_category.id', 'product_productinfo.category_id')
    ->leftJoin('product_measurement', 'product_measurement.id', 'product_productinfo.measurement_type')
    ->leftJoin('product_company', 'product_company.id', 'product_productinfo.brand_id')
    ->select('product_productinfo.*', 'product_item.item_name', 'product_category.category_name', 'product_measurement.measurement_type as measurementName', 'product_company.company_name')
    ->where('product_productinfo.product_id', $id)
    ->first();

    $stock = DB::table('productstocks')->where('product_id', $viewproduct->id)->sum('quentity');
    $salequntshopping = DB::table('shopping_carts')
    ->where('status', '1')
    ->where('product_id', $viewproduct->id)
    ->sum('quantity');
    $related_product1 = DB::table('product_productinfo')->limit(2)->get();

    $related_product = DB::table('product_productinfo')
    ->where('category_id', $viewproduct->category_id)
    ->inRandomorder()
    ->take(8)
    ->get();

    $cod = DB::table('cod_us')->where('id', '1')->first();
    // $product_color = DB::table('productstocks')->where('product_id', $viewproduct->id)->groupby('color')->get();
    // $product_size = DB::table('productstocks')->where('product_id', $viewproduct->id)->groupby('size')->get();
    $product_image = product_image::where('product_id', $viewproduct->id)->get();

    $product_size = DB::table('product_size')->where('product_id', $viewproduct->id)->get();
    $product_color = DB::table('product_color')->where('product_id', $viewproduct->id)->get();
    

    $review = DB::table('reviews')
    ->join('product_productinfo', 'product_productinfo.id', 'reviews.product_id')
    ->join('guest', 'guest.id', 'reviews.customer_id')
    ->where('reviews.status', '1')
    ->where('reviews.product_id', $viewproduct->id)
    ->select('reviews.*', 'guest.image')
    ->get();

    $product_ratings = ProductRating::where('product_id', $viewproduct->product_id)->where('status', 1)->get();
    $avg_rating = ProductRating::where('product_id', $viewproduct->product_id)->where('status', 1)->avg('guest_rating');

    $total_rating = ProductRating::where('product_id', $viewproduct->product_id)->where('status', 1)->count();

    $five_star = ProductRating::where('product_id', $viewproduct->product_id)->where('guest_rating', 5)->where('status', 1)->count();
    $four_star = ProductRating::where('product_id', $viewproduct->product_id)->where('guest_rating', 4)->where('status', 1)->count();
    $three_star = ProductRating::where('product_id', $viewproduct->product_id)->where('guest_rating', 3)->where('status', 1)->count();
    $two_star = ProductRating::where('product_id', $viewproduct->product_id)->where('guest_rating', 2)->where('status', 1)->count();
    $one_star = ProductRating::where('product_id', $viewproduct->product_id)->where('guest_rating', 1)->where('status', 1)->count();


    return view('User.single-product', compact('viewproduct', 'related_product', 'related_product1', 'product_image', 'product_color', 'product_size', 'stock', 'salequntshopping', 'cod', 'product_ratings', 'five_star', 'four_star', 'three_star', 'two_star', 'one_star', 'avg_rating', 'total_rating'));
  }

  // ================Search=======================


  public function seller()
  {

    $shopdata = seller::all();
    return view('User.Seller.shop', compact('shopdata'));
  }



  public function sellerProduct($name, $id)
  {
    $product_cat = DB::table('product_productinfo')
    ->join('product_category', 'product_productinfo.category_id', 'product_category.id')
    ->where('product_productinfo.seller_id', $id)
    ->select('product_productinfo.*', 'product_category.category_name')
    ->orderBy('product_productinfo.id', 'DESC')
    ->where('product_productinfo.status', '1')
    ->paginate(12);


    $brand = product_company::join('product_productinfo', 'product_productinfo.brand_id', 'product_company.id')->where('product_productinfo.seller_id', $id)->select('product_company.*')->groupby('product_company.id')->get();
    $color = DB::table('product_color')
    ->join('product_productinfo', 'product_productinfo.id', 'product_color.product_id')
    ->where('product_productinfo.seller_id', $id)
    ->select('product_color.*')
    ->orderBy('product_color.color', 'ASC')
    ->groupby('product_color.color')
    ->get();

    $size = DB::table('product_size')
    ->join('product_productinfo', 'product_productinfo.id', 'product_size.product_id')
    ->where('product_productinfo.seller_id', $id)
    ->select('product_size.*')
    ->orderBy('product_size.size', 'ASC')
    ->groupby('product_size.size')
    ->get();
    $seller = seller::where('id', $id)->first();
    //   dd($seller);
    return view('User.Seller.seller_product', compact('product_cat', 'brand', 'size', 'color', 'seller'));
  }



  public function offer()
  {

    $offer = product_info::orderBy('id', 'desc')->where('status', '1')->take(12)->get();
    return view('User.offer', compact('offer'));
  }



  public function allcategory()
  {

    $allcategory = product_item::orderBy('id', 'ASC')->get();
    return view('User.allcategory', compact('allcategory'));
  }

  public function Full_filled()
  {
    $type = '1';
    $brand = product_company::orderBy('id', 'ASC')->get();
    $size = product_size_info::orderBy('id', 'ASC')->get();
    $color = product_color_info::orderBy('id', 'ASC')->get();
    $shop = product_info::orderBy('id', 'DESC')->where('seller_id', '45')->where('status', '1')->paginate(10);
    return view('User.offer-page', compact('shop', 'brand', 'size', 'color', 'type'));
  }

  public function special_offer()
  {
    $type = '2';
    $brand = product_company::orderBy('id', 'ASC')->get();
    $size = product_size_info::orderBy('id', 'ASC')->get();
    $color = product_color_info::orderBy('id', 'ASC')->get();
    $shop = offer_setup::orderBy('id', 'DESC')->where('type', '2')->where('status', '1')->paginate(10);
    return view('User.offer-page', compact('shop', 'brand', 'size', 'color', 'type'));
  }
  public function exclusive_offer()
  {
    $type = '3';
    $brand = product_company::orderBy('id', 'ASC')->get();
    $size = product_size_info::orderBy('id', 'ASC')->get();
    $color = product_color_info::orderBy('id', 'ASC')->get();
    $shop = offer_setup::orderBy('id', 'DESC')->where('type', '3')->where('status', '1')->paginate(10);
    return view('User.offer-page', compact('shop', 'brand', 'size', 'color', 'type'));
  }
  public function Best_sale()
  {

    $type = '4';
    $brand = product_company::orderBy('id', 'ASC')->get();
    $size = product_size_info::orderBy('id', 'ASC')->get();
    $color = product_color_info::orderBy('id', 'ASC')->get();
    $shop = offer_setup::orderBy('id', 'DESC')->where('type', '4')->where('status', '1')->paginate(10);
    return view('User.offer-page', compact('shop', 'brand', 'size', 'color', 'type'));
  }
  public function express_offer()
  {

    $type = '7';
    $brand = product_company::orderBy('id', 'ASC')->get();
    $size = product_size_info::orderBy('id', 'ASC')->get();
    $color = product_color_info::orderBy('id', 'ASC')->get();
    $shop = offer_setup::orderBy('id', 'DESC')->where('type', '5')->where('status', '1')->paginate(10);
    return view('User.offer-page', compact('shop', 'brand', 'size', 'color', 'type'));
  }
  public function flash_offer()
  {

    $type = '8';
    $brand = product_company::orderBy('id', 'ASC')->get();
    $size = product_size_info::orderBy('id', 'ASC')->get();
    $color = product_color_info::orderBy('id', 'ASC')->get();

    $datetime = DB::select('SELECT NOW() as dates');
    foreach ($datetime as $key => $value) {

      $newdate =   $value->dates;
    }



    $shop = offer_setup::orderBy('id', 'DESC')
    ->where('start_date_time', '<=', $newdate)
    ->where('end_date_time', '>=', $newdate)
    ->where('type', '1')
    ->where('status', '1')
    ->get();
    return view('User.flash-page', compact('shop', 'brand', 'size', 'color', 'type', 'newdate'));
  }

  public function searchproducts(Request $request)

  {

    $search  = $request->search;
    $category_id = $request->category_id;


    $searchproducts = DB::table('product_productinfo')
    ->where('category_id', $category_id)
    ->where('product_name', 'like', '%' . $search . '%')
    ->where('status', '1')
    ->paginate(18);

    return view('User.searchproducts', compact('searchproducts', 'category_id'));
  }
  public function search_Product_List(Request $request)

  {

    $search  = $request->searchtext;
    $cate_id  = $request->cate_id;



    $searchproducts = DB::table('product_productinfo')
    ->where('product_name', 'like', '%' . $search . '%')
    ->orwhere('product_id', 'like', '%' . $search . '%')
    ->where('status', '1')
    ->where('category_id', $cate_id)
    ->get();

    return view('User.home_search_Product_List', compact('searchproducts'));
  }
  public function Get_itemwiseproduct(Request $request)
  {

    $item_id  = $request->item_id;


    $datetime = DB::select('SELECT NOW() as dates');
    foreach ($datetime as $key => $value) {

      $newdate =   $value->dates;
    }




    $shop = offer_setup::orderBy('id', 'DESC')
    ->where('start_date_time', '<=', $newdate)
    ->where('end_date_time', '>=', $newdate)
    ->where('item_id', '=', $item_id)
    ->where('type', '1')
    ->where('status', '1')
    ->get();

    return view('User.showflash', compact('shop'));
  }

  public function Get_catwiseproduct(Request $request)

  {

    $category_id  = $request->category_id;

    $datetime = DB::select('SELECT NOW() as dates');
    foreach ($datetime as $key => $value) {

      $newdate =   $value->dates;
    }



    $shop = offer_setup::orderBy('id', 'DESC')
    ->where('start_date_time', '<=', $newdate)
    ->where('end_date_time', '>=', $newdate)
    ->where('category_id', '=', $category_id)
    ->where('type', '1')
    ->where('status', '1')
    ->get();

    return view('User.showflash', compact('shop'));
  }

  public function Get_subcatwiseproduct(Request $request)
  {

    $subcat_id  = $request->subcat_id;

    $datetime = DB::select('SELECT NOW() as dates');
    foreach ($datetime as $key => $value) {

      $newdate =   $value->dates;
    }


    $shop = offer_setup::orderBy('id', 'DESC')
    ->where('start_date_time', '<=', $newdate)
    ->where('end_date_time', '>=', $newdate)
    ->where('subcategory_id', '=', $subcat_id)
    ->where('type', '1')
    ->where('status', '1')
    ->get();

    return view('User.showflash', compact('shop'));
  }


  public function Dhamaka_offer()
  {
    $type = "1";
    // date_default_timezone_set('Asia/Dhaka');
    $datetime = DB::select('SELECT NOW() as dates');
    foreach ($datetime as $key => $value) {

      $newdate =   $value->dates;
    }
    
    // return $newdate;

    $checkdate = DB::table('offer_control')
    ->where('discount_start', '<=', $newdate)
    ->where('discount_end', '>=', $newdate)
    ->first();
    // dd($checkdate);
    $group_cat=[];
    if($checkdate)
    {
      $group_cat = offer_setup::where('type', '5')
      ->where('status', '1')
      ->groupby('category_id')
      ->select('category_id')
      ->get();   
    }
    


    
    

    return view('User.Dhamaka_offer', compact( 'group_cat', 'newdate', 'type'));
    
    

  }

  public function dhamaka_offer_cat($name, $id, $type)

  {

    $category_id  = $id;

    $datetime = DB::select('SELECT NOW() as dates');
    foreach ($datetime as $key => $value) {

      $newdate =   $value->dates;
    }


    if ($type == '1') {

     $checkdate = DB::table('offer_control')
     ->where('discount_start', '<=', $newdate)
     ->where('discount_end', '>=', $newdate)
     ->first();
    // dd($checkdate);
     $shop=[];
     $brand=[];


     $shop = offer_setup::orderBy('id', 'DESC')
     ->where('category_id', '=', $category_id)
     ->where('type', '5')
     ->where('status', '1')
     ->get();


     $brand = DB::table('offer_setups')
     ->join('product_productinfo', 'product_productinfo.id', 'offer_setups.product_id')
     ->join('product_company', 'product_company.id', 'product_productinfo.brand_id')
     ->where('offer_setups.category_id', '=', $category_id)
     ->where('offer_setups.type', '5')
     ->where('offer_setups.status', '1')
     ->groupby('product_productinfo.brand_id')
     ->select('product_company.company_name', 'product_productinfo.brand_id')
     ->get();



      // return $shop[0]->product->brand->company_name;

     
   } else if ($type == '2') {

    $checkdate = DB::table('offer_control')
    ->where('life_start', '<=', $newdate)
    ->where('life_end', '>=', $newdate)
    ->first();
    // dd($checkdate);
    $shop=[];
    $brand=[];


    $shop = offer_setup::orderBy('id', 'DESC')
    ->where('category_id', '=', $category_id)
    ->where('type', '7')
    ->where('status', '1')
    ->get();


    $brand = DB::table('offer_setups')
    ->join('product_productinfo', 'product_productinfo.id', 'offer_setups.product_id')
    ->join('product_company', 'product_company.id', 'product_productinfo.brand_id')
    ->where('offer_setups.category_id', '=', $category_id)
    ->where('offer_setups.type', '7')
    ->where('offer_setups.status', '1')
    ->groupby('product_productinfo.brand_id')
    ->select('product_company.company_name', 'product_productinfo.brand_id')
    ->get();

    
  } else if ($type == '3') {

   $checkdate = DB::table('offer_control')
   ->where('gadget_start', '<=', $newdate)
   ->where('gadget_end', '>=', $newdate)
   ->first();
    // dd($checkdate);
   $shop=[];
   $brand=[];

   $shop = offer_setup::orderBy('id', 'DESC')
   ->where('category_id', '=', $category_id)
   ->where('type', '8')
   ->where('status', '1')
   ->get();


   $brand = DB::table('offer_setups')
   ->join('product_productinfo', 'product_productinfo.id', 'offer_setups.product_id')
   ->join('product_company', 'product_company.id', 'product_productinfo.brand_id')
   ->where('offer_setups.start_date_time', '<=', $newdate)
   ->where('offer_setups.end_date_time', '>=', $newdate)
   ->where('offer_setups.category_id', '=', $category_id)
   ->where('offer_setups.type', '8')
   ->where('offer_setups.status', '1')
   ->groupby('product_productinfo.brand_id')
   ->select('product_company.company_name', 'product_productinfo.brand_id')
   ->get();

 } else if ($type == '4') {

  $checkdate = DB::table('offer_control')
  ->where('deshi_start', '<=', $newdate)
  ->where('deshi_end', '>=', $newdate)
  ->first();
    // dd($checkdate);
  $shop=[];
  $brand=[];
  

  $shop = offer_setup::orderBy('id', 'DESC')
  ->where('category_id', '=', $category_id)
  ->where('type', '9')
  ->where('status', '1')
  ->get();


  $brand = DB::table('offer_setups')
  ->join('product_productinfo', 'product_productinfo.id', 'offer_setups.product_id')
  ->join('product_company', 'product_company.id', 'product_productinfo.brand_id')
  ->where('offer_setups.category_id', '=', $category_id)
  ->where('offer_setups.type', '9')
  ->where('offer_setups.status', '1')
  ->groupby('product_productinfo.brand_id')
  ->select('product_company.company_name', 'product_productinfo.brand_id')
  ->get();

}



return view('User.dhamaka_offer_cat', compact('shop', 'type', 'brand'));
}


public function Lifestyle_mela()
{
  $type = "2";
  $datetime = DB::select('SELECT NOW() as dates');
  foreach ($datetime as $key => $value) {

    $newdate =   $value->dates;
  }

  $checkdate = DB::table('offer_control')
  ->where('life_start', '<=', $newdate)
  ->where('life_end', '>=', $newdate)
  ->first();
    // dd($checkdate);
  $group_cat=[];

  if($checkdate)
  {
   $group_cat = offer_setup::
   where('type', '7')
   ->where('status', '1')
   ->groupby('category_id')
   ->select('category_id')
   ->get();  
 }



 
 return view('User.Dhamaka_offer', compact( 'group_cat', 'newdate', 'type'));
}



public function Gadget_Mela()
{
  $type = "3";

  $datetime = DB::select('SELECT NOW() as dates');
  foreach ($datetime as $key => $value) {

    $newdate =   $value->dates;
  }

  $checkdate = DB::table('offer_control')
  ->where('gadget_start', '<=', $newdate)
  ->where('gadget_end', '>=', $newdate)
  ->first();
    // dd($checkdate);
  $group_cat=[];

  if($checkdate)
  {
    $group_cat = offer_setup::
    where('type', '8')
    ->where('status', '1')
    ->groupby('category_id')
    ->select('category_id')
    ->get();  
  }



  return view('User.Dhamaka_offer', compact( 'group_cat', 'newdate', 'type'));
}







public function Deshi_mela()
{
  $type = "4";
  $datetime = DB::select('SELECT NOW() as dates');
  foreach ($datetime as $key => $value) {

    $newdate =   $value->dates;
  }

  $checkdate = DB::table('offer_control')
  ->where('deshi_start', '<=', $newdate)
  ->where('deshi_end', '>=', $newdate)
  ->first();
    // dd($checkdate);
  $group_cat=[];
  
  if($checkdate)
  {
    $group_cat = offer_setup::
    where('type', '9')
    ->where('status', '1')
    ->groupby('category_id')
    ->select('category_id')
    ->get();
  }



  return view('User.Dhamaka_offer', compact( 'group_cat', 'newdate', 'type'));
}



public function products(){
  $product_cat = DB::table('product_productinfo')->inRandomorder()->where('status',1)->paginate(18);
  return view('User.products',compact('product_cat'));
}




public function searchallproduct(Request $request){

  $search  = $request->searchallproduct;
  $product_cat = DB::table('product_productinfo')
  ->where('product_name', 'like', '%' . $search . '%')
  ->where('status', 1)
  ->paginate(18);
  return view('User.products', compact('product_cat'));
}


public function review(){
  return view('User.review');
}






public function addpost(Request $request){


  if (Auth::guard('guest')) {

    if($request->details || $request->file('image')){

      $data = array();
      $data['user_id'] = auth('guest')->user()->id;
      $data['details'] = $request->details;
      $data['date']    = date('d M Y');
      $postimage       = $request->file('image');
      if ($postimage) {

        $image_one_name= hexdec(uniqid()).'.'.$postimage->getClientOriginalExtension();
        Image::make($postimage)->save('public/postimage/'.$image_one_name,60);
        $data['image']='public/postimage/'.$image_one_name;

        $insert=DB::table('posts')
        ->insert($data);

      }else{
        $insert=DB::table('posts')
        ->insert($data);

      }

    }
    else{


    }

  }
  else{
    return redirect('/');
  }


}


public function allpost(){
  $data = DB::table('posts')
  ->orderBy('posts.id','DESC')
  ->join('guest','guest.id','posts.user_id')
  ->select('posts.*','guest.first_name','guest.image as userimg')
  ->paginate(3);

  return view('User.allpost',compact('data'));
}



public function Hot_Deals(){
  $product_cat = DB::table('product_productinfo')->inRandomorder()->where('status',1)->where('hot_deals',1)->paginate(18);
  return view('User.Hot_Deals',compact('product_cat'));
}


public function Track_order(){
  return view('User.Track_order');
}



public function searchorder(Request $request){
  $phone      = $request->phone;
  $invoice_id = $request->invoice_no;

  $data = DB::table('invoices')
  ->where('invoices.invoice_id',$invoice_id)
  ->where('invoices.guest_id',Auth('guest')->user()->id)
  ->first();

  return view('User.searchorder',compact('data'));
}

public function exchange_policy(){
  return view('User.exchange-policy');
}

public function submit_exchange_request(Request $request){
  $validator = Validator::make($request->all(), [
    'name' => 'required',
    'phone_number' => 'required',
    'email' => 'required',
    'order_number' => 'required',
    'reason' => 'required',
    'return_product_style_number' => 'required',
    'return_product_size' => 'required',
    'return_product_color' => 'required',
    'exchange_product_style_number' => 'required',
    'exchange_product_size' => 'required',
    'exchange_product_color' => 'required',
  ]);

  if ($validator->fails()) {
    return redirect()->back()
             ->withErrors($validator)
             ->withInput();
  }

  $data = new ExchangeRequest();
  $data->name = $request->name;
  $data->phone_number = $request->phone_number;
  $data->email = $request->email;
  $data->order_number = $request->order_number;
  $data->reason = $request->reason;
  $data->return_product_style_number = $request->return_product_style_number;
  $data->return_product_size = $request->return_product_size;
  $data->return_product_color = $request->return_product_color;
  $data->exchange_product_style_number = $request->exchange_product_style_number;
  $data->exchange_product_size = $request->exchange_product_size;
  $data->exchange_product_color = $request->exchange_product_color;
  $data->message = $request->message;
  $data->status = 0;
  $data->save();

    $notification = array(
      'messege'   => 'Request submited successfully',
      'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);

}

public function howtobuys(){
  $data = DB::table('how_buys')->first();
  return view('User.howtobuys',compact('data'));
}



public function hugesaving(){
  $data = DB::table('product_productinfo')
  ->where('offer_id',1)
  ->orderBy('id','DESC')
  ->paginate(16);
  $name = "Huge Savings";
  return view('User.hugesaving',compact('data','name'));
}



public function ordersavemore(){
  $data = DB::table('product_productinfo')
  ->where('offer_id',2)
  ->orderBy('id','DESC')
  ->paginate(16);
  $name = "Order More Save More";
  return view('User.hugesaving',compact('data','name'));
}




public function dicountoffer(){
  $data = DB::table('product_productinfo')
  ->where('offer_id',3)
  ->orderBy('id','DESC')
  ->paginate(16);
  $name = "Special Discount Offers";
  return view('User.hugesaving',compact('data','name'));
}


public function buyget(){
  $data = DB::table('product_productinfo')
  ->where('offer_id',4)
  ->orderBy('id','DESC')
  ->paginate(16);
  $name = "Buy 1 Get 1";
  return view('User.hugesaving',compact('data','name'));
}



public function specialservices(){
  $data = DB::table('product_productinfo')
  ->where('offer_id',5)
  ->orderBy('id','DESC')
  ->paginate(16);
  $name = "Special Services";
  return view('User.hugesaving',compact('data','name'));
}



public function Location(Request $r){

  $getlocation = $r->area;
  return view('User.layouts.home',compact('getlocation'));
 
}

  public function page_details($slug)
  {
    $page = DB::table('pages')->where('slug', $slug)->first();
    return view('User.pages.page_details', compact('page'));
  }



}
