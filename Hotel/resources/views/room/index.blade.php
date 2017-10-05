@extends('layouts.app')

@section('content')
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
            
              
                <div class="table-responsive">

                    
					<table class="table table-bordered table-hover table-striped table-condensed">
                    <colgroup>
						    <col width="50%">
							<col width="25%">
							<col width="25%">
							
							
						</colgroup>
						
						<tr>
							<th class="text-center">部屋タイプ</th>
							<th class="text-center">空き状況</th>
							<th class="text-center">予約する</th>
						</tr>
						
						<tr>
							<td class="text-center">ダブルルーム</td>
							<td class="text-center">{{ count($VacantRoom->getDoubleRoomList()) }}</td>
							<td class="text-center">
							@if (count($VacantRoom->getDoubleRoomList()) > 0)
							    <a href="{{ route('roomlist.bookingDouble', request()->date) }}">予約する</a>
							@endif
							</td>
						</tr>
						
						<tr>
							<td class="text-center">シングルルーム</td>
							<td class="text-center">{{ count($VacantRoom->getSingleRoomList()) }}</td>
							<td class="text-center">
							@if (count($VacantRoom->getSingleRoomList()) > 0)
							    <a href="{{ route('roomlist.bookingSingle', request()->date) }}">予約する</a>
							@endif
							</td>
						</tr>
            
                    </table>
				</div>
            </div>
        </div>
 @endsection
