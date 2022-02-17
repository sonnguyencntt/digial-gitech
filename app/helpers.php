
<?php


function menu($current_route = "/", $guard = null, $store_code = null)
{
    $type_menu = str_replace(config('app.short_url'), "", $_SERVER['SERVER_NAME']);

    if ($type_menu == "") {
        if ($store_code == null)
            return null;
        return [
            ["name" => "Bảng điều khiển", "title" => "dashboard",  "url" => route("user.dashboard.index", ["store_code" => $store_code]), "icon" => "fa fa-dashboard", "sub_menu" => false],
            ["name" => "Hóa đơn", "title" => "order",  "url" => route("user.order.index", ["store_code" => $store_code]), "icon" => "fa fa-files-o", "sub_menu" => false],
            ["name" => "Danh mục", "title" => "category", "url" => route("user.category.index", ["store_code" => $store_code]), "icon" => "fa fa-list", "sub_menu" => false],

            ["name" => "Internet", "title" => "internet", "icon" => "fa fa-files-o", "sub_menu" => true,  "list_sub_menu" => [
                ["name" => "Danh sách", "title" => "list_internet", "url" => route("user.service_internet.index", ["store_code" => $store_code])],
                ["name" => "Thêm mới", "title" => "create_internet", "url" => route("user.service_internet.create", ["store_code" => $store_code])]
            ]],

            ["name" => "Camera", "title" => "camera", "url" => route("user.service_camera.index", ["store_code" => $store_code]), "icon" => "fa fa-files-o", "sub_menu" => false],

            ["name" => "Gói FPT Play & Camera", "title" => "fpt_play", "icon" => "fa fa-files-o", "sub_menu" => true,  "list_sub_menu" => [
                ["name" => "Danh sách", "title" => "list_fpt_play", "url" => route("user.service_play.index", ["store_code" => $store_code])],
                ["name" => "Thêm mới", "title" => "create_fpt_play", "url" => route("user.service_play.create", ["store_code" => $store_code])]
            ]],
            ["name" => "Bài viết", "title" => "posts", "icon" => "fa fa-files-o", "sub_menu" => true,  "list_sub_menu" => [
                ["name" => "Danh sách", "title" => "list_posts", "url" => route("user.posts.index", ["store_code" => $store_code])],
                ["name" => "Thêm mới", "title" => "create_posts", "url" => route("user.posts.create", ["store_code" => $store_code])]
            ]],
            ["name" => "Banners", "title" => "banner", "icon" => "fa fa-list", "sub_menu" => true,  "list_sub_menu" => [
                ["name" => "Danh sách", "title" => "list_banner", "url" => route("user.banner.index", ["store_code" => $store_code])],
                ["name" => "Thêm mới", "title" => "create_banner", "url" => route("user.banner.create", ["store_code" => $store_code])]
            ]],

            ["name" => "KH Liên hệ", "title" => "customer", "url" => route("user.customer.index", ["store_code" => $store_code]), "icon" => "fa fa-users", "sub_menu" => false],

            ["name" => "Cài đặt giao diện", "title" => "theme", "url" => route("user.theme.index", ["store_code" => $store_code]), "icon" => "fa fa-cogs", "sub_menu" => false],



        ];
    } else if ($type_menu == "admin.") {
        return
            [
                ["name" => "Bảng điều khiển", "title" => "dashboard", "url" => route("admin.dashboard.index"), "icon" => "fa fa-dashboard", "sub_menu" => false],
                ["name" => "Danh mục", "title" => "category", "icon" => "fa fa-files-o", "sub_menu" => true,  "list_sub_menu" => [
                    ["name" => "Danh sách", "title" => "category", "url" => route("admin.category.index")],
                    ["name" => "Thêm mới", "title" => "category", "url" => route("admin.category.create")]
                ]],
                ["name" => "Người dùng", "title" => "user", "url" => route("admin.user.index"), "icon" => "fa fa-users", "sub_menu" => false],
                ["name" => "Cấu hình", "title" => "config", "url" => route("admin.config.index"), "icon" => "fa fa-cogs", "sub_menu" => false],

                ["name" => "Cửa hàng", "title" => "store", "url" => route("admin.store.index"), "icon" => "fa fa-list", "sub_menu" => false],
                ["name" => "Giá dịch vụ", "title" => "rent_shop", "url" => route("admin.rent_shop.index"), "icon" => "fa fa-money", "sub_menu" => false],
                ["name" => "Thanh toán dịch vụ", "title" => "asda",  "url" => route("admin.store.index"), "icon" => "fa fa-money", "sub_menu" => false],


                ["name" => "Tài khoản", "title" => "profile", "url" => route("admin.profile.index"), "icon" => "fa fa-user", "sub_menu" => false],



            ];
    } else {
    }
}

function getNameSubdomain()
{
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
function getStoreCode()
{
    $domain = request()->getHost();
    return str_replace(".".config('app.short_url'), "", $domain);

}


?>