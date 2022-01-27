
<?php


function menu($current_route = "/", $guard = null, $store_code = null)
{
    $type_menu = str_replace(config('app.short_url'), "", $_SERVER['SERVER_NAME']);
  
    if ($type_menu == "") {
        if ($store_code == null)
        return null;
        return [
            ["name" => "Bảng điều khiển", "url" => route("user.dashboard.index", ["store_code" => $store_code]), "icon" => "fa fa-dashboard", "sub_menu" => false],
            ["name" => "Hóa đơn", "url" => route("user.order.index", ["store_code" => $store_code]), "icon" => "fa fa-files-o", "sub_menu" => false],
            ["name" => "Danh mục", "url" => route("user.category.index", ["store_code" => $store_code]), "icon" => "fa fa-list", "sub_menu" => false],

            ["name" => "Internet", "icon" => "fa fa-files-o", "sub_menu" => true,  "list_sub_menu" => [
                ["name" => "Danh sách", "url" => route("user.service_internet.index", ["store_code" => $store_code])],
                ["name" => "Thêm mới", "url" => route("user.service_internet.create", ["store_code" => $store_code])]
            ]],

            ["name" => "Camera", "url" => route("user.service_camera.index", ["store_code" => $store_code]), "icon" => "fa fa-files-o", "sub_menu" => false],

            ["name" => "FPT Play", "icon" => "fa fa-files-o", "sub_menu" => true,  "list_sub_menu" => [
                ["name" => "Danh sách", "url" => route("user.service_play.index", ["store_code" => $store_code])],
                ["name" => "Thêm mới", "url" => route("user.posts.create", ["store_code" => $store_code])]
            ]],
            ["name" => "Bài viết", "icon" => "fa fa-files-o", "sub_menu" => true,  "list_sub_menu" => [
                ["name" => "Danh sách", "url" => route("user.posts.index", ["store_code" => $store_code])],
                ["name" => "Thêm mới", "url" => route("user.posts.create", ["store_code" => $store_code])]
            ]],
            ["name" => "Banners", "icon" => "fa fa-list", "sub_menu" => true,  "list_sub_menu" => [
                ["name" => "Danh sách", "url" => route("user.banner.index", ["store_code" => $store_code])],
                ["name" => "Thêm mới", "url" => route("user.banner.create", ["store_code" => $store_code])]
            ]],

            ["name" => "KH Liên hệ", "url" => route("user.customer.index", ["store_code" => $store_code]), "icon" => "fa fa-users", "sub_menu" => false],

            ["name" => "Cài đặt giao diện", "url" => route("user.theme.index", ["store_code" => $store_code]), "icon" => "fa fa-cogs", "sub_menu" => false],

           

        ];
    } else if ($type_menu == "admin.") {
        return
            [
                ["name" => "Bảng điều khiển", "url" => route("super.dashboard.index"), "icon" => "fa fa-dashboard", "sub_menu" => false],
                ["name" => "Danh mục", "icon" => "fa fa-files-o", "sub_menu" => true,  "list_sub_menu" => [
                    ["name" => "Danh sách", "url" => route("super.category.index")],
                    ["name" => "Thêm mới", "url" => route("super.category.create")]
                ]],
                ["name" => "Người dùng", "url" => route("super.user.index"), "icon" => "fa fa-users", "sub_menu" => false],
                ["name" => "Cửa hàng", "url" => route("super.store.index"), "icon" => "fa fa-list", "sub_menu" => false],
                ["name" => "Tài khoản", "url" => route("super.profile.index"), "icon" => "fa fa-user", "sub_menu" => false],



            ];
    } else {
    }
}

function getNameSubdomain(){
    return str_replace(config('app.short_url'), "", $_SERVER['SERVER_NAME']);
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