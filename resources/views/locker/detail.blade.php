@extends('layouts.master')
@section('content')
<!-- Hero -->
<section class="section section-header text-dark pb-md-8">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 text-center mb-5 mb-md-7">
            	<h2 class="display-3 font-weight-bold mb-2 black-hans ">
                    사물함 신청
                </h2>
                <h3 class="display-4 font-weight-lighter mb-4 black-hans ">
                    	{{$building->des}}
                </h3>
                <div class = "card">
                	<div class = "card-header ">
                		<div class = "collapse navbar-collapse">
                        	<ul class="nav nav-pills mr-auto" id="pills-tab" role="tablist">
                                @foreach($lockers as $locker)
                                    @if($locker->id == $this_locker->id)
                                    <li class="nav-item">
                                    	<a class="nav-link active small animate-up-1" id="{{'locker_li_'.$locker->id}}" data-toggle="pill" href="{{'#locker_tab_'.$locker->id}}" role="tab" aria-selected="true">{{ $locker->locker_id }}번 사물함</a>
                                    </li>
                                    @else
                                    <li class="nav-item">
                                    	<a class="nav-link small animate-up-1" id="{{'locker_li_'.$locker->id}}" data-toggle="pill" href="{{'#locker_tab_'.$locker->id}}" role="tab" aria-selected="false">{{ $locker->locker_id }}번 사물함</a>
                                    </li>
                                    @endif
                                @endforeach
                            </ul>
                            <ul class="nav nav-pills ml-auto" role="tablist">
                                <li class="nav-item text-right">
                                	<a class="nav-link small animate-up-1" data-toggle="modal" data-target="" id = "delete-locker-btn">내 사물함 삭제</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class = "card-body">
                        <div class="tab-content" id="pills-tabContent">
                        	@foreach($lockers as $locker)
                        		@if($locker->id == $this_locker->id)
                                	<div class="tab-pane fade show active " id="{{'locker_tab_'.$locker->id}}" role="tabpanel" >
                                		<div class = "col-sm-12 col-md-10 table-responsive p-0 m-auto">
    										<p  class = "count-locker text-left font-weight-bolder" data-locker = "{{ $locker }}">총 사물함 수: <span class = "count-total-locker"></span>&nbsp; /&nbsp; 신청 가능 사물함 수: <span class = "count-available-locker" ></span></p>
    										<table class="table table-bordered locker-table text-left" id = "">
                                        		<tbody>
                                        			@php $pos=0; @endphp
                                        			@for ($i = 0; $i < $locker->row; $i++)
                                                    <tr>
                                                    	@for ($j = 0; $j < $locker->col; $j++)
                                                    		@isset($locker->owner_infos[$pos]->owner_id)
                                                    			@if($locker->owner_infos[$pos]->owner_id == Auth::user()->id)
                                                        		<td class = "not-available-space my-locker">
                                                        			<p class = "my-locker-position mb-0"><span>{{$locker->owner_infos[$pos]->position}}</span></p>
                                                    				<p class ="text-center font-weight-bolder mb-0 my-locker">내 사물함</p>
                                                    			</td>
                                                    			@else
                                                    			<td class = "not-available-space">
                                                        			<p class = "my-locker-position mb-0"><span>{{$locker->owner_infos[$pos]->position}}</span></p>
                                                    				<p class ="text-center font-weight-bolder mb-0">{{$users[$locker->owner_infos[$pos]->owner_id]->studentID}}</p>
                                                    			</td>
                                                    			@endif
                                                    		@else
                                                    			@if(isset($locker->owner_infos[$pos]) && $locker->owner_infos[$pos]->broken == 1)
                                                    				<td class = "broken-space">
                                                        				<p class = "my-locker-position mb-0 "><span>{{$locker->owner_infos[$pos]->position}}</span></p>
                                                        				<p class ="text-center font-weight-bolder mb-0">고장</p>
                                                    				</td>
                                                    			@else
                                                    				<td class = "available-space" data-id = "{{$locker->owner_infos[$pos]->id}}" data-pos = "{{$locker->owner_infos[$pos]->position}}"> 
                                                        				<p class = "my-locker-position mb-0"><span>{{$locker->owner_infos[$pos]->position}}</span></p>
                                                        				<p class ="text-center font-weight-bolder mb-0">신청가능</p>
                                                    				</td>
                                                    			@endif
                                                    		@endisset
                                                    		@php $pos ++; @endphp
                                                        @endfor
                                                    </tr>
                                                    @endfor
                                          		</tbody>
                                            </table>
                                            <p  class = "text-right small">신청하려는 사물함을 클릭해주세요 ! </p>
                                        </div>
									</div>
                                @else
                                	<div class="tab-pane fade " id="{{'locker_tab_'.$locker->id}}" role="tabpanel" >
                                		<div class = "col-sm-12 col-md-10 table-responsive p-0 m-auto">
    										<p  class = "count-locker text-left font-weight-bolder" data-locker = "{{ $locker }}">총 사물함 수: <span class = "count-total-locker"></span>&nbsp; /&nbsp; 신청 가능 사물함 수: <span class = "count-available-locker" ></span></p>
    										<table class="table table-bordered locker-table text-left" id = "">
                                        		<tbody>
                                        			@php $pos=0; @endphp
                                        			@for ($i = 0; $i < $locker->row; $i++)
                                                    <tr>
                                                    	@for ($j = 0; $j < $locker->col; $j++)
                                                    		@isset($locker->owner_infos[$pos]->owner_id)
                                                    			@if($locker->owner_infos[$pos]->owner_id == Auth::user()->id)
                                                        		<td class = "not-available-space my-locker">
                                                        			<p class = "my-locker-position mb-0"><span>{{$locker->owner_infos[$pos]->position}}</span></p>
                                                    				<p class ="text-center font-weight-bolder mb-0 my-locker">내 사물함</p>
                                                    			</td>
                                                    			@else
                                                    			<td class = "not-available-space">
                                                        			<p class = "my-locker-position mb-0"><span>{{$locker->owner_infos[$pos]->position}}</span></p>
                                                    				<p class ="text-center font-weight-bolder mb-0">{{$users[($locker->owner_infos[$pos]->owner_id) - 1]->studentID}}</p>
                                                    			</td>
                                                    			@endif
                                                    		@else
                                                    			@if(isset($locker->owner_infos[$pos]) && $locker->owner_infos[$pos]->broken == 1)
                                                    				<td class = "broken-space">
                                                        				<p class = "my-locker-position mb-0 "><span>{{$locker->owner_infos[$pos]->position}}</span></p>
                                                        				<p class ="text-center font-weight-bolder mb-0">고장</p>
                                                    				</td>
                                                    			@else
                                                    				<td class = "available-space" data-id = "{{$locker->owner_infos[$pos]->id}}" data-pos = "{{$locker->owner_infos[$pos]->position}}"> 
                                                        				<p class = "my-locker-position mb-0"><span>{{$locker->owner_infos[$pos]->position}}</span></p>
                                                        				<p class ="text-center font-weight-bolder mb-0">신청가능</p>
                                                    				</td>
                                                    			@endif
                                                    		@endisset
                                                    		@php $pos ++; @endphp
                                                        @endfor
                                                    </tr>
                                                    @endfor
                                          		</tbody>
                                            </table>
                                            <p  class = "text-right small">신청하려는 사물함을 클릭해주세요 ! </p>
                                        </div>
									</div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="applyModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action = "" method = "POST" id="applyForm">
            	@csrf @method('PUT')
            	<input type="hidden" name="owner_id" id="owner_id" value = "">
                <div class="modal-body">
                    <span id = "modal-locker-num" class = "font-weight-border"></span>번 사물함을 신청하시겠습니까?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary mt-0" data-dismiss="modal">취소</button>
                    <button type="submit" class="btn btn-primary mt-0">예</button>
                </div>
           	</form>
        </div>
    </div>
</div>

<div class="modal fade" id="emptyerrorModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                	삭제할 사물함이 없습니다!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary mt-0" data-dismiss="modal">확인</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                	이미 사물함이 있습니다!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary mt-0" data-dismiss="modal">확인</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deletelockerModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action = "{{route('lockers.destroy',$user->id)}}" method = "POST" id="deletelockerForm">
            	@csrf @method('DELETE')
            	<input type="hidden" name="owner_id" id="owner_id" value = "">
                <div class="modal-body">
                    사물함을 삭제하시겠습니까?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary mt-0" data-dismiss="modal">취소</button>
                    <button type="submit" class="btn btn-primary mt-0">예</button>
                </div>
           	</form>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
	$('table.locker-table td.available-space').css('cursor', 'pointer');
	$('.count-locker').each(function(){
		var locker = $(this).data().locker;
		var owners = locker['owner_infos'];
		var available = 0;
		var total = 0;
		for(var i =0 ; i< owners.length ; i++){
			if(owners[i].broken == 0 ){
				 total ++;
				if(owners[i].owner_id ==null){
					available ++;
				}
			}
		}
		$(this).find('.count-total-locker').text(total);
		$(this).find('.count-available-locker').text(available);
	});

	var selected_id = 0;
	var user = {!! json_encode($user) !!};
	$("table.locker-table td.available-space").click(function(){
		if(user['has_locker'] == 1){
			$('#errorModal').modal('toggle');
		}
		else{
    		var selected_id = $(this).data().id;
    		var selected_pos = $(this).data().pos;
    		$('#applyModal').modal('toggle');
    		$('#applyModal').find('span#modal-locker-num').text(selected_pos);
    		var url = "/lockers/"+selected_id;
    		$('#applyModal').find('form#applyForm').attr("action", url);
    		$('#applyModal').find('input#owner_id').val(selected_id);
		}
	});	

	$('#delete-locker-btn').click(function(){
		if(user['has_locker'] == 0){
			$('#emptyerrorModal').modal('toggle');
		}
		else{
    		$('#deletelockerModal').modal('toggle');
		}
	});
});

</script>
@endsection