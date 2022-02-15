<?php

namespace App\Http\Controllers;
use App\Http\Requests\Customer\Contact\CreateCustomerRequest;
use Illuminate\Http\Request;
use App\Repositories\Customer\CustomerRepositoryInterface;
use App\Repositories\Theme\ThemeRepositoryInterface;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $customerRepo;
    protected $title = "Contact";

    public function __construct(CustomerRepositoryInterface $customerRepo,ThemeRepositoryInterface $themeRepo)
    {
        $this->customerRepo = $customerRepo;
        $this->themeRepo = $themeRepo;
    }
    public function index($store_code)
    {   
        
    
        return view("pages.contact.index" , ['title' => $this->title,'status'=>201]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        \dd("sad");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCustomerRequest $request,$store_code)
    {
        try{

            $category=$this->customerRepo->create(array_merge($request->all(), ['store_code' => $store_code]));
            
            return redirect()->back()->with(["status"=> 201 ,  "msg"=>"Gửi thông tin thành công" , "alert" => "success"]);
         
        }

        catch(\throwable $err){
            
            return redirect()->back()->with(["status"=> 403 ,  "msg"=>"Đã xãy ra lỗi, vui lòng kiểm tra lại" , "alert" => "danger"]);

         

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{

            $category=$this->customerRepo->findById($id);
            
            return $category;
         
        }

        catch(\throwable $err){
            
           
            return redirect()->back()->withErrors("Đã xãy ra lỗi, vui lòng kiểm tra lại");
         

        }
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
    public function update(Request $request, $id)
    {
        //
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
