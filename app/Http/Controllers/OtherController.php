<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use DB;
use Str;

class OtherController extends Controller
{
	public function about_us()
	{
		$about = DB::table('about_us')
			->first();
		return view('Admin.other.about', compact('about'));
	}


	public function updateabout_us(Request $request, $id)
	{

		$data = array();
		$data['description'] = $request->details;
		DB::table('about_us')
			->where('id', $id)
			->update($data);
		$notification = array(
			'messege'   => 'Update Successfull',
			'alert-type' => 'success'
		);
		return redirect()->back()->with($notification);
	}



	public function term()
	{
		$term = DB::table('terms_use')
			->first();
		return view('Admin.other.term', compact('term'));
	}


	public function updateterm(Request $request, $id)
	{

		$data = array();
		$data['description'] = $request->details;
		DB::table('terms_use')
			->where('id', $id)
			->update($data);
		$notification = array(
			'messege'   => 'Update Successfull',
			'alert-type' => 'success'
		);
		return redirect()->back()->with($notification);
	}




	public function privacy()
	{
		$privacy = DB::table('privacy_policy')
			->first();
		return view('Admin.other.privacy', compact('privacy'));
	}


	public function updateprivacy(Request $request, $id)
	{

		$data = array();
		$data['description'] = $request->details;
		DB::table('privacy_policy')
			->where('id', $id)
			->update($data);
		$notification = array(
			'messege'   => 'Update Successfull',
			'alert-type' => 'success'
		);
		return redirect()->back()->with($notification);
	}

	public function cookie()
	{
		$cookie = DB::table('cookie_policy')
			->first();
		return view('Admin.other.cookie', compact('cookie'));
	}

	public function updatecookie(Request $request, $id)
	{

		$data = array();
		$data['description'] = $request->details;
		DB::table('cookie_policy')
			->where('id', $id)
			->update($data);
		$notification = array(
			'messege'   => 'Update Successfull',
			'alert-type' => 'success'
		);
		return redirect()->back()->with($notification);
	}

	public function purchasing()
	{
		$purchasing = DB::table('purchasing_policy')
			->first();
		return view('Admin.other.purchasing', compact('purchasing'));
	}

	public function updatepurchasing(Request $request, $id)
	{

		$data = array();
		$data['description'] = $request->details;
		DB::table('purchasing_policy')
			->where('id', $id)
			->update($data);
		$notification = array(
			'messege'   => 'Update Successfull',
			'alert-type' => 'success'
		);
		return redirect()->back()->with($notification);
	}

	public function return_policy()
	{
		$return_policy = DB::table('return_policy')
			->first();
		return view('Admin.other.return_policy', compact('return_policy'));
	}

	public function updatereturn(Request $request, $id)
	{

		$data = array();
		$data['description'] = $request->details;
		DB::table('return_policy')
			->where('id', $id)
			->update($data);
		$notification = array(
			'messege'   => 'Update Successfull',
			'alert-type' => 'success'
		);
		return redirect()->back()->with($notification);
	}

	public function seller_policy()
	{
		$seller_policy = DB::table('seller_policy')
			->first();
		return view('Admin.other.seller_policy', compact('seller_policy'));
	}

	public function updateseller(Request $request, $id)
	{

		$data = array();
		$data['description'] = $request->details;
		DB::table('seller_policy')
			->where('id', $id)
			->update($data);
		$notification = array(
			'messege'   => 'Update Successfull',
			'alert-type' => 'success'
		);
		return redirect()->back()->with($notification);
	}

	public function merchant_zone()
	{
		$merchant_zone = DB::table('merchant_zone')
			->first();
		return view('Admin.other.merchant_zone', compact('merchant_zone'));
	}

	public function updatemerchantzone(Request $request, $id)
	{

		$data = array();
		$data['description'] = $request->details;
		DB::table('merchant_zone')
			->where('id', $id)
			->update($data);
		$notification = array(
			'messege'   => 'Update Successfull',
			'alert-type' => 'success'
		);
		return redirect()->back()->with($notification);
	}

	public function seller_zone()
	{
		$seller_zone = DB::table('seller_zone')
			->first();
		return view('Admin.other.seller_zone', compact('seller_zone'));
	}

