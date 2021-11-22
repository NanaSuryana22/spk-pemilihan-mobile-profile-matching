@if(Session::has('error'))
  <div class="alert alert-danger alert-dismissible " role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
    <strong>Pemberitahuan!</strong>
    <br />
    {{ Session::get('error') }}.
  </div>
@endif
@if(Session::has('notice'))
<div class="alert alert-success alert-dismissible " role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
  </button>
  <strong>Pemberitahuan!</strong>
  <br />
  {{ Session::get('notice') }}.
</div>
@endif