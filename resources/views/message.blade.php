<div class="clear-both"></div>

@if(!empty(session('success')))
        <div class="alert alert-success col-md-12" role="alert">
                {{session('success')}}
        </div>
@endif
@if(!empty(session('error')))
        <div class="alert alert-danger " role="alert">
                {{session('error')}}
        </div>
@endif
@if(!empty(session('payment-error')))
        <div class="alert alert-error alert-dismissibleb fade in" role="alert">
                {{session('payment-error')}}
        </div>
@endif
@if(!empty(session('worning'))) 
        <div class="alert alert-worning alert-dismissibleb fade in" role="alert">
                {{session('worning')}}
        </div>
@endif                      
@if(!empty(session('info'))) 
        <div class="alert alert-info alert-dismissibleb fade in" role="alert">
                {{session('info')}}
        </div>
@endif
@if(!empty(session('secondary'))) 
        <div class="alert alert-secondary alert-dismissibleb fade in" role="alert">
                {{session('secondary')}}
        </div>
@endif
@if(!empty(session('primary'))) 
        <div class="alert alert-primary alert-dismissibleb fade in" role="alert">
                {{session('primary')}}
        </div>
@endif