@extends('wed.layout.master')
@section('content')
<section class="section first-section">
    <div class="container-fluid">
        <div class="masonry-blog clearfix ">
            @foreach ($highlights as $key=>$item)
                @if ($key==0)
                    <div class="first-slot" >
                @elseif($key==1)
                    <div class="second-slot" >
                @elseif($key==2)
                    <div class="last-slot">
                @endif        
                <div class="masonry-box post-media">
                    <img src="{{ "/".$item->showimage() }}" alt="" class="img-fluid" style="height:400px">
                    <div class="shadoweffect">
                       <div class="shadow-desc">
                           <div class="blog-meta">
                               <span class="bg-orange"><a href="{{ route('wed.postslug',$item->slug) }}" title="">{{ $item->category->name }}</a></span>
                               <h4><a href="{{ route('wed.postslug',$item->slug) }}" title="">{{ $item->title }}</a></h4>
                               <small>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-y') }}</small>
                           </div><!-- end meta -->
                       </div><!-- end shadow-desc -->
                   </div><!-- end shadow -->
               </div><!-- end post-media -->
           </div><!-- end first-side -->
            @endforeach
            
                

    
        </div><!-- end masonry -->
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-top clearfix">
                        <h4 class="pull-left">Recent News <a href="#"><i class="fa fa-rss"></i></a></h4>
                    </div><!-- end blog-top -->
                    @foreach ($posts as $item)
                    <div class="blog-list clearfix">
                        <div class="blog-box row">
                            <div class="col-md-4">
                                <div class="post-media">
                                    <a href="{{ route('wed.postslug',$item->slug) }}" title="">
                                        <img src="{{ "/".$item->showimage() }}" alt="" class="img-fluid">
                                        <div class="hovereffect"></div>
                                    </a>
                                </div><!-- end media -->
                            </div><!-- end col -->

                            <div class="blog-meta big-meta col-md-8">
                                {{-- <h4><a href="{{ route('wed.categoryslug',$item->slug) }}" title="{{ $item->title }}"></a></h4> --}}
                                <p>{!! $item->description !!}</p>
                                <small class="firstsmall"><a class="bg-orange" href="tech-category-01.html" title="">{{ $item->category->name }}</a></small>
                                <small>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-y') }}</small>
                                <small><i class="fa fa-eye"></i>{{ $item->view_counts}}</small>
                            </div><!-- end meta -->
                        </div><!-- end blog-box -->

                        <hr class="invis">
                    @endforeach
                    {{-- {!! $posts->links() !!} --}}
                        

        </div><!-- end row -->
    </div><!-- end container -->
</section>
@endsection
