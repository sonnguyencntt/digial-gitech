<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Repositories\Theme\ThemeRepositoryInterface;
use App\Repositories\Posts\PostsRepositoryInterface;

use App\Http\Requests\Theme\UpdateThemeRequest;

use App\Http\Controllers\Controller;
use File;

class ThemeController extends Controller
{
    protected $themeRepo;
    protected $postsRepo;
    protected $linkFolder = "/images/theme";

    protected $title = "Chỉnh sửa giao diện";

    public function __construct(ThemeRepositoryInterface $themeRepo, PostsRepositoryInterface $postsRepo)
    {
        $this->themeRepo = $themeRepo;
        $this->postsRepo = $postsRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($store_code)
    {
        $listPosts = $this->postsRepo->getAll($store_code);
        $theme = $this->themeRepo->firstByStore($store_code);
        return \auto_redirect(\view("pages.user.theme.index", [ 'theme' => $theme, 'listPosts' => $listPosts,  'title' => $this->title]),  $theme);
    }

    public function store(Request $request , $store_code)
    {
        try{
            $this->themeRepo->create([
                "store_code" => $store_code,
            ]);
            return redirect()->back()->with(["status"=> 201 , "status_code" => "success",  "msg"=>"Generate Theme thành công"]);
        }
        catch(\throwable $err){
            \dd($err);
            return redirect()->back()->withErrors("Đã xãy ra lỗi, vui lòng kiểm tra lại");
        }
    }

    public function update(UpdateThemeRequest $request,$store_code, $id)
    {
        $fileName = null;
        // $request->show_icon_zalo = $request->show_icon_zalo ? 1 :0;
        // $request->show_icon_facebook = $request->show_icon_facebook ? 1 :0;
        // $request->show_icon_youtube = $request->show_icon_youtube ? 1 :0;

        // \dd($request->all());
        try {
            if ($request->has('logo')) {
                $file = $request->logo;
                $etx = $request->logo->extension();
                $fileName = time() . '-' . 'theme.' . $etx;
                $file->move(public_path($this->linkFolder), $fileName);
            }

            if ($fileName == null) {
                $this->themeRepo->updateByStore($id, $store_code ,$request->except(["image_url_string", "logo"]));
                try {
                } catch (\Throwable $th) {
                    return redirect()->back()->with(["status" => 400, "alert" => "danger",  "msg" => "Cập dữ không liệu thành công"]);
                }
            } else {
                try {
                    $this->themeRepo->updateByStore($id, $store_code, array_merge($request->except(["image_url_string"]), ['logo' => $fileName]));

                    $file_path = public_path($request->image_url_string);
                    if (File::exists($file_path))
                        File::delete($file_path);
                } catch (\Throwable $th) {
                    //throw $th;
                }
            }


            return redirect()->back()->with(["status" => 204, "alert" => "success",  "msg" => "Cập nhật dữ liệu thành công"]);
        } catch (\throwable $err) {
            \dd($err);
            return redirect()->back()->withErrors("Đã xãy ra lỗi, vui lòng kiểm tra lại");
        }
    }
}
