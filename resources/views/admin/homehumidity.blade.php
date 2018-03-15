
@extends('admin.layouts.index')
@section('content')

<div class="main-grid">
      <!-- date picker -->
      <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
          <div class="col-md-6">
            <label for="from">From</label>
            <input style="border-radius: 5px;" type="text" id="from" name="from">
            <label for="to">To</label>
            <input style="border-radius: 5px;" type="text" id="to" name="to">
            <button id="find-time" class="btn btn-sm" style="background-color: #00bcd4">Chọn Thời Gian</button>
          </div>
        </div>
      </div>
      <br>
      <!--/date picker -->
      <div class="social grid">
          <div class="grid-info">
            <div class="col-md-6 ">
              <div class="comments likes">
                <div class="comments-icon">
                  <i class="fa fa-fire fa-lg"></i>
                </div>
                <div class="comments-info likes-info">
                <h3>{{$highest->number}} %</h3>
                  <a href="#">Cao nhất</a>
                </div>
                <div class="clearfix"> </div>
              </div>
            </div>
            <div class="col-md-6 ">
              <div class="comments">
                <div class="comments-icon">
                  <i class="fa fa-snowflake-o fa-lg"></i>
                </div>
                <div class="comments-info">
                  <h3>{{$smallest->number}} %</h3>
                  <a href="#">Thấp nhất</a>
                </div>
                <div class="clearfix"> </div>
              </div>
            </div>
            <div class="clearfix"> </div>
          </div>
      </div>
      <div class="agile-last-grids">
        <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 agile-last-left agile-last-right">
          <div class="agile-last-grid">
            <div class="area-grids-heading">
              <h3>Thống kê độ ẩm trong phòng <span style="color: #00bcd4">{{$start}} - {{$end}}</span></h3>
            </div>
            <div id="graph9"></div>
            <script type="text/javascript">
            var day_data = [
              {!! mb_convert_encoding($revenue_report, "UTF-8", "HTML-ENTITIES") !!} 
            ];

            Morris.Line({
              element: 'graph9',
              data: day_data,
              xkey: 'date',
              ykeys: ['HomeHumidity'],
              labels: ['HomeHumidity'],
              parseTime: false
            });
            </script>

          </div>
        </div>
        <div class="clearfix"> </div>
      </div>
    </div>


@stop
@section('css')
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@stop
@section('script')
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 
  <script>
    $( function() {
      var dateFormat = "mm/dd/yy",
        from = $( "#from" )
          .datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 3
          })
          .on( "change", function() {
            to.datepicker( "option", "minDate", getDate( this ) );
          }),
        to = $( "#to" ).datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 3
        })
        .on( "change", function() {
          from.datepicker( "option", "maxDate", getDate( this ) );
        });
   
      function getDate( element ) {
        var date;
        try {
          date = $.datepicker.parseDate( dateFormat, element.value );
        } catch( error ) {
          date = null;
        }
   
        return date;
      }
    } );
  </script>

  <!-- find time-->
  <script type="text/javascript">
    $(document).ready(function()
    {
      $("#find-time").click(function()
      {
        var start_time = $("#from").val();
        var end_time = $("#to").val();
        window.location.href = "http://localhost:8888/smarthome/public/homehumidity?start_time="+start_time+"&end_time="+end_time;
      });
    });
  </script>
@stop



