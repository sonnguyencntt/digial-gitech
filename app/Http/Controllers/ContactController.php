<?php

namespace App\Http\Controllers;
use App\Http\Requests\Customer\Contact\CreateCustomerRequest;
use Illuminate\Http\Request;
use App\Repositories\Customer\CustomerRepositoryInterface;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $customerRepo;
    protected $title = "Contact";

    public function __construct(CustomerRepositoryInterface $customerRepo)
    {
        $this->customerRepo = $customerRepo;
    }
    public function index()
    {   
        $listContacts=$this->customerRepo->getAll();
        return view("pages.contact.index" , ['list' => $listContacts , 'title' => $this->title,'status'=>201]);


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
    public function store(CreateCustomerRequest $request)
    {

        try{

            $category=$this->customerRepo->create($request->all());
            
            return redirect()->back()->with(["status"=> 201 ,  "msg"=>"Thêm dữ liệu thành công"]);
         
        }

        catch(\throwable $err){
            
           
            return redirect()->back()->withErrors("Đã xãy ra lỗi, vui lòng kiểm tra lại");
         

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
