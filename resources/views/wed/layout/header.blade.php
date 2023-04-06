<header class="tech-header header">
    <div class="container-fluid">
        <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="tech-index.html"><img src="images/version/tech-logo.png" alt=""></a>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('wed.home') }}">Home</a>
                    </li>
                    <li class="nav-item dropdown has-submenu menu-large hidden-md-down hidden-sm-down hidden-xs-down">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">News</a>
                        <ul class="dropdown-menu megamenu" aria-labelledby="dropdown01">
                            <li>
                                <div class="container">
                                    <div class="mega-menu-content clearfix">
                                        <div class="tab">
                                            @foreach(\App\Models\admin\Category::all() as $key=>$item)
                                                @if ($key==0)
                                                    <button class="tablinks active" onclick="openCategory(event, '{{ 'cat0'.$key+1 }}')">{{ $item->name }}</button>
                                                @else
                                                    <button class="tablinks" onclick="openCategory(event, '{{ 'cat0'.$key+1 }}')">{{ $item->name }}</button>
                                                @endif
                                                
                                            @endforeach
                                            {{-- <button class="tablinks active" onclick="openCategory(event, 'cat01')">Science</button>
                                            <button class="tablinks" onclick="openCategory(event, 'cat02')">Technology</button>
                                            <button class="tablinks" onclick="openCategory(event, 'cat03')">Social Media</button>
                                            <button class="tablinks" onclick="openCategory(event, 'cat04')">Car News</button>
                                            <button class="tablinks" onclick="openCategory(event, 'cat05')">Worldwide</button> --}}
                                        </div>

                                        <div class="tab-details clearfix">
                                            @foreach(\App\Models\admin\Category::all() as $key=>$item)
                                                @if ($key==0)
                                                    <div id="cat01" class="tabcontent active">
                                                @else
                                                    <div id="{{ 'cat0'.$key+1 }}" class="tabcontent">
                                                @endif
                                                <div class="row">
                                                @foreach (\App\Models\admin\Post::where('category_id',$item->id)->where('new_post',1)->get() as $post)
                                                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                        <div class="blog-box">
                                                            <div class="post-media">
                                                                <a href="tech-single.html" title="">
                                                                    {{-- <img src="{{ $post->showimage() }}" alt="" class="img-fluid"> --}}
                                                                    <div class="hovereffect">
                                                                    </div><!-- end hover -->
                                                                    <span class="menucat">{{ $post->category->name }}</span>
                                                                </a>
                                                            </div><!-- end media -->
                                                            <div class="blog-meta">
                                                                <h4><a href="{{ route('wed.postslug',$post->slug) }}" title="">{{ $post->title }}</a></h4>
                                                            </div><!-- end meta -->
                                                        </div><!-- end blog-box -->
                                                    </div>
                                                @endforeach
                                            </div><!-- end row -->
                                            </div>
                                            @endforeach
                                                <div id="cat02" class="tabcontent">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                            <div class="blog-box">
                                                                <div class="post-media">
                                                                    <a href="tech-single.html" title="">
                                                                        <img src="upload/tech_menu_17.jpg" alt="" class="img-fluid">
                                                                        <div class="hovereffect">
                                                                        </div><!-- end hover -->
                                                                        <span class="menucat">Worldwide</span>
                                                                    </a>
                                                                </div><!-- end media -->
                                                                <div class="blog-meta">
                                                                    <h4><a href="tech-single.html" title="">Grilled vegetable with fish prepared with fish</a></h4>
                                                                </div><!-- end meta -->
                                                            </div><!-- end blog-box -->
                                                        </div>

                                                        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                            <div class="blog-box">
                                                                <div class="post-media">
                                                                    <a href="tech-single.html" title="">
                                                                        <img src="upload/tech_menu_18.jpg" alt="" class="img-fluid">
                                                                        <div class="hovereffect">
                                                                        </div><!-- end hover -->
                                                                        <span class="menucat">Worldwide</span>
                                                                    </a>
                                                                </div><!-- end media -->
                                                                <div class="blog-meta">
                                                                    <h4><a href="tech-single.html" title="">The world's finest and clean meat restaurants</a></h4>
                                                                </div><!-- end meta -->
                                                            </div><!-- end blog-box -->
                                                        </div>

                                                        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                            <div class="blog-box">
                                                                <div class="post-media">
                                                                    <a href="tech-single.html" title="">
                                                                        <img src="upload/tech_menu_19.jpg" alt="" class="img-fluid">
                                                                        <div class="hovereffect">
                                                                        </div><!-- end hover -->
                                                                        <span class="menucat">Worldwide</span>
                                                                    </a>
                                                                </div><!-- end media -->
                                                                <div class="blog-meta">
                                                                    <h4><a href="tech-single.html" title="">Fried veal and vegetable dish</a></h4>
                                                                </div><!-- end meta -->
                                                            </div><!-- end blog-box -->
                                                        </div>

                                                        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                            <div class="blog-box">
                                                                <div class="post-media">
                                                                    <a href="tech-single.html" title="">
                                                                        <img src="upload/tech_menu_20.jpg" alt="" class="img-fluid">
                                                                        <div class="hovereffect">
                                                                        </div><!-- end hover -->
                                                                        <span class="menucat">Worldwide</span>
                                                                    </a>
                                                                </div><!-- end media -->
                                                                <div class="blog-meta">
                                                                    <h4><a href="tech-single.html" title="">Tasty pasta sauces and recipes</a></h4>
                                                                </div><!-- end meta -->
                                                            </div><!-- end blog-box -->
                                                        </div>
                                                    </div><!-- end row -->
                                                </div>
                                        </div><!-- end tab-details -->
                                    </div><!-- end mega-menu-content -->
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tech-category-01.html">Gadgets</a>
                    </li>                   
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('wed.login') }}">Videos</a>
                    </li>   
                    <li class="nav-item">
                        <a class="nav-link" href="tech-category-03.html">Reviews</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('wed.contact') }}">Contact Us</a>
                    </li>
                </ul>
                {{-- <ul class="navbar-nav mr-2">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-rss"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-android"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-apple"></i></a>
                    </li>
                </ul> --}}
            </div>
        </nav>
    </div><!-- end container-fluid -->
</header><!-- end market-header -->
