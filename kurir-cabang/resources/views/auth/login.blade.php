@extends('layouts.login')

<div class="container">
  <div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-8">
      @if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Whoops!</strong> Ada masalah dengan data inputan Anda.<br><br>
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info" >
          <div class="panel-heading">
            <div class="panel-title">Cabang Login</div>
          </div>
          <div style="padding-top:30px" class="panel-body" >
            <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
            <form id="loginForm" class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div id="alert-error-login" class="alert-error"></div>
              <div id="successMessage"></div>
              <div style="margin-bottom: 25px" class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Username" autocomplete="off">
              </div>
              <div style="margin-bottom: 25px" class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input type="password" class="form-control" name="password" placeholder="Password">
              </div>
              <div style="margin-top:10px" class="form-group">
                <div class="col-sm-12 controls">
                  <button type="submit" class="btn btn-default col-sm-12">Masuk</button>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12 control">
                  <div style=" padding-top:20px; text-align:center; font-size:100%" >
                    <span class="label label-default">&copy 2016 - Kurir Apps</span>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
