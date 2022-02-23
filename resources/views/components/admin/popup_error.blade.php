<div id="messages">
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">×</span></button><strong> <span
                        class="glyphicon glyphicon-ok-sign"></span> {{ $error }} </strong>
            </div>
        @endforeach

    @endif
    </div>
    <div id="messages">
        @if (\Session::has('status'))
            <div class="alert alert-{{\Session::get('alert') ?? \Session::get('status_code')}} alert-dismissible show"
                role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">×</span></button><strong>{{\Session::get('msg')}} <span
                        class="glyphicon glyphicon-ok-sign"></span></strong>
            </div>

        @endif


    </div>