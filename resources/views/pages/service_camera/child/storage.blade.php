<div class="row row-full-width uudiencamera-page"  id="row-1122803881">
    
    <div id="col-716478819" class="col small-12 large-12"  >
        <div class="col-inner"  >
            
            
    <div id="gap-1014587657" class="gap-element clearfix" style="display:block; height:auto;">
        
<style>
#gap-1014587657 {
  padding-top: 30px;
}
</style>
    </div>
    
    <div id="text-1301830475" class="text">
        
<h2>GÓI LƯU TRỮ</h2>
        
<style>
#text-1301830475 {
  text-align: center;
}
</style>
    </div>
    
    <div id="gap-1343656366" class="gap-element clearfix" style="display:block; height:auto;">
        
<style>
#gap-1343656366 {
  padding-top: 30px;
}
</style>
    </div>
    
<div class="row"  id="row-173350997">
@foreach ($storage as $storage)
    

    <div id="col-8861296" class="col medium-4 small-12 large-4"  >
        <div class="col-inner"  >
            
            
    <div id="text-4082509737" class="text goicamera">
        
{{-- <h3>{{$storage->name}}</h3> --}}
<p class="giacamera">{{$storage->price}}<br />
<span class="donvitinh">VNĐ/Tháng/1 Camera</span></p>
    {!!$storage->description!!}
<div class="bt_dangky"><a class="dangkyngay-bt" href="#">ĐĂNG KÝ NGAY</a></div>
            </div>
    
        </div>
            </div>
            @endforeach
    



    



    
</div>
        </div>
            </div>

    
</div>