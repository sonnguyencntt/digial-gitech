
<?php


function menu($current_route = "/")
{
    return [
        ["name" => "Bảng điều khiển", "url" => route("manage.dashboard.index"), "icon" => "fa fa-dashboard", "sub_menu" => false],
        ["name" => "Hóa đơn", "url" => route("manage.order.index"), "icon" => "fa fa-files-o", "sub_menu" => false],

        ["name" => "Bài viết", "icon" => "fa fa-files-o", "sub_menu" => true,  "list_sub_menu" => [
            ["name" => "Danh sách", "url" => route("manage.posts.index")],
            ["name" => "Thêm mới", "url" => route("manage.posts.create")]
        ]],
             ["name" => "Banners", "icon" => "fa fa-list", "sub_menu" => true,  "list_sub_menu" => [
            ["name" => "Danh sách", "url" => route("manage.banner.index")],
            ["name" => "Thêm mới", "url" => route("manage.banner.create")]
        ]],
   
        ["name" => "KH Liên hệ", "url" => route("manage.contact.index"), "icon" => "fa fa-users", "sub_menu" => false],

        ["name" => "Cài đặt", "url" => route("manage.dashboard.index"), "icon" => "fa fa-cogs", "sub_menu" => false],

        ["name" => "Thông tin", "url" => route("manage.profile.index"), "icon" => "fa fa-user", "sub_menu" => false],


    ];
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