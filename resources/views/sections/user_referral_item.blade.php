<tr>
    <td class="wd-5p">
        <div class="main-img-user avatar-md">
            <img alt="avatar" class="rounded-circle mr-3" src="{{url($user->profile())}}">
        </div>
    </td>
    <td>
        <div class="d-flex align-middle ml-3">
            <div class="d-inline-block">
                <h6 class="mb-1">{{$user->name}}</h6>
                <p class="mb-0 tx-13 text-muted">Referred by: {{$user->referTo->name ?? ' - '}}</p>
            </div>
        </div>
    </td>
    <td class="text-right">
    </td>
</tr>