	public function updatesellerzone(Request $request, $id)
	{

		$data = array();
		$data['description'] = $request->details;
		DB::table('seller_zone')
			->where('id', $id)
			->update($data);
		$notification = array(
			'messege'   => 'Update Successfull',
			'alert-type' => 'success'
		);
		return redirect()->back()->with($notification);
	}




	public function faq()
	{
		$faq = DB::table('faq_infos')
			->first();
		return view('Admin.other.faq', compact('faq'));
	}


	public function updatefaq(Request $request, $id)
	{

		$data = array();
		$data['description'] = $request->details;
		DB::table('faq_infos')
			->where('id', $id)
			->update($data);
		$notification = array(
			'messege'   => 'Update Successfull',
			'alert-type' => 'success'
		);
		return redirect()->back()->with($notification);
	}



	public function contact_us()
	{
		$contact_us = DB::table('contact_us')
			->first();
		return view('Admin.other.contact_us', compact('contact_us'));
	}


	public function updatecontact_us(Request $request, $id)
	{

		$data = array();
		$data['description'] = $request->details;
		DB::table('contact_us')
			->where('id', $id)
			->update($data);
		$notification = array(
			'messege'   => 'Update Successfull',
			'alert-type' => 'success'
		);
		return redirect()->back()->with($notification);
	}



	public function howtobuy()
	{
		$buys = DB::table('how_buys')
			->first();
		return view('Admin.other.how_buys', compact('buys'));
	}


	public function updatehowtobuy(Request $request, $id)
	{

		$data = array();
		$data['description'] = $request->details;
		DB::table('how_buys')
			->where('id', $id)
			->update($data);
		$notification = array(
			'messege'   => 'Update Successfull',
			'alert-type' => 'success'
		);
		return redirect()->back()->with($notification);
	}


	public function COD()
	{
		$cod = DB::table('cod_us')
			->first();
		return view('Admin.other.cod', compact('cod'));
	}


	public function updatecod(Request $request, $id)
	{

		$data = array();
		$data['description'] = $request->details;
		DB::table('cod_us')
			->where('id', $id)
			->update($data);
		$notification = array(
			'messege'   => 'Update Successfull',
			'alert-type' => 'success'
		);
		return redirect()->back()->with($notification);
	}


	public function CareerAdd()
	{
		$career = DB::table('career_infos')
			->first();
		return view('Admin.other.CareerAdd', compact('career'));
	}


	public function updateCareerAdd(Request $request, $id)
	{

		$data = array();
		$data['description'] = $request->details;
		DB::table('career_infos')
			->where('id', $id)
			->update($data);
		$notification = array(
			'messege'   => 'Update Successfull',
			'alert-type' => 'success'
		);
		return redirect()->back()->with($notification);
	}


	public function announcementadd()
	{
		$data = DB::table('announcement')
			->orderby('id', 'DESC')
			->first();
		return view('Admin.other.announcement', compact('data'));
	}


	public function insertannouncement(Request $request)
	{

		$data = array();
		$data['description'] = $request->description;
		$data['title'] = $request->title;
		DB::table('announcement')
			->insert($data);
		$notification = array(
			'messege'   => 'Update Successfull',
			'alert-type' => 'success'
		);
		return redirect()->back()->with($notification);
	}

	public function newsadd()
	{
		$data = DB::table('news')
			->orderby('id', 'DESC')
			->first();
		return view('Admin.other.news', compact('data'));
	}


	public function insertnews(Request $request)
	{

		$data = array();
		$data['description'] = $request->description;
		DB::table('news')
			->insert($data);
		$notification = array(
			'messege'   => 'Update Successfull',
			'alert-type' => 'success'
		);
		return redirect()->back()->with($notification);
	}

	public function customermessage()
	{
		$data = DB::table('customer_messages')
			->get();
		return view('Admin.other.customer_sms', compact('data'));
	}


	public function customersmsdelete($id)
	{


		DB::table('customer_messages')
			->where('id', $id)
			->delete();
		$notification = array(
			'messege'   => 'Delete Successfull',
			'alert-type' => 'error'
		);
		return redirect()->back()->with($notification);
	}


