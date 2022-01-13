
<?php


function menu($current_route = "/", $guard = null)
{
    $type_menu = str_replace(config('app.short_url') , "" , $_SERVER['SERVER_NAME']);

    if ($type_menu == "administrator.") {
        return [
            ["name" => "Bảng điều khiển", "url" => route("manage.dashboard.index"), "icon" => "fa fa-dashboard", "sub_menu" => false],
            ["name" => "Hóa đơn", "url" => route("manage.order.index"), "icon" => "fa fa-files-o", "sub_menu" => false],
            ["name" => "Internet", "icon" => "fa fa-files-o", "sub_menu" => true,  "list_sub_menu" => [
                ["name" => "Danh sách", "url" => route("manage.service_internet.index")],
                ["name" => "Thêm mới", "url" => route("manage.service_internet.create")]
            ]],

            ["name" => "Camera", "url" => route("manage.service_camera.index"), "icon" => "fa fa-files-o", "sub_menu" => false],

            ["name" => "FPT Play", "icon" => "fa fa-files-o", "sub_menu" => true,  "list_sub_menu" => [
                ["name" => "Danh sách", "url" => route("manage.service_play.index")],
                ["name" => "Thêm mới", "url" => route("manage.posts.create")]
            ]],
            ["name" => "Bài viết", "icon" => "fa fa-files-o", "sub_menu" => true,  "list_sub_menu" => [
                ["name" => "Danh sách", "url" => route("manage.posts.index")],
                ["name" => "Thêm mới", "url" => route("manage.posts.create")]
            ]],
            ["name" => "Banners", "icon" => "fa fa-list", "sub_menu" => true,  "list_sub_menu" => [
                ["name" => "Danh sách", "url" => route("manage.banner.index")],
                ["name" => "Thêm mới", "url" => route("manage.banner.create")]
            ]],

            ["name" => "KH Liên hệ", "url" => route("manage.customer.index"), "icon" => "fa fa-users", "sub_menu" => false],

            ["name" => "Cài đặt giao diện", "icon" => "fa fa-files-o", "sub_menu" => true,  "list_sub_menu" => [
                ["name" => "Giao diện Internet", "url" => route("manage.posts.index")],
                ["name" => "Giao diện Camera", "url" => route("manage.posts.create")],
                ["name" => "Giao diện FPT Play", "url" => route("manage.posts.create")]

            ]],
            ["name" => "Thông tin", "url" => route("manage.profile.index"), "icon" => "fa fa-user", "sub_menu" => false],


        ];
    }
    else if($type_menu == "super.")
    {
        return
        [
            ["name" => "Bảng điều khiển", "url" => route("super.dashboard.index"), "icon" => "fa fa-dashboard", "sub_menu" => false],
            // ["name" => "Hóa đơn", "url" => route("super.order.index"), "icon" => "fa fa-files-o", "sub_menu" => false],
            ["name" => "Danh mục", "icon" => "fa fa-files-o", "sub_menu" => true,  "list_sub_menu" => [
                ["name" => "Danh sách", "url" => route("super.category.index")],
                ["name" => "Thêm mới", "url" => route("super.category.create")]
            ]],
        ];
    }
    else
    {

    }
}

function auto_redirect($fe, $be)
{

    if (request()->wantsJson()) {
        return $be;
    } else {
        return $fe;
    }
}


?>