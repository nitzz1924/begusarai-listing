<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Models\BusinessList;
use App\Models\BuyPlan;
use Illuminate\Support\Carbon;
class RazorpayController extends Controller
{
   public function payment()
{
    
    return view('frontend.payment');
}
public function handlePayment(Request $request)
{
    $input = $request->all();

        $api = new Api(env('RAZORPAY_KEY_ID'), env('RAZORPAY_KEY_SECRET'));

        $payment = $api->payment->fetch($request->razorpay_payment_id);

        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {

                $payment->capture(array('amount'=>$payment['amount']));

            } catch (\Exception $e) {
                return  $e->getMessage();
                \Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }

        $payInfo = [
                   'payment_id' => $request->razorpay_payment_id,
                   'user_id' => '1',
                   'amount' => $request->amount,
                ];
                
        Payment::insertGetId($payInfo);  
        \Session::put('success', 'Payment successful',);
        return response()->json(['success' => 'Payment successful']);
}
public function paymentresult(Request $request)
{
   $currentDate = Carbon::now();
$nextMonth = $currentDate->addMonth(1);
$formattedDate = $nextMonth->toDateTimeString();

    $data=$request->all();
    $id=$data['bId'];
    $resource = BusinessList::find($id);
    if (!$resource) {
        // Handle the case where the resource is not found
        return response()->json(['message' => 'Resource not found'], 404);
    }
    $resource->status = '1';
    $resource->planStatus = '1';
    $resource->save();
    $model = new BuyPlan;
    $model->userId = $data['uId'];;
    $model->businessId = $data['bId'];;
    $model->planId = $data['pId'];;
    $model->expair_at = $formattedDate;
    $model->save();
   return view('frontend.paymentresult', compact('data'));
}

}
