<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Transaction;
// use App\Http\Controllers\DB;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\PersonalInfo;

use Auth;



class AccountController extends Controller
{
    public function index(){
        return view('account.create'); 
    }

    public function addAccount(Request $request){
        $validated = $request->validate([
            'account_type' => 'required|max:150',
            'account_name' => 'required|max:150',
            'currency_type' => 'required|max:4',
            'monthly_earnings' => 'required|max:50',
        ]);

        $number = mt_rand(40000000000000,50000000000000);

        $account = new Account;
        $account->user_id = Auth::user()->id;
        $account->account_no = $number;
        $account->account_type = $request->account_type;
        $account->account_name = $request->account_name;
        $account->currency_type = $request->currency_type;
        $account->monthly_earnings = $request->monthly_earnings;
        $account->balance = 0;
        $account->status = 1;
        $account->save();

        return Redirect()->back()->with('success', 'Account created successfully.');
    }


    public function allAcc(){
        $accounts = Account::latest()->paginate(5);
        $trashAccounts = Account::onlyTrashed()->latest()->paginate(5);

        return view('admin.accounts', compact('accounts','trashAccounts'));
    }

    public function editAcc($id){
        $accounts = Account::find($id);

        return view('admin.editAccount', compact('accounts'));
    }

    public function updateAcc(Request $request, $id){
        $update = Account::find($id)->update([
            'account_type' => $request->account_type,
            'account_name' => $request->account_name,
            'currency_type' => $request->currency_type,
            'monthly_earnings' => $request->monthly_earnings,

        ]);


        return Redirect()->route('accounts')->with('success', 'Account Updated successfully.');

    }

    public function softdelete($id){
        $delete = Account::find($id)->delete();


        return Redirect()->back()->with('success',' Account Soft deleted successfully.');
    }

    public function restore($id){
        $restore = Account::withTrashed()->find($id)->restore();

        return Redirect()->back()->with('success',' Account Restored successfully.');

    }

    public function pdelete($id){
        $pdelete = Account::onlyTrashed()->find($id)->forceDelete();

        return Redirect()->back()->with('success',' Account Deleted permanently successfully.');

    }

    public function deposit(Request $request){
        $validated = $request->validate([
            'account_name' => 'required|max:150',
            'amount' => 'required|max:20',
            'account_no' => 'required|max:50',
        ]);

        $aid =  Auth::user()->id;

        $sender = Account::where('user_id', $aid)->get();
        // $i = compact('sender');
        // $i= [];

        // $i= $sender;
        // dd($i[0]);
        // dd(intval($i[0]['balance']));


        if(!$sender[0]['status'])
            return Redirect()->back()->with('warning',' Your account is Inactive, cant make transaction');

        $todedact = intval($request->amount) + 500;

        if(intval($sender[0]['balance']) < $todedact)
            return Redirect()->back()->with('warning',' You have no enough Balance.');

        $no= intval($request->account_no);
        $receiver = Account::where('account_no', $no)->get(['account_no']);
        // dd($receiver);
        if(!$receiver){
            return Redirect()->back()->with('warning',' Account Number does not exist.');
        }

        $receiver2 = Account::where('account_no', $no)->get();

        if(!$receiver2[0]['status']){
            return Redirect()->back()->with('warning',' Receivers Account is Inactive cant send');

        }

        $num = intval($sender[0]['account_no']);

        $withdraw = Account::where('account_no', $num);
        // dd($withdraw);
        $withdraw->decrement('balance', $todedact);
        $acc= intval($request->account_no);
        
        // dd($acc);

        $deposit = Account::where('account_no', $acc);

        // dd($depositt);
        


        $deposit->increment('balance',$request->amount);

        //bank account
        $bank = Account::where('account_no', 1);
        $bank->increment('balance', 500);


        $transaction = new Transaction;
        $transaction->sender_acc_no = intval($sender[0]['account_no']);
        $transaction->receiver_acc_no = $request->account_no;
        $transaction->receiver_acc_name = $request->account_name;
        $transaction->amount = $request->amount;
        $transaction->charge = 500;

        $transaction->save();

        return Redirect()->back()->with('success',' Money sent successfully');
    }

    public function display(){
        $data = PersonalInfo::where('user_id', Auth::user()->id)->get(['id']);
        // dd();
        if(count($data)){

            if(Auth::user()->role)
                return redirect('admin/dashboard');



            $display = Account::where('user_id', Auth::user()->id)->get();
            $acc = $display[0]['account_no'];
            $deposit = Transaction::where('receiver_acc_no', $acc)->sum('amount');
            $withdraw = Transaction::where('sender_acc_no', $acc)->sum('amount');

            $transaction = Transaction::where('sender_acc_no', $acc)->orwhere('receiver_acc_no', $acc)->get();
            // dd($display);
        
            return view('dashboard', compact('display', 'deposit', 'withdraw','transaction'));
        } else{
            return redirect('personInfo');
        }
    }

    public function print(){
        $user = Auth::user()->id;
        
        $toprint = Account::where('user_id', $user);
        $toprint->decrement('balance', 200);

        $bank = Account::where('account_no', 1);
        $bank->increment('balance', 200);


        $display = Account::where('user_id', $user)->get();
        $acc = $display[0]['account_no'];
        $transaction = Transaction::where('sender_acc_no', $acc)->orwhere('receiver_acc_no', $acc)->get();

        $pdf = Pdf::loadView('invoice', compact('transaction','display'));
        return $pdf->stream('invoice.pdf');
    }

    public function change_status($id){
        $idd = intval($id);
        // dd($idd);
        $statu = Account::where('id', $idd)->get(['status']);
        // dd($statu);
        if($statu[0]['status']){
            $status = Account::where('id', $idd)->update(['status' => 0]);
            
        } else {
            $status = Account::where('id', $idd)->update(['status' => 1]);

        }

        return Redirect()->back();

    }

    public function adminDashboard(){
        $deposits = Account::sum('balance');
        
        $deposited = intval($deposits);

        $bank = Account::where('account_no', 1)->get(['balance']);
        $bank_account = intval($bank[0]['balance']);
        
        $accounts = Account::count();
        // dd($accounts);
        $inactive = Account::where('status', 0)->count();
        // dd($inactive);
        $deleted = Account::onlyTrashed()->count();
        // dd($deleted);

        return view('admin.index', compact('deposited','accounts','inactive','deleted', 'bank_account'));
    }
}
