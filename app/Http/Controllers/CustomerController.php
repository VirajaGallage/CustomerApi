<?php


namespace App\Http\Controllers;

use App\Models\Ads;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response; 

class CustomerController extends Controller
{
    use ApiResponse;

    /**
     * @return \Illuminate\Http\Response
     */

    public function index(){
        $ads = Ads::all();
       return $this->successResponse($ads);
    }

    //Ad creation

    public function store(Request $request){
        $validations = [
            'property_category' =>  'required|max:255',
            'location'   =>  'required',
            'city' => 'required',
            'district' => 'required',
            'address_of_property'  =>  'required',
            'details'  =>  'required',
            'email' => 'required',
            'contact_no' => 'required|min:10',
            'price'  =>  'required|min:1',
            'rooms' => 'required',
            'washrooms' => 'required',
            //'customer_id'     =>  'required|min:1',
            // 'images' => 'required|mimes:jpg,png|max:2048'
        ];

        $this -> validate($request, $validations);

        // $request->file->store('imageUploads', 'public');

        $ads = Ads::create($request->all());

        return $this->successResponse($ads, Response::HTTP_CREATED);

    }

    //Ad displaying =

    public function show($ads){
        $ads = Ads::findOrFail($ads);
        return $this->successResponse($ads);
    }

    //Edit Ad

    public function update(Request $request){
        $validations = [
            'property_category' =>  'required|max:255',
            'images' => 'required|mimes:jpg,png|max:2048',
            'location'   =>  'required',
            'address_of_property'  =>  'required',
            'details'  =>  'required',
            'email' => 'required',
            'contact_no' => 'required|min:10',
            'price'  =>  'required|min:1',
            'rooms' => 'required',
            'washrooms' => 'required',
        //    'customer_id'     =>  'required|min:1',
        ];
        $this->validate($request, $validations);
        $ads = Ads::findOrFail($author);
        $ads->fill($request->all());
        if($ads->isClean()){
            return $this->errorResponse("Atleast one value must change", Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $ads->save();
        return $this->successResponse($ads);
    }
    //Ad delete

    public function destroy($ads)
    {
        $ads = Ads::findOrFail($ads);
        $ads->delete();
        return $this->successResponse($ads);
    }

    //Payment slip upload

    public function paymentslipUpload()
    {
        $ad_id = $request->ad_id; 
        $slip = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);

        $payment = new paymentSlip();
        $payment->ad_id = $ad_id;
        $payment->slip = $imageName;

        $payment->save();

        return $this->successResponse($payment, Response::HTTP_CREATED);
    }

    //Appointment Request Mail Sending

    public function appointmentRequest()
    {
        
    }
}
