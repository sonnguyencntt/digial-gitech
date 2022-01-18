<?php

namespace App\Http\Controllers\Manage;

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
    public function index()
    {
        $listPosts = $this->postsRepo->getAll();
        $theme = $this->themeRepo->first();
        return \auto_redirect(\view("pages.admin.theme.index", ['theme' => $theme, 'listPosts' => $listPosts,  'title' => $this->title]),  $theme);
    }

    public function update(UpdateThemeRequest $request, $id)
    {

        $fileName = null;
        try {
            if ($request->has('logo')) {
                $file = $request->logo;
                $etx = $request->logo->extension();
                $fileName = time() . '-' . 'theme.' . $etx;
                $file->move(public_path($this->linkFolder), $fileName);
            }

            if ($fileName == null) {
                $this->themeRepo->updateById($id, $request->except(["image_url_string", "logo"]));
                try {
                } catch (\Throwable $th) {
                    return redirect("/posts")->with(["status" => 400, "alert" => "danger",  "msg" => "Cập dữ không liệu thành công"]);
                }
            } else {
                try {
                    $this->themeRepo->updateById($id, array_merge($request->except(["image_url_string"]), ['logo' => $fileName]));

                    $file_path = public_path($request->image_url_string);
                    if (File::exists($file_path))
                        File::delete($file_path);
                } catch (\Throwable $th) {
                    //throw $th;
                }
            }


            return redirect("/theme")->with(["status" => 204, "alert" => "success",  "msg" => "Cập nhật dữ liệu thành công"]);
        } catch (\throwable $err) {
            \dd($err);
            return redirect()->back()->withErrors("Đã xãy ra lỗi, vui lòng kiểm tra lại");
        }
    }
}
