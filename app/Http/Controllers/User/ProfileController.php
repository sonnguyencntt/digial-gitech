<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepositoryInterface;
use App\Http\Requests\Profile\UpdateProfileRequest;
use Hash;
use Auth;

class ProfileController extends Controller
{

    protected $userRepo;
    protected $title = "Thông tin cá nhân";

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $user = $this->userRepo->findById($id);
        return \view("pages.user.profile.index", ['user' => $user, 'title' => $this->title]);
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
                $this->userRepo->updateById($id, [
                    'name' => $request->name,
                    'phone_number' => $request->phone_number,
                    'address' => $request->address,
                ]);
            }
            else
            {
                $this->userRepo->updateById($id, [
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
