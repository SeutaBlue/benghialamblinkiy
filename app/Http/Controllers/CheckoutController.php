<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\CustomerRequest;
use App\Http\Requests\ChangepassRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

session_start();

class CheckoutController extends Controller
{

    // public function AuthLogin()
    // {
    //     if (Session::has("customer_id")) {
    //         return true; // Đã đăng nhập
    //     } else {
    //         return false; // Chưa đăng nhập
    //     }
    // }
    public function login()
    {
        return view('pages.khachhang.pages_child.checkout.login');
    }

    public function login_customer(Request $request)
    {
        $email = $request->email_account;
        $password = $request->password_account;

        $customer = DB::table('tbl_customers')->where('customer_email', $email)->first();
        if ($customer && Hash::check($password, $customer->customer_password)) {
            Session::put('customer_id', $customer->customer_id);
            return Redirect::to('/ho-so');
        } else {
            Session::put('message', 'Mật khẩu hoặc tài khoản không đúng. Làm ơn nhập lại!');
            return Redirect::to('/login');
        }
    }



    public function register()
    {
        return view('pages.khachhang.pages_child.checkout.register');
    }

    public function add_customer(CustomerRequest $request)
    {


        // Xác thực dữ liệu
        $data = $request->validated();

        $data = array();
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = bcrypt($request->customer_pass);
        $data['customer_name'] = $request->customer_name;
        $data['customer_phone'] = $request->customer_phone;
        // Tạo token ngẫu nhiên từ 0000 đến 9999
        // $token = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
        // $data['token'] = $token; // Gán token vào dữ liệu khách hàng
        // $data['date_created'] = Carbon::now('Asia/Ho_Chi_Minh');
        $customer_id = DB::table('tbl_customers')->insertGetId($data);
        // Gửi email thông báo đăng ký thành công
        $customer = DB::table('tbl_customers')->where('customer_id', $customer_id)->first();
        $to_email = $customer->customer_email;
        $to_name = $customer->customer_name;
        Mail::send('emails.registration_confirmation', ['customer' => $customer], function ($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                ->subject('Thông tin đăng ký tài khoản tại Blinkiy');
        });
        Session::put('customer_id', $customer_id);
        Session::put('customer_name', $request->customer_name);
        Session::flash('register success', 'Đăng ký tài khoản thành công');
        return Redirect::to('/ho-so');
    }
    // Hiện tại hàm này chưa sài. Lúc tạo là vì tưởng đăng nhập mới cho checkout
    // public function checkout()
    // {
    //     // Lấy ID khách hàng từ Session
    //     $customer_id = Session::get('customer_id');

    //     // Truy vấn thông tin khách hàng từ cơ sở dữ liệu
    //     $customer = DB::table('tbl_customers')->where('customer_id', $customer_id)->first();

    //     // Trả về view với dữ liệu của khách hàng
    //     return view('pages.personal_infor', ['customer' => $customer]);
    // }

    public function personal_infor()
    {
        // Lấy ID khách hàng từ Session
        $customer_id = Session::get('customer_id');
        // Truy vấn thông tin khách hàng từ cơ sở dữ liệu
        $customer = DB::table('tbl_customers')->where('customer_id', $customer_id)->first();

        // Trả về view với dữ liệu của khách hàng
        return view('pages.khachhang.pages_child.personal_infor', ['customer' => $customer]);
    }

    public function Order_management()
    {
        $customer_id = Session::get('customer_id');

        // Truy vấn thông tin khách hàng từ cơ sở dữ liệu
        $customer = DB::table('tbl_customers')->where('customer_id', $customer_id)->first();

        // Trả về view 'pages.changepass' với cả thông tin khách hàng
        return view('pages.khachhang.pages_child.order_management', ['customer' => $customer]);
    }


    public function update_customer(Request $request, $customer_id)
    {
        $data = array();
        $data['customer_email'] = $request->user_email;
        $data['customer_name'] = $request->user_name;
        $data['customer_phone'] = $request->user_tel;
        $data['customer_date'] = $request->user_date;
        $data['customer_city'] = $request->user_city;
        $data['customer_district'] = $request->user_district;
        DB::table('tbl_customers')->where('customer_id', $customer_id)->update($data);
        Session::flash('success-update', 'Cập nhật thông tin thành công');
        return Redirect::to('/ho-so');
    }

    // Hàm để đăng xuất người dùng bằng cách xóa Session bằng flush
    public function logout()
    {
        Session::flush();
        return Redirect::to('/login');
    }
    public function forgot_password()
    {
        return view('pages.checkout.forgot_password');
    }
    public function check_forgot_password(Request $request)
    {
        $request->validate([
            'recover_email' => 'required|exists:tbl_customers,customer_email',
        ]);

        $customer = DB::table('tbl_customers')->where('customer_email', $request->recover_email)->first();
        dd($customer);
    }

    public function Change_pass()
    {
        // Lấy ID khách hàng từ Session
        $customer_id = Session::get('customer_id');
        // dd($customer_id);

        // Truy vấn thông tin khách hàng từ cơ sở dữ liệu
        $customer = DB::table('tbl_customers')->where('customer_id', $customer_id)->first();
        // dd($customer);
        // Trả về view 'pages.changepass' với cả thông tin khách hàng
        return view('pages.khachhang.pages_child.changepass', ['customer' => $customer]);
    }
    public function check_change_pass(ChangepassRequest $request)
    {
        $customer_id = Session::get('customer_id');
        // $customer = DB::table('tbl_customers')->where('customer_id', $customer_id)->first();

        // if (!$customer) {
        //     return Redirect::back()->with('error', 'Không tìm thấy thông tin khách hàng');
        // }

        // $request->validate([
        //     'OldPass' => ['required', function ($attribute, $value, $fail) use ($customer) {
        //         if (!Hash::check($value, $customer->customer_password)) {
        //             $fail('Mật khẩu của bạn không đúng');
        //         }
        //     }],
        //     'NewPass' => 'required|string|min:6',
        //     'ConfirmPass' => 'required|same:NewPass',
        // ]);


        DB::table('tbl_customers')
            ->where('customer_id', $customer_id)
            ->update(['customer_password' => bcrypt($request->NewPass)]);

        return redirect('/login')->with('success', 'Mật khẩu đã được cập nhật thành công');
    }

    public function reset_password()
    {
    }
    public function check_reset_password()
    {
    }

    public function send_mail()
    {
        // Mail::to()->send(new)
    }

}