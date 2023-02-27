<?php

namespace App\Http\Controllers;

use App\Models\BloodRequest;
use App\Models\Requests;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;
use Twilio\Rest\Client;

class RequestController extends Controller
{
    public function donateRequests()
    {
        $requests = Requests::where('approve', '=', 0)->get();
        $accepted_requests = Requests::where('approve', '=', 1)->get();
        return view('request.donate', compact('requests', 'accepted_requests'));
    }
    public function receiveRequests()
    {
        $requests = BloodRequest::where('approve','=',0)->get();
        $accepted_requests = BloodRequest::where('approve','=',1)->get();
        // dd($accepted_requests);
        return view('request.receive', compact('requests', 'accepted_requests'));
    }
    public function donateRequestAccept(Request $request, $id)
    {
        $user = Requests::where('userid', '=', $id)->first();

        $receiverNumber = "+977" . $user->users[0]->phone;
        $message =
            "Hello " . $user->users[0]->name . ", your donation request has been accepted. Kindly visit our office located at:https://goo.gl/maps/jsEFbwW7FzaHig9f8 or follow our next event.\nAfter donation you'll get 100 reward points, that can be used to redeem various prizes.\nThank you,\nTeam: Fancy Freelancers ";

        try {

            $account_sid = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_TOKEN");
            $twilio_number = getenv("TWILIO_FROM");

            $client = new Client($account_sid, $auth_token);
            $client->messages->create($receiverNumber, [
                'from' => $twilio_number,
                'body' => $message
            ]);

            $user->update([
                'approve' => 1,
            ]);
            $user->users[0]->update([
                'RewardPointsUpdated' => 0,
            ]);
        } catch (Exception $e) {
            dd("Error: " . $e->getMessage());
        }

        return back();
    }
    public function receiveRequestAccept($id)
    {
        $user = BloodRequest::findOrFail($id);

        // $receiverNumber = "+977" . $user->phone;
        // $message = "Hello " . $user->name . ", your blood request has been accepted. Kindly visit our office located at:https://goo.gl/maps/jsEFbwW7FzaHig9f8 or follow our next event.\nThank you,\nTeam: Fancy Freelancers ";

        // try {

        //     $account_sid = getenv("TWILIO_SID");
        //     $auth_token = getenv("TWILIO_TOKEN");
        //     $twilio_number = getenv("TWILIO_FROM");

        //     $client = new Client($account_sid, $auth_token);
        //     $client->messages->create($receiverNumber, [
        //         'from' => $twilio_number,
        //         'body' => $message
        //     ]);

        //     $userReq->update([
        //         'approve' => 1,
        //     ]);
        // } catch (Exception $e) {
        //     dd("Error: " . $e->getMessage());
        // }
        $user->approve = 1;
        $user->update();
        return back()->with('success', 'Request accepted succesfully');
    }
    public function receiveRequestRecheck( $id)
    {
        $user = BloodRequest::findOrFail($id);
        $user->approve = 0;
        $user->update();
        return back()->with('success', 'Request resent for review');
    }
    public function receiveRequestDelete($id)
    {
        $user = BloodRequest::findOrFail($id);
        $path = public_path('/images/requisitionForm/' . $user->image);
        if (file_exists($path)) {
            unlink($path);
        }
        $user->delete();

        return back()->with('success', 'Request Deleted ');
    }

    public function updateRewardPoints($id)
    {
        $user = User::findOrFail($id);
        $updated = $user->RewardPointsUpdated;
        if (!$updated) {
            $user->update([
                'RewardPoints' => $user->RewardPoints + 100,
                'RewardPointsUpdated' => 1,
            ]);
            return back()->with('success', 'Reward Points updated !');
        } else {
            return back()->with('error', 'Points already updated !');
        }
    }
}
