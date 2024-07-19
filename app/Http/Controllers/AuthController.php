<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapClient;
use stdClass;
use Exception;


class AuthController extends Controller
{
    public function login(Request $request){
        try{
            // Validate the incoming request data
            $request->validate([
                'username' => 'required',
                'password' => 'required'
            ]);


            // Configuration for the SOAP client
            $webServiceUrl = config('app.webService');
            $username = config('app.soapUsername');
            $password = config('app.soapPassword');
            $options = [
                'login' => $username,
                'password' => $password,
                'cache_wsdl' => WSDL_CACHE_NONE
            ];

            // Create a new SOAP client instance with options
            $service = new SoapClient($webServiceUrl, $options);




            // Prepare the parameters for the SOAP request
            $params = new stdClass();
            $params->userName = trim($request->username);;
            $params->password = trim($request->password);

            // return response()->json(['response' => 'success', 'message' => 'Login successful.' , 'data'=> $params]);

            // Call the AuthenticatePortalUser method on the SOAP service
            $res = $service->Login($params);

            $bool = $res->return_value;
            if($bool){
                $userParams = new stdClass();
                $userParams->userName = trim($request->username);
                $res =  $service->UserProfile($userParams);

                $userDetails =  $res->return_value;
                $decodedData =  json_decode($userDetails, true);

                // dd($decodedData['email']);
                //user details
                session(['userName' => $decodedData['userName'] ?? 'DefaultUserName']);
                session(['fullName' => $decodedData['fullName'] ?? 'DefaultName']);
                session(['phoneNo' => $decodedData['phoneNo'] ?? 'DefaultPhoneNo']);
                session(['email' => $decodedData['email'] ?? 'DefaultEmail']);
                session(['locationcode' => $decodedData['locationCode'] ?? 'LocationCode']);
                session(['picture' => $decodedData['image'] ?? 'image']);

                // dd(session())

                return response()->json(['response' => 'success', 'message' => 'Login successful.', 'data' => $res]);
            }
            else{
                return response()->json(['response' => 'failure', 'message' => 'Invalid username or password.', 'data' => $res]);
            }

        }
        catch(Exception $ex){
            return response()->json(['response' => 'failure', 'message' => $ex->getMessage()]);
        }
    }


    public function forgotPassword(Request $request){
        try {

             $request->validate([
                'username' => 'required',
            ]);
                        // Configuration for the SOAP client
                        $webServiceUrl = config('app.webService');
                        $username = config('app.soapUsername');
                        $password = config('app.soapPassword');
                        $options = [
                            'login' => $username,
                            'password' => $password,
                            'cache_wsdl' => WSDL_CACHE_NONE
                        ];

                        // Create a new SOAP client instance with options
                        $service = new SoapClient($webServiceUrl, $options);

                        // Display all available methods
                        $functions = $service->__getFunctions();


                        // Prepare the parameters for the SOAP request
                        $params = new stdClass();
                        $params->employeeNo = trim($request->username);
                        // $params->password = trim($request->password);
                        $res = $service->ForgotPortalUserPassword($params);
                        // dd($res);
                        $return_value = $res->return_value;
                        if($return_value){
                            return response()->json(['response' => 'success', 'message' => 'Password reset link sent to your email.', 'employeeNo' => $request->username]);
                        }
                        else{
                            return response()->json(['response' => 'failure', 'message' => 'Invalid Employee Number.']);
                        }


        } catch (\Throwable $th) {
            //throw $th;

            return response()->json(['response' => 'failure', 'message' => $th->getMessage()]);
        }
    }


    public function verifyOTP(Request $request){
        try {
            //code...
             $request->validate([
                'username' => 'required',
                'otp' => 'required',
            ]);
             $webServiceUrl = config('app.webService');
             $username = config('app.soapUsername');
             $password = config('app.soapPassword');
             $options = [
                 'login' => $username,
                 'password' => $password,
                 'cache_wsdl' => WSDL_CACHE_NONE
             ];

             // Create a new SOAP client instance with options
             $service = new SoapClient($webServiceUrl, $options);

             // Display all available methods
             $functions = $service->__getFunctions();

             // Prepare the parameters for the SOAP request
             $params = new stdClass();
             $params->employeeNo = trim($request->username);
             $params->userOTP = trim($request->otp);
             $res = $service->VerifyPortalUserOTP($params);
             // dd($res);
             $return_value = $res->return_value;
             if($return_value){
                 return response()->json(['response' => 'success', 'message' => 'OTP verified.', 'employeeNo' => $request->username]);
             }
             else{
                 return response()->json(['response' => 'failure', 'message' => 'Invalid OTP.']);
             }

        } catch (\Throwable $th) {
            //throw $th;

            return response()->json(['response' => 'failure', 'message' => $th->getMessage()]);
        }
    }

//     <SetPortalUserPassword xmlns="urn:microsoft-dynamics-schemas/codeunit/OnlinePortal">
//     <employeeNo>[string]</employeeNo>
//     <newPassword>[string]</newPassword>
// </SetPortalUserPassword>

 public function changePassword(Request $request){
     try {

        //  dd($request->all());
         $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

         $webServiceUrl = config('app.webService');
         $username = config('app.soapUsername');
         $password = config('app.soapPassword');
         $options = [
             'login' => $username,
             'password' => $password,
             'cache_wsdl' => WSDL_CACHE_NONE
         ];

         // Create a new SOAP client instance with options
         $service = new SoapClient($webServiceUrl, $options);

         // Display all available methods
         $functions = $service->__getFunctions();

         // Prepare the parameters for the SOAP request
         $params = new stdClass();
         $params->employeeNo = trim($request->username);
         $params->newPassword = trim($request->password);
         $res = $service->SetPortalUserPassword($params);
         // dd($res);
         $return_value = $res->return_value;
         if($return_value){
             return response()->json(['response' => 'success', 'message' => 'Password changed.']);
         }
         else{
             return response()->json(['response' => 'failure', 'message' => 'Invalid Employee Number.']);
         }
     } catch (\Throwable $th) {
        //throw $th;

        return response()->json(['response' => 'failure', 'message' => $th->getMessage()]);
     }
 }

 public function dashboard()
	{
		if (session('userName') == "") {
			return redirect('/');
		} else {

			// $res = GeneralController::getNavData($odataUrl);
			return view('pages.dashboard.dashboard');
		}
	}

    public function logout()
	{
		session()->flush();
		return redirect('/');
	}
}
