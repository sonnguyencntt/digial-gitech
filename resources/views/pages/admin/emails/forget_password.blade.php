<div style="width:680px ; margin:0 auto">
    <div style="text-align: center">
        <h2>Xin chào {{$user->name}}</h2>
        <p>Bạn đã đăng ký tài khoản tại hệ thống của chúng tôi</p>
        <p>Vui lòng nhấp vào nút bên dưới để khôi phục tài khoản</p>
        <p>
            <a 
            style="display: inline-block; background: green; color:#fff ; padding : 7px 25px"
             href="{{route('manage.reset_password.index' , ['user'=>$user->id , 'token'=>$user->token])}}">Kích hoạt tài khoản</a>
        </p>
    </div>
</div>