@extends('layout')
@section('navbar')
<ul class="nav navbar-nav">
  <li class="active" id="li-1">
  <a href="{{url('/')}}"><strong><span id="span-username">TOURIST</span></strong></a>
  </li>
  <li id="li-2">
  <a href="{{url('recode')}}">RECODE</a>
  </li>
  <li id="li-3">
  <a href="http://blog.ctcyq.top">AUTHOR</a>
  </li>
</ul>
@endsection
@section('div-lottery')
<div class="container-fluid" id="div-lottery">
  <div class="row">
  <div class="modal col-xs-12 col-sm-12 col-md-12 col-lg-12" tabindex="-1" role="dialog" id="modal-tip">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" id="span-close">×</span></button>
          <h4 class="modal-title">Register Name</h4>
        </div>
        <div class="modal-body input-group input-group-lg">
          <span class="input-group-addon" id="sizing-addon1">@</span>
          <input type="text" class="form-control" id="input-username" placeholder="Enter Name" aria-describedby="sizing-addon1" name="input-username">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" id="btn-close">Close</button>
          <button type="button" class="btn btn-primary" id="btn-sub">Done</button>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="jumbotron" id="div-tip">
  <h1 id="h1-username"></h1>
  <p>
      This is an internal activity. So,You need to 
    <a id="a-show">register</a> your name.
  </p>
</div>
<div class="row-fluid" id="div-content">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="panel panel-success">
      <div class="panel-heading">
        <h3 class="panel-title" id="h3-username"></h3>
      </div>
      <div class="panel-body" id="div-choose">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Get Your Award" name="input-award" readonly>
          <span class="input-group-btn">
          <button class="btn btn-default" type="button" id="btn-get-award"><span class="glyphicon glyphicon-play"></span></button>
          </span>
        </div>
      </div>
      <table class="table table-bordered">
      <thead>
      <tr>
        <th>
          NO.
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
      </tbody>
      </table>
      <div class="panel-footer" id="div-count">
        -&nbsp;
        <span id="span-count"></span>&nbsp;-
      </div>
    </div>
  </div>
</div>
</div>
<div style="display: none;">
  <span id="tmp_award"></span>
  <span id="tmp_time"></span>
</div>
@endsection