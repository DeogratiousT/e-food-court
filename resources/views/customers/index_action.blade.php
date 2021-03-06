{{-- <a href="{{ route('customers.show', $user) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="View User"> <i class="mdi mdi-eye"></i></a> --}}
{{ count($user->orders) }}