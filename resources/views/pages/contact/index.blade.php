@extends('layouts.app')
@section('content')

<main id="main" class="">


    <div id="content" role="main" class="content-area">
    
            
                <div class="row row-full-width bando-lienhepage"  id="row-2035417477">
    
        <div id="col-565922035" class="col small-12 large-12"  >
            <div class="col-inner"  >
                
                
    <p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.5214280922282!2d106.68599901526036!3d10.771318262232242!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f3cd2e8d6a9%3A0x41b13af62e34e6e4!2zMTI0IMSQxrDhu51uZyBTxrDGoW5nIE5ndXnhu4d0IEFuaCwgUGjGsOG7nW5nIFBo4bqhbSBOZ8WpIEzDo28sIFF14bqtbiAxLCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmgsIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1623924550065!5m2!1sen!2s" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe></p>
            </div>
                </div>
    
        
    </div>
    <div class="row"  id="row-252565475">
    
        <div id="col-1290001289" class="col medium-6 small-12 large-6"  >
            <div class="col-inner"  >
                
                
    <div class="container section-title-container" ><h2 class="section-title section-title-normal"><b></b><span class="section-title-main" >Thông tin liên hệ</span><b></b></h2></div>
    {{-- hiển thị thông tin contact --}}
    @foreach($listContacts as $contact)
        <p> <strong><span class="text-f37021">Địa chỉ:</span></strong> <a href="https://www.google.com/maps/place/FPT+Telecom/@10.7602159,106.7379094,16z/data=!4m8!1m2!2m1!1zTMO0IDM3LTM5QSwgxJHGsOG7nW5nIDE5LCBLQ1ggVMOibiBUaHXhuq1uLCBQaMaw4budbmcgVMOibiBUaHXhuq1uIMSQw7RuZywgUXXhuq1uIDc!3m4!1s0x317525ea5fc1b879:0x2f8d8851ef4a585a!8m2!3d10.766092!4d106.743751" target="_blank" rel="noreferrer noopener">{{$contact->address}}</a><br />
            <strong>Hotline:</strong> <strong><a href={{$contact->phone_number}}>{{$contact->phone_number}}</a></strong></p>
        <p><strong>Email:</strong> <a href={{$contact->email}}>{{$contact->email}}</a></p>
    @endforeach

    </div>
    </div>
    
        
    
        <div id="col-513256020" class="col medium-6 small-12 large-6"  >
            <div class="col-inner"  >
                
                
    <p>Nếu bạn có yêu cầu  hoặc thắc mắc, xin vui lòng điền vào mẫu dưới đây và chúng tôi sẽ hỗ trợ bạn trong thời gian sớm nhất.</p>
    <div role="form" class="wpcf7" id="wpcf7-f5-p69-o2" lang="vi" dir="ltr">
    <div class="screen-reader-response"><p role="status" aria-live="polite" aria-atomic="true"></p> <ul></ul></div>
    <form action="https://fptvienthong.net/lien-he/#wpcf7-f5-p69-o2" method="post" class="wpcf7-form init" novalidate="novalidate" data-status="init">
    <div style="display: none;">
    <input type="hidden" name="_wpcf7" value="5" />
    <input type="hidden" name="_wpcf7_version" value="5.5.2" />
    <input type="hidden" name="_wpcf7_locale" value="vi" />
    <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f5-p69-o2" />
    <input type="hidden" name="_wpcf7_container_post" value="69" />
    <input type="hidden" name="_wpcf7_posted_data_hash" value="" />
    </div>
    <p><span class="wpcf7-form-control-wrap text-765"><input type="text" name="text-765" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Họ và tên*" /></span><br />
    <span class="wpcf7-form-control-wrap email-410"><input type="email" name="email-410" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-email" aria-invalid="false" placeholder="Email (Nếu có)" /></span><br />
    <span class="wpcf7-form-control-wrap tel-978"><input type="tel" name="tel-978" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel" aria-required="true" aria-invalid="false" placeholder="Số điện thoại*" /></span><br />
    <span class="wpcf7-form-control-wrap text-766"><input type="text" name="text-766" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Địa chỉ" /></span><br />
    <span class="wpcf7-form-control-wrap textarea-215"><textarea name="textarea-215" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false" placeholder="Ghi chú (nếu có)"></textarea></span><br />
    <input type="submit" value="GỬI" class="wpcf7-form-control has-spinner wpcf7-submit" /></p>
    <p style="display: none !important;"><label>&#916;<textarea name="_wpcf7_ak_hp_textarea" cols="45" rows="8" maxlength="100"></textarea></label><input type="hidden" id="ak_js" name="_wpcf7_ak_js" value="203"/><script>document.getElementById( "ak_js" ).setAttribute( "value", ( new Date() ).getTime() );</script></p><input type='hidden' class='wpcf7-pum' value='{"closepopup":false,"closedelay":0,"openpopup":false,"openpopup_id":0}' /><div class="wpcf7-response-output" aria-hidden="true"></div></form></div>
            </div>
                </div>
    
        
    </div>
            
                    
    </div>
    
    
    
    </main>
    @stop