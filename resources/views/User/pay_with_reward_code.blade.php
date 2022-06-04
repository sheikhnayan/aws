elseif($request->delivery_type == 'pay_with_reward_points'){


    $guest = guest::where('id', $data->guest_id)->first();
    $exist_points = $guest->reward_points;

    $sub_total = $data->sub_total;

    $rate = $settings->reward_points;

    $need_points = $sub_total/$rate;
    dd($need_points);


    if($exist_points >= $need_points){

      $available_point = $exist_points - $need_points;

      $guestPoint = guest::where('id', $guest->id)->update(['reward_points' => $available_point]);

      $invoiceinfo  = array(

        'payment_type'=>$request->delivery_type,
        'reward_points'   => 0,
      );

    }else{

      $notification=array(
        'messege'   =>'Insufficient reward points',
        'alert-type'=>'error'
      );
      return redirect()->back()->with($notification);
    }

  }