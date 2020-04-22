@if ($pesan = Session::get('sukses'))
<div class="alert alert-success alert-dismissible show fade">
    <div class="alert-body">
        <button class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
        {!! $pesan !!}
    </div>
</div>
@endif

@if ($pesan = Session::get('status-magang'))
<div class="alert alert-success alert-dismissible show fade">
    <div class="alert-body">
        <button class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
        {!! $pesan !!}
    </div>
</div>
@endif

@if ($pesan = Session::get('status-profile'))
<div class="alert alert-success alert-dismissible show fade">
    <div class="alert-body">
        <button class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
        {!! $pesan !!}
    </div>
</div>
@endif

@if ($pesan = Session::get('status-password'))
<div class="alert alert-success alert-dismissible show fade">
    <div class="alert-body">
        <button class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
        {!! $pesan !!}
    </div>
</div>
@endif

@if ($pesan = Session::get('verified'))
<div class="alert alert-success alert-dismissible show fade">
    <div class="alert-body">
        <button class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
        {!! $pesan !!}
    </div>
</div>
@endif

@if ($pesan = Session::get('update'))
<div class="alert alert-info alert-dismissible show fade">
    <div class="alert-body">
        <button class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
        {!! $pesan !!}
    </div>
</div>
@endif

@if ($pesan = Session::get('delete'))
<div class="alert alert-success alert-dismissible show fade">
    <div class="alert-body">
        <button class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
        {!! $pesan !!}
    </div>
</div>
@endif
