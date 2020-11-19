@extends('layouts.master')

@section('content')
<section class="section-header min-vh-100 d-flex align-items-center bg-soft">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="signin-inner mt-3 mt-lg-0 bg-white shadow border rounded border-light w-100">
                    <div class="row gx-0 align-items-center justify-content-between">
                        <div class="col-12 d-lg-block rounded-left bg-secondary">
                            <img class = "login_school_image" src="http://home.sejong.ac.kr/front_tpl_depart/imgs/main_vi/img0.jpg" alt="login image">
                        </div>
                        <div class="col-12 col-lg-7 px-3 py-5 m-auto">
                            <div class="text-center text-md-center mb-4 mt-md-0">
                                <h1 class="mb-0 h2 font-weight-normal black-hans" >회원가입</h1>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <p class="m-0">이미 존재하는 회원입니다</p>
                                </div>
                            @endif
                            <form method="POST" action="{{ route('register') }}">
                    		@csrf
                                <div class="form-group mb-4">
                                    <label for="InputStudentIDCard1">학번</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon3"><span class="fas fa-user-graduate"></span></span>
                                        <input type="text" class="form-control" placeholder="학번을 입력하세요." id="studentID" name = "studentID" numberOnly required>
                                    </div>
                                    <label class = "error-sign" id="studentID_error" >숫자만 입력하세요</label>  
                                </div>
                                <div class="form-group mb-4">
                                    <label for="InputNameCard2">이름</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon3"><span class="fas fa-user"></span></span>
                                        <input type="text" class="form-control" placeholder="이름을 입력하세요." id="name" name = "name" required>
                                    </div>  
                                </div>
                                <div class="form-group mb-3">
                                    <label for="InputEmailCard3">이메일</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon3"><span class="fas fa-envelope"></span></span>
                                        <input type="email" class="form-control" placeholder="이메일을 입력하세요." id="email" name = "email" required>
                                    </div>  
                                </div>
                                <div class="form-group">
                                    <!-- Form -->
                                    <div class="form-group mb-4">
                                        <label for="InputPasswordCard4">비밀번호</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon4"><span class="fas fa-unlock-alt"></span></span>
                                            <input type="password" placeholder="비밀번호를 입력하세요" class="form-control" id="password" name="password" required>
                                        </div>  
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="exampleInputPasswordCard4">비밀번호 확인</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon5"><span class="fas fa-unlock-alt"></span></span>
                                            <input type="password" placeholder="비밀번호를 한번 더 입력하세요" class="form-control" id="password_confirm" required>
                                        </div>
                                        <label class = "error-sign" id="password_error" >비밀번호가 일치하지 않습니다.</label>    
                                    </div>
                                    <div class="form-check mb-4">
                                        <input class="form-check-input" type="checkbox" name="check" id="check" required>
                                        <label class="form-check-label" for="defaultCheck6">
                                            개인정보 이용 약관에 동의합니다.</a>
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-block btn-primary" id = "submit_btn">회원가입</button>
                            </form>
                            <div class="d-flex justify-content-center align-items-center mt-4">
                                <span class="font-weight-normal">
                                    이미 회원이신가요?
                                    <a href="{{route('login')}}" class="font-weight-bold">로그인하기</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
$(document).ready(function(){
	$('#studentID_error').hide();
	$('#password_error').hide();
	$("#submit_btn").attr("disabled","disabled");
});

$("input:text[numberOnly]").on("keyup", function() {
    var new_val = $(this).val().replace(/[^0-9]/g,"");
    if(new_val ==  $(this).val()){
		$('#studentID_error').hide();
    }
    else{
    	$(this).val(new_val);
    	$('#studentID_error').show();
    }
});

$("#password, #password_confirm").on("keyup", function(){
	var password = $('#password').val();
	var password_confirm = $('#password_confirm').val();

	if(password == password_confirm){
		$('#password_error').hide();
	}

	else {
		$('#password_error').show();
	}
});
$("#check").on("click", function(){
	if($(this).is(":checked") == true) {
		$("#submit_btn").removeAttr("disabled");
	}
	else{
		$("#submit_btn").attr("disabled", "disabled");
	}
});

</script>
@endsection