	public function setting()
	{

		$view  = DB::table('settings')->first();
		return view('Admin.other.settings', compact('view'));
	}



	public function updatesetting(Request $request, $id)
	{
		$data = array();
		$data['title'] = $request->title;
		$data['inside_dhaka'] = $request->inside_dhaka;
		$data['outside_dhaka'] = $request->outside_dhaka;
		$data['number_1'] = $request->number_1;
		$data['number_2'] = $request->number_2;
		$data['marquee'] = $request->marquee;
		$data['address'] = $request->address;
		$data['short_des'] = $request->short_des;
		$data['reward_points'] = $request->reward_points;
		$data['exchange_policy'] = $request->exchange_policy;
		$data['exchange_policy_title'] = $request->exchange_policy_title;
		$data['hotline'] = $request->hotline;
		$data['email'] = $request->email;
		$data['facebook'] = $request->facebook;
		$data['twitter'] = $request->twitter;
		$data['instragram'] = $request->instragram;
		$data['youtube'] = $request->youtube;
		$data['api_url'] = $request->api_url;
		$data['api_key'] = $request->api_key;
		$data['senderid'] = $request->senderid;
		
        $logo = $request->file('logo');
        if($logo)
        {
            $image_name= str::random(10);
            $orginalExtension = $logo->getClientOriginalExtension();
            $image_full_name = $image_name.'.'.$orginalExtension;
            $upload_path = public_path('/siteImage/');
            $image_url = $upload_path.$image_full_name;
            $success = $logo->move($upload_path, $image_full_name);
            // $img = Image::make($image_url)->resize(224, 50)->save();
            if($success)
            {
                $data['logo'] = $image_full_name;
            }
        }
		
        $favicon = $request->file('favicon');
        if($favicon)
        {
            $image_name= str::random(10);
            $orginalExtension = $favicon->getClientOriginalExtension();
            $image_full_name = $image_name.'.'.$orginalExtension;
            $upload_path = public_path('/siteImage/');
            $image_url = $upload_path.$image_full_name;
            $success = $favicon->move($upload_path, $image_full_name);
            $img = Image::make($image_url)->resize(16, 16)->save();
            if($success)
            {
                $data['favicon'] = $image_full_name;
            }
        }
		
        $call_for_order_image = $request->file('call_for_order_image');
        if($call_for_order_image)
        {
            $image_name= str::random(10);
            $orginalExtension = $call_for_order_image->getClientOriginalExtension();
            $image_full_name = $image_name.'.'.$orginalExtension;
            $upload_path = public_path('/callForOrderImage/');
            $image_url = $upload_path.$image_full_name;
            $success = $call_for_order_image->move($upload_path, $image_full_name);
            if($success)
            {
                $data['call_for_order_image'] = $image_full_name;
            }
        }
		
        $ex_re_image = $request->file('ex_re_image');
        if($ex_re_image)
        {
            $image_name= str::random(10);
            $orginalExtension = $ex_re_image->getClientOriginalExtension();
            $image_full_name = $image_name.'.'.$orginalExtension;
            $upload_path = public_path('/ExReImage/');
            $image_url = $upload_path.$image_full_name;
            $success = $ex_re_image->move($upload_path, $image_full_name);
            if($success)
            {
                $data['ex_re_image'] = $image_full_name;
            }
        }
		
        $offer_banner = $request->file('offer_banner');
        if($offer_banner)
        {
            $image_name= str::random(10);
            $orginalExtension = $offer_banner->getClientOriginalExtension();
            $image_full_name = $image_name.'.'.$orginalExtension;
            $upload_path = public_path('/OfferBanner/');
            $image_url = $upload_path.$image_full_name;
            $success = $offer_banner->move($upload_path, $image_full_name);
            if($success)
            {
                $data['offer_banner'] = $image_full_name;
            }
        }


		DB::table('settings')
			->where('id', $id)
			->update($data);
		$notification = array(
			'messege'   => 'Update Successfull',
			'alert-type' => 'success'
		);
		return redirect()->back()->with($notification);
	}
}
