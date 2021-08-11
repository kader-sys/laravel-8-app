@foreach ($categories as $cat )
<ul class="list-group">
    <li class="list-group-item">{{$cat->name}}</li>
</ul>
@endforeach