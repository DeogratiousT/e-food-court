@if ($user->blocked == 0)
    <span class="badge badge-success badge-pill">Active</span>
@else
    <span class="badge badge-danger badge-pill">Blocked</span>
@endif