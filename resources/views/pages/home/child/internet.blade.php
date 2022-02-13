@foreach ($listInternet as $list)


    <div class="row" id="row-1687466452">

        <div id="col-1260718203" class="col small-12 large-12">
            <div class="col-inner">


                <div class="container section-title-container">
                    <h3 class="section-title section-title-normal"><b></b><span
                            class="section-title-main">{{ $list->name }}</span><b></b></h3>
                </div>
                <div id="gap-459636481" class="gap-element clearfix" style="display:block; height:auto;">

                    <style>
                        #gap-459636481 {
                            padding-top: 20px;
                        }

                    </style>
                </div>

                <ul class="goi_cuoc_home">
                    @foreach ($list->internet as $combo)
                        <li class="col_li-3 internet-ca-nhan">
                            @include('components.item_internet');
                        </li>
                    @endforeach

                </ul>
 
            </div>
        </div>


    </div>

@endforeach
