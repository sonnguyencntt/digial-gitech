<ul class="goi_cuoc_home">
    @foreach ($listPlay as $listPlay )
        
    
    <li class="col_li-3 fpt-play">
    <h3>{{$listPlay->name}}</h3>
    <div class="thongtin-goicuoc">
    <p class="gia-goicuoc">{{number_format($listPlay->price,0, ',', '.')}}<span class="dongia">đ/Tháng</span></p>
    <div class="linebt"></div>
    <div class="mota_goicuoc">
    {!!$listPlay->description!!}
    </div>
    </p></div>
    <div class="bt_dangky"><a href="#" d onclick="showModalOrder({{$listPlay->id}} , '{{$listPlay->name}}' , '{{$badges->store_code}}')" class="dangkyngay-bt pum-trigger" style="cursor: pointer;">ĐĂNG KÝ NGAY</a></div>
    </li>
    @endforeach
    </ul>
            </div>
                </div>
    
        
    </div>
    <div class="row"  id="row-1724194530">
    
        <div id="col-330990495" class="col small-12 large-12"  >
            <div class="col-inner"  >
                
                
    <div class="row"  id="row-627671684">
    
        <div id="col-702748553" class="col medium-6 small-12 large-6"  >
            <div class="col-inner"  >
                
                
    <div class="container section-title-container" ><h2 class="section-title section-title-normal"><b></b><span class="section-title-main" >Thông tin chi tiết</span><b></b></h2></div>
    {!!$listPlay->category->details!!}
            </div>
                </div>
    
        
    
        <div id="col-1500710546" class="col medium-6 small-12 large-6"  >
            <div class="col-inner"  >
                
                
    <div class="container section-title-container" ><h2 class="section-title section-title-normal"><b></b><span class="section-title-main" >Ưu điểm</span><b></b></h2></div>
    {!!$listPlay->category->advantage!!}
            </div>
                </div>
    
        
    </div>
            </div>
                </div>
    
        
    </div>