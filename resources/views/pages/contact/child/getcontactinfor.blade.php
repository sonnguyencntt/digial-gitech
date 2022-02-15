<div id="col-513256020" class="col medium-6 small-12 large-6">
    <div class="col-inner">


        <p>Nếu bạn có yêu cầu  hoặc thắc mắc, xin vui lòng điền vào mẫu dưới đây và chúng tôi sẽ hỗ trợ bạn trong thời
            gian sớm nhất.</p>
        <div role="form" class="wpcf7" id="wpcf7-f5-p69-o2" lang="vi" dir="ltr">
            <div class="screen-reader-response">
                <p role="status" aria-live="polite" aria-atomic="true"></p>
                <ul></ul>
            </div>
            <form action="{{route('contact.store', $badges->store_code)}}" method="post" >
          @csrf
                <p><span class="wpcf7-form-control-wrap text-765"><input type="text" name="full_name"
                            value="{{ old('full_name') }}" size="40" class="wpcf7-form-control wpcf7-text"
                            aria-invalid="false" placeholder="Họ và tên*" /></span><br />
                    <span class="wpcf7-form-control-wrap email-410"><input type="email" name="email"
                            value="{{ old('email') }}" size="40"
                            class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-email"
                            aria-invalid="false" placeholder="Email (Nếu có)" /></span><br />
                    <span class="wpcf7-form-control-wrap tel-978"><input type="tel" name="phone_number"
                            value="{{ old('phone_number') }}" size="40"
                            class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel"
                            aria-required="true" aria-invalid="false" placeholder="Số điện thoại*" /></span><br />
                    <span class="wpcf7-form-control-wrap text-766"><input type="text" name="address"
                            value="{{ old('address') }}" size="40" class="wpcf7-form-control wpcf7-text"
                            aria-invalid="false" placeholder="Địa chỉ" /></span><br />
                    <span class="wpcf7-form-control-wrap textarea-215"><textarea name="note" cols="40" rows="10"
                            class="wpcf7-form-control wpcf7-textarea" aria-invalid="false"
                            placeholder="Ghi chú (nếu có)">{{ old('note') }}</textarea></span><br />
                    <input type="submit" value="GỬI"  />
                </p>
               
                @if (\Session::has('msg'))
           
                <div  class="wpcf7-output msg-{{\Session::get('alert')}}" aria-hidden="true">{{\Session::get('msg')}}</div>        

    
            @endif
            @if ($errors->any())
            @foreach ($errors->all() as $error)
            
                <div  class="wpcf7-output msg-danger" aria-hidden="true">{{ $error }}</div>        

            @endforeach
    
        @endif
                
                </form>
        </div>
    </div>
</div>
