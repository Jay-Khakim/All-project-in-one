{{-- 
<a href="mailto:{{$entry->email}}" class="btn btn-xs btn-link"><i class="far fa-envelope"></i> Send Email</a> --}}


<a href="{{ url($crud->route.'/'.$entry->getKey().'/moderate') }} " class="btn btn-xs btn-default"><i class="fa fa-ban"></i> Moderate</a>
