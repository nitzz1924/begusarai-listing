<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Models\BusinessList;
use App\Models\BuyPlan;
use App\Models\Package;

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

        if (count($input) && !empty($input['razorpay_payment_id'])) {
            try {
                $payment->capture(['amount' => $payment['amount']]);
            } catch (\Exception $e) {
                return $e->getMessage();
                \Session::put('error', $e->getMessage());
                return redirect()->back();
            }
        }

        $payInfo = [
            'payment_id' => $request->razorpay_payment_id,
            'user_id' => '1',
            'amount' => $request->amount,
        ];

        Payment::insertGetId($payInfo);
        \Session::put('success', 'Payment successful');
        return response()->json(['success' => 'Payment successful']);
    }
    public function paymentresult(Request $request)
    {
        $currentDate = Carbon::now();
        $nextMonth = $currentDate->addMonth(1);
        $formattedDate = $nextMonth->toDateTimeString();
        $data = $request->all();
        $id = $data['bId'];
        $plan = Package::orderBy('created_at', 'asc')
            ->where('id', '=', $data['pId'])
            ->first();

        $resource = BusinessList::find($id);
        if (!$resource) {
            // Handle the case where the resource is not found
            return response()->json(['message' => 'Resource not found'], 404);
        }
        if ($plan->type == 'BUSINESS LISTING') {
            $resource->status = '1';
            $resource->planStatus = '1';
        } elseif ($plan->type == 'FEATURED LISTING') {
            $resource->featured_ranking = $plan->noOfPlace;
        } elseif ($plan->type == 'Ranking') {
            if ($plan->featuredType == 'city_listing') {
                $resource->city_ranking = $plan->noOfPlace;
            }
            if ($plan->featuredType == 'home_featured') {
                $resource->home_featured = $plan->noOfPlace;
            }
            if ($plan->featuredType == 'category_listing') {
                $resource->category_ranking = $plan->noOfPlace;
            }
            if ($plan->featuredType == 'search_results') {
                $resource->search_results = $plan->noOfPlace;
            }
        }
        $resource->save();
        $model = new BuyPlan();
        $model->userId = $data['uId'];
        $model->businessId = $data['bId'];
        $model->planId = $data['pId'];
        $model->expair_at = $formattedDate;
        $model->save();
        return view('frontend.paymentresult', compact('data'));
    }
}
