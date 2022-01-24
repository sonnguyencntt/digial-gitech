
<?php


function menu($current_route = "/", $guard = null, $store_code = null)
{
    $type_menu = str_replace(config('app.short_url'), "", $_SERVER['SERVER_NAME']);
    if ($store_code == null)
        return null;
    if ($type_menu == "") {
        return [
            ["name" => "Bảng điều khiển", "url" => route("manage.dashboard.index", ["store_code" => $store_code]), "icon" => "fa fa-dashboard", "sub_menu" => false],
            ["name" => "Hóa đơn", "url" => route("manage.order.index", ["store_code" => $store_code]), "icon" => "fa fa-files-o", "sub_menu" => false],
            ["name" => "Danh mục", "url" => route("manage.category.index", ["store_code" => $store_code]), "icon" => "fa fa-list", "sub_menu" => false],

            ["name" => "Internet", "icon" => "fa fa-files-o", "sub_menu" => true,  "list_sub_menu" => [
                ["name" => "Danh sách", "url" => route("manage.service_internet.index", ["store_code" => $store_code])],
                ["name" => "Thêm mới", "url" => route("manage.service_internet.create", ["store_code" => $store_code])]
            ]],

            ["name" => "Camera", "url" => route("manage.service_camera.index", ["store_code" => $store_code]), "icon" => "fa fa-files-o", "sub_menu" => false],

            ["name" => "FPT Play", "icon" => "fa fa-files-o", "sub_menu" => true,  "list_sub_menu" => [
                ["name" => "Danh sách", "url" => route("manage.service_play.index", ["store_code" => $store_code])],
                ["name" => "Thêm mới", "url" => route("manage.posts.create", ["store_code" => $store_code])]
            ]],
            ["name" => "Bài viết", "icon" => "fa fa-files-o", "sub_menu" => true,  "list_sub_menu" => [
                ["name" => "Danh sách", "url" => route("manage.posts.index", ["store_code" => $store_code])],
                ["name" => "Thêm mới", "url" => route("manage.posts.create", ["store_code" => $store_code])]
            ]],
            ["name" => "Banners", "icon" => "fa fa-list", "sub_menu" => true,  "list_sub_menu" => [
                ["name" => "Danh sách", "url" => route("manage.banner.index", ["store_code" => $store_code])],
                ["name" => "Thêm mới", "url" => route("manage.banner.create", ["store_code" => $store_code])]
            ]],

            ["name" => "KH Liên hệ", "url" => route("manage.customer.index", ["store_code" => $store_code]), "icon" => "fa fa-users", "sub_menu" => false],

            ["name" => "Cài đặt giao diện", "url" => route("manage.theme.index", ["store_code" => $store_code]), "icon" => "fa fa-cogs", "sub_menu" => false],

           

        ];
    } else if ($type_menu == "super.") {
        return
            [
                ["name" => "Bảng điều khiển", "url" => route("super.dashboard.index"), "icon" => "fa fa-dashboard", "sub_menu" => false],
                // ["name" => "Hóa đơn", "url" => route("super.order.index"), "icon" => "fa fa-files-o", "sub_menu" => false],
                ["name" => "Danh mục", "icon" => "fa fa-files-o", "sub_menu" => true,  "list_sub_menu" => [
                    ["name" => "Danh sách", "url" => route("super.category.index")],
                    ["name" => "Thêm mới", "url" => route("super.category.create")]
                ]],
                ["name" => "Người dùng", "url" => route("super.user.index"), "icon" => "fa fa-users", "sub_menu" => false],

            ];
    } else {
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