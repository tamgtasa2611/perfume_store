<div class="text-center">
    Hello, <br>
    <span class="fs-5">{{$customer->first_name}} {{$customer->last_name}}</span>
</div>
<hr>
<div>
    <ul class="list-unstyled">
        <li class="pb-2">
            <a href="{{route('profile')}}" class="text-decoration-none text-dark">
                <i class="bi bi-person me-3 text-warning"></i> My account
            </a>
        </li>
        <li class="py-2">
            <a href="{{route('orderHistory')}}" class="text-decoration-none text-dark">
                <i class="bi bi-file-text me-3 text-success"></i> Orders history
            </a>
        </li>
        <li class="py-2">
            <a href="{{route('pwd.edit')}}" class="text-decoration-none text-dark">
                <i class="bi bi-shield-lock me-3 text-primary"></i> Change password
            </a>
        </li>
        <li class="py-2">
            <a href="{{ route('customer.logout') }}" class="text-decoration-none text-dark">
                <i class="bi bi-box-arrow-left me-3 text-danger"></i> Sign out
            </a>
        </li>
    </ul>
</div>
