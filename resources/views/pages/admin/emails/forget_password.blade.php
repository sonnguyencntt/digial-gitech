<div style="width:680px ; margin:0 auto">
    <div style="text-align: center">
        <h2>Xin chào Admin {{$admin->name}}</h2>
        <p>Vui lòng nhấp vào nút bên dưới để khôi phục tài khoản</p>
        <p>
            <a 
            style="display: inline-block; background: green; color:#fff ; padding : 7px 25px"
             href="{{route('admin.reset_password.index' , ['admin'=>$admin->id , 'token'=>$admin->token])}}">Kích hoạt tài khoản</a>
        </p>
    </div>
</div>