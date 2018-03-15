
@extends('admin.layouts.index')
@section('content')

<div class="main-grid">
      <div class="social grid">
          <div class="grid-info">
            <div class="col-md-4 ">
              <div class="comments likes">
                <div class="comments-icon">
                  <i class="fa fa-fire fa-lg"></i>
                </div>
                <div class="comments-info likes-info">
                <h3>{{$teamperature_now->number}} &#8451</h3>
                  <a href="#" style="color: white !important" >Nhiệt độ hiện tại</a>
                </div>
                <div class="clearfix"> </div>
              </div>
            </div>
            <div class="col-md-4 ">
              <div class="comments">
                <div class="comments-icon">
                  <i class="fa fa-snowflake-o fa-lg"></i>
                </div>
                <div class="comments-info">
                  <h3>{{$home_humidiy_now->number}} %</h3>
                  <a href="#" style="color: white !important" >Độ ẩm không khí hiện tại</a>
                </div>
                <div class="clearfix"> </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="comments tweets">
                <div class="comments-icon">
                  <i class="fa fa-snowflake-o fa-lg"></i>
                </div>
                <div class="comments-info">
                  <h3>{{$lan_humidiy_now->number}}</h3>
                  <a href="#" style="color: white !important">Độ khô của đất hiện tại</a>
                </div>
                <div class="clearfix"> </div>
              </div>
            </div>
            <div class="clearfix"> </div>
          </div>
      </div>
    </div>
@stop




