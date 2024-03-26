<div class="container">
    <h1>Weekly Calendar View</h1>
    <div class="row">
        @for ($i = 0; $i < 7; $i++)
        <div class="col-md-2">
            <h3>{{ \Carbon\Carbon::now()->startOfWeek()->addDays($i)->toDateString() }}</h3>
            <ul class="list-group">
                @foreach ($events->where('day', \Carbon\Carbon::now()->startOfWeek()->addDays($i)->toDateString()) as $event)
                <li class="list-group-item">{{ $event->title }}
                    <form action="{{ route('events.delete', $event->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </li>
                @endforeach
            </ul>
        </div>
        @endfor
    </div>
</div>