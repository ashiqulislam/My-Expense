@if($errors->any())
<div class="row">
  <div class="col-lg-12">    
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $er)
            <li>{{$er}}</li>
          @endforeach
        </ul>
      </div>
  </div>
<!-- /.col-lg-12 -->
</div>
@endif
@if (session('resent'))
<div class="alert alert-success" role="alert">
    {{ __('A fresh verification link has been sent to your email address.') }}
</div>
@endif
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<div class="col-lg-12">
  @if (Session::has('message-error'))
  <div class="alert alert-danger" role="alert">{{Session::get('message-error')}}</div>
  @endif
  @if (Session::has('message-success'))
  <div class="alert alert-success" role="alert">{{Session::get('message-success')}}</div>
  @endif
</div>