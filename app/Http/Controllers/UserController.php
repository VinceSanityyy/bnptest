<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\Payment;
use App\Models\User;
use Carbon\Carbon;
use DB;
class UserController extends Controller
{
    public function fetchUsers(){
        $data =  DB::table('users')
                ->join('payments','payments.user_id','users.id')
                ->join('loans','loans.user_id','users.id')
                ->where('payments.payment_date','<',[Carbon::now()->format('Y-m-d')])
                ->select(['payments.id','users.name','users.email','loans.loan_amount',
                'payments.amount as latest_payment','payments.payment_date'])
                ->get();

        return response()->json($data);
    }
}
