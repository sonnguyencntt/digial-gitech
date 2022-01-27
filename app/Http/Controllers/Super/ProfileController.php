<?php

namespace App\Http\Controllers\Super;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\AdminRepositoryInterface;
use App\Http\Requests\Profile\UpdateProfileRequest;
use Hash;
use Auth;

class ProfileController extends Controller
{

    protected $adminRepo;
    protected $title = "Thông tin cá nhân";

    public function __construct(AdminRepositoryInterface $adminRepo)
    {
        $this->adminRepo = $adminRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $admin = $this->adminRepo->findById($id);
        return \auto_redirect(\view("pages.super.profile.index", ['admin' => $admin, 'title' => $this->title]),  $admin);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfileRequest $request, $id)
    {
        try {
            if($request->password == null)
            {
                $this->adminRepo->updateById($id, [
                    'name' => $request->name,
                    'phone_number' => $request->phone_number,
                    'address' => $request->address,
                ]);
            }
            else
            {
                $this->adminRepo->updateById($id, [
                    'name' => $request->name,
                    'phone_number' => $request->phone_number,
                    'address' => $request->address,
                    'password' => Hash::make($request->password),
                ]);
            }
      
            return redirect()->back()->with(["status" => 204, "alert" => "success",  "msg" => "Cập nhật dữ liệu thành công"]);
        } catch (\throwable $err) {
            return redirect()->back()->withErrors("Đã xãy ra lỗi, vui lòng kiểm tra lại");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
