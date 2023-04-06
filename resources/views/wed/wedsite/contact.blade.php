@extends('wed.layout.master')
@section('content')
<div class="page-title lb single-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <h2><i class="fa fa-envelope-open-o bg-orange"></i> Contact us <small class="hidden-xs-down hidden-sm-down">Nulla felis eros, varius sit amet volutpat non. </small></h2>
            </div><!-- end col -->
            <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('wed.home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Contact</li>
                </ol>
            </div><!-- end col -->                    
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end page-title -->
<section class="section wb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-wrapper">
                    <div class="row">
                        <div class="col-lg-5">
                            <h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Chúng ta là ai</font></font></h4>
                            <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tech Blog là một blog cá nhân dành cho nội dung nhiếp ảnh thủ công, máy ảnh, phong cách thời trang từ các nhà sáng tạo độc lập trên khắp thế giới.</font></font></p>
           
                            <h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Làm thế nào chúng tôi giúp đỡ?</font></font></h4>
                            <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ngay cả vulputate urn cũng là tác giả tự do vĩ đại nhất. </font><font style="vertical-align: inherit;">No dignissim ligula diam, in sollicitudin ligula congue quis turpis dui urna nibhs.</font></font></p>
     
                            <h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Câu hỏi trước khi bán hàng</font></font></h4>
                            <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Hiện vẫn chưa rõ ai sẽ chịu trách nhiệm về kết quả của phiên tòa. </font><font style="vertical-align: inherit;">Đại lý bất động sản Hendrerit tâng bốc bọn trẻ. </font><font style="vertical-align: inherit;">Không nguyên vẹn.</font></font></p>
                        </div>
                        <div class="col-lg-7">
                            <form class="form-wrapper" action="{{ route('wed.sendcontact') }} " method="POST">
                                @csrf
                                <input type="text" name="name" class="form-control" placeholder="Tên của bạn">
                                <input type="Email" name="email" class="form-control" placeholder="Địa chỉ email">
                                <input type="text" name="phone" class="form-control" placeholder="Điện thoại">
                                <input type="text" name="subject" class="form-control" placeholder="Chủ thể">
                                <textarea class="form-control" name="message" placeholder="Tin nhắn của bạn"></textarea>
                                @if (session('success'))
                                <div class="alert aleart_sucess">{{ session('success') }}</div>
                                @endif
                                <button type="submit" class="btn btn-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Gửi</font></font><i class="fa fa-envelope-open-o"></i></button>
                            </form>
                        </div>
                    </div>
                </div><!-- end page-wrapper -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
@endsection
