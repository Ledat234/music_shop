@include('music.layout')
@extends('clien.layout.index')
@section('content')
    <h2 class="list-product-title">NEW SONG</h2>

    <div class="list-product-subtitle">

        <p>List song description</p>

    </div>

    <div class="product-group">

        <div class="row">
            @if($searchs->isNotEmpty())
            <h4>Search : <strong>{{ $_GET['query'] }}</strong></h4>
            @foreach ($searchs as $search)
            
                        <div class="el-wrapper">
                            <div class="box-up">
                                <img class="img" src="{{ asset('image/music/'. $search->image) }}" alt="">
                                <div class="img-info">
                                    <div class="info-inner">
                                        <span class="p-name">{{ $search->name }}</span>
                                        <span class="p-company">{{ $search->singer }}</span>

                                    </div>
                                    <div class="a-size">

                                        <span><audio controls controlsList="nodownload" style="width: 290px; height:40px"
                                                ontimeupdate="myAudio(this)">
                                                <source src="{{ asset('audio/music/' . $search->audio) }}" type="audio/mp3">
                                            </audio>
                                            <script type="text/javascript">
                                                function myAudio(event) {
                                                    if (event.currentTime > 10) {
                                                        event.currentTime = 0;
                                                        event.pause();
                                                        alert("Bạn phải trả phí để nghe cả bài")
                                                    }
                                                }
                                            </script>
                                            <span><a href="{{ route('pages.detail', $search->id) }}"
                                                    class="btn btn-primary"style="border-radius: 20px">Details</a></span>

                                        </span>

                                    </div>
                                </div>
                            </div>

                            <div class="box-down">
                                <div class="h-bg">
                                    <div class="h-bg-inner"></div>
                                </div>

                                <a class="cart" href="{{ url('add-to-cart/' . $search->id) }}">

                                    <span class="price">{{ $search->price }} $</span>
                                    <span class="add-to-cart">
                                        <span class="txt">Add to cart</span>
                                    </span>
                                </a>
                            </div>
                        </div>

            
                
            @endforeach
            @else
            <div>
                <h2>No posts found</h2>
            </div>
        @endif
        </div>

    </div>
@endsection

