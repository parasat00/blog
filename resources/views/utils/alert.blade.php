@if(session('errors'))
    <div class="bg-danger text-white p-2 mb-3">{{ session('errors')->getBags()['default']->first() }}</div>
@endif
