@extends('layout')
@section('navbar')
<ul class="nav navbar-nav">
	<li id="li-1">
	<a href="{{url('/')}}"><strong><span id="span-username">TOURIST</span></strong></a>
	</li>
	<li id="li-2" class="active">
	<a href="{{url('recode')}}">RECODE</a>
	</li>
	<li id="li-3">
	<a href="http://blog.ctcyq.top">AUTHOR</a>
	</li>
</ul>
@endsection
@section('div-recode')
<div class="container-fluid" id="div-recode">
<div class="row-fluid">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title">Total Recode</h3>
      </div>
      <table class="table table-bordered">
      <thead>
      <tr>
        <th>
          User
        </th>
        <th>
          Award
        </th>
        <th>
          Time
        </th>
      </tr>
      </thead>
      <tbody id="table-body">
       
@foreach ($recodes as $key=>$value)
 <tr>
  <td>
    {{$value->user->username}}
  </td>
    <td>
    {{$value->award->awardname}}
  </td>
    <td>
    {{$value->created_at}}
  </td>
  </tr>
@endforeach

      </tbody>
      </table>
      <div class="panel-footer" id="div-count">
        Before
        <span id="span-tip">&nbsp;Nine</span>&nbsp;P.M
      </div>
    </div>
  </div>
</div>
</div>
@endsection