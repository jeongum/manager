@extends('layouts.master')

@section('content')
<section class="section-header min-vh-100 d-flex align-items-center bg-soft">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="signin-inner mt-3 mt-lg-0 bg-white shadow border rounded border-light w-100">
                    <div class="row gx-0 align-items-center justify-content-between">
                        <div class="col-12 col-lg-5 d-none d-lg-block rounded-left bg-secondary">
                            <img class = "login_school_image" src="https://portal.sejong.ac.kr/img/_img5.png" alt="login image">
                        </div>
                        <div class="col-12 col-lg-7 px-3 py-5 px-sm-5 px-md-6">
                            <div class="text-center text-md-center mb-4 mt-md-0">
                                <h1 class="mb-0 h2 font-weight-normal black-hans">로그인</h1>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <p class="m-0">학번 혹은 비밀번호가 올바르지 않습니다!</p>
                                </div>
                            @endif
                            <form action="{{route('login')}}" method="POST">
                            	@csrf	
                                <!-- Form -->
                                <div class="form-group mb-4">
                                    <label for="studentID">학번(ID)</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><span class="fas fa-envelope"></span></span>
                                        <input type="text" class="form-control" placeholder="학번" id="studentID" name="studentID">
                                    </div>  
                                </div>
                                <!-- End of Form -->
                                <div class="form-group">
                                    <!-- Form -->
                                    <div class="form-group mb-4">
                                        <label for="password">비밀번호(PW)</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon2"><span class="fas fa-unlock-alt"></span></span>
                                            <input type="password" placeholder="비밀번호" class="form-control" id="password" name = "password">
                                        </div>  
                                    </div>
                                    <!-- End of Form -->
                                    <!--     <div class="d-block d-sm-flex justify-content-between align-items-center mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck5">
                                                <label class="form-check-label" for="defaultCheck5">
                                                  Remember me
                                                </label>
                                            </div>
                                            <div><a href="#" class="small text-right">Lost password?</a></div>
                                        </div>  -->
                                    </div>
                                    <button type="submit" class="btn btn-block btn-primary">로그인</button>
                                </form>
                                <!-- <div class="d-flex justify-content-center align-items-center mt-4">
                                    <span class="font-weight-normal">
                                        Not registered?
                                        <a href="./sing-up.html" class="font-weight-bold">Create account</a>
                                    </span>  -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
