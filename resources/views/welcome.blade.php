@extends('layouts.master')
@section('content')
<!-- Hero -->
<section class="section section-header text-dark pb-md-8 bg-soft">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 text-center my-5 my-md-7" id = "main-bg">
                <h1 class="display-2 font-weight-bold mb-2 black-hans">
                    세종대학교 소프트웨어학과
                </h1>
                <h3 class="display-3 font-weight-bold mb-4 black-hans">
                    사물함 현황
                </h3>
                <div class = "col-10 m-auto">
                    @foreach ($building_info as $building)
                    @php $pos=1; $num_l=0; $num_p=0; @endphp
                    <table class="table table-bordered building-table">
                		<tbody>
                			@for ($i = 0; $i < 6; $i++)
                            <tr>
                            	@for ($j = 0; $j < 6; $j++)
                            		@if($num_l < count($building->locker_infos) && $building->locker_infos[$num_l]->position == $pos )
                                		<td class = "locker-space" data-id = "{{ $building->locker_infos[$num_l]->id }}">{{ $building->locker_infos[$num_l]->locker_id }}</td>
                                		@php $num_l++; @endphp
                            		@elseif($num_p < count($building->class_infos) && $building->class_infos[$num_p]->position == $pos )
                                		<td class = "class-space">{{ $building->class_infos[$num_p]->des }}</td>
                                		@php $num_p++; @endphp
                            		@else
                            			<td class = "empty-space">&nbsp;</td>
                            		@endif
                            		@php $pos++; @endphp
                                @endfor
                            </tr>
                            @endfor
                  		</tbody>
                    </table>
                    <p class="mb-4 mb-lg-5">{{ $building->des }}<br><span class ="small">* 사물함 번호를 클릭하면 해당 사물함 현황을 보실 수 있습니다 *</span></p>
                    
                    @endforeach
                </div>
                <div>
                    <a href="{{route('lockers.index')}}" class="btn btn-dark btn-download-app mb-xl-0 mr-2 mr-md-3">
                        <span class="d-flex align-items-center">
                            <span class="icon icon-brand mr-2 mr-md-3 main-page-icon"><i class="far fa-hand-point-up"></i></span>
                            <span class="d-inline-block text-left">
                                <small class="font-weight-normal d-none d-md-block"></small> 신청하기 
                            </span> 
                        </span>
                    </a>
                    <a  class="btn btn-dark btn-download-app" id="go-my-locker">
                        <span class="d-flex align-items-center">
                            <span class="icon icon-brand mr-2 mr-md-3 main-page-icon"><i class="far fa-calendar-check"></i></span>
                            <span class="d-inline-block text-left">
                                <small class="font-weight-normal d-none d-md-block"></small> 내사물함 
                            </span> 
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@isset($user)
    @if($user->has_locker==0)
    <div class="modal fade" id="mainerrorModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    	사물함이 없습니다!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary mt-0" data-dismiss="modal">확인</button>
                </div>
            </div>
        </div>
    </div>
    
    @else
    <div class="modal fade" id="mylockerModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                	<div class = "border-bottom">
                		<label class = "font-weight-bolder mt-2">위치</label>
                		<p class="mb-2"><span class = "">{{$user->building_info->des}}</span></p>
                	</div>
                	<div class = "border-bottom">
                		<label class = "font-weight-bolder mt-2">사물함 위치 번호</label>
                		<p class="mb-2"><span class = "">{{$user->locker_info->locker_id}} 번 사물함</span></p>
                	</div>
                	<div class = "border-bottom">
                		<label class = "font-weight-bolder mt-2">내 사물함 번호</label>
                		<p class="mb-2"><span class = "">{{$user->owner_info->position}} 번</span></p>
                	</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary mt-0" data-dismiss="modal">확인</button>
                </div>
            </div>
        </div>
    </div>
    @endif
@endisset
<script>
$(document).ready(function(){
	$('table.building-table td.locker-space').css('cursor', 'pointer');

	var user = jQuery.parseJSON('{!! json_encode($user) !!}');
	
	$("#go-my-locker").click(function(){
		if(user == null){
			window.location.href = "login";
		}
		else if(user['has_locker'] == 0){
			$('#mainerrorModal').modal('toggle');
			
		}
		else{
			$('#mylockerModal').modal('toggle');
		}
	});
});

$("table.building-table td.locker-space").click(function(){
	var id = $(this).data().id;
	window.location.href = "lockers/"+id;
});

</script>
@endsection