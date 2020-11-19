@extends('layouts.master')
@section('content')

<section class="section section-header text-dark pb-md-8">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 text-center mb-5 mb-md-7">
            	<h2 class="display-3 font-weight-bold mb-2 black-hans ">
                    사물함 신청
                </h2>
                <h3 class="display-4 font-weight-lighter mb-4 black-hans ">
                    	신청하고자하는 건물을 고르세요.
                </h3>
                <div class = "card">
                    <div class = "card-body">
                    	<table class="table" id = "building-list-table">
                    		<thead>
                    			<th>#</th>
                    			<th>건물</th>
                    			<th>총 사물함 수</th>
                    			<th>사용 가능한 사물함 수</th>
                    		</thead>
                    		<tbody>
                    			@php $i=1 @endphp
                    			@foreach($buildings as $building)
                    			<tr data-id = "{{$building->id}}">
                    				<td>{{ $i ++ }}</td>
                    				<td>{{ $building->des }}</td>
                    				<td>{{ $total }}</td>
                    				<td>{{ $available }}</td>
                    			</tr>
                    			@endforeach
                			</tbody>
                    	</table>
                    </div>
                </div>
            </div>
	    </div>
	</div>
</section>
<script>
$(document).ready(function(){
	$('#building-list-table tbody tr').css('cursor', 'pointer');
});
$("#building-list-table tbody tr").click(function() {
	var id = $(this).data().id;
  	window.location.href = '/lockers/'+id;
});
</script>
@endsection