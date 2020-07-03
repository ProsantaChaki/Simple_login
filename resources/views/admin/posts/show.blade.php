@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.user.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
            <tr>
                <th>
                    {{ trans('global.user.fields.image') }}
                </th>
                <td>
                    <img src="{{ url('/') }}/images/profileImage/{{ $user->photos->path }}" height="80px">

                </td>
            </tr>
                <tr>
                    <th>
                        {{ trans('global.user.fields.name') }}
                    </th>
                    <td>
                        {{ $user->name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.user.fields.email') }}
                    </th>
                    <td>
                        {{ $user->email }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.user.fields.mobile') }}
                    </th>
                    <td>
                        {{ $user->mobile }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.user.fields.address') }}
                    </th>
                    <td>
                        {{ $user->userinfo->address }} , {{$user->area->branch}},{{$user->area->district}}

                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.user.fields.birthday') }}
                    </th>
                    <td>
                        {{ $user->userinfo->birthday }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.user.fields.blood_group') }}
                    </th>
                    <td>
                        {{ $user->userinfo->blood_group }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.user.fields.weight') }}
                    </th>
                    <td>
                        {{ $user->userinfo->weight }}Kg
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.user.fields.gender') }}
                    </th>
                    <td>
                        {{ $user->userinfo->gender }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.user.fields.occupation') }}
                    </th>
                    <td>
                        {{ $user->userinfo->occupation }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.user.fields.description') }}
                    </th>
                    <td>
                        {{ $user->userinfo->description }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.user.fields.organization') }}
                    </th>
                    <td>
                        {{ $user->userinfo->organization }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.user.fields.marital_status') }}
                    </th>
                    <td>
                        {{ $user->userinfo->marital_status }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.user.fields.status') }}
                    </th>
                    <td>
                        @if($user->userinfo->active_status)
                            <a class="btn btn-xs btn-primary" href="{{--route('admin.user.show', $user->id) --}}">
                                Active
                            </a>
                        @else
                            <a class="btn btn-xs btn-danger" href="{{route('admin.user.show', $user->id) }}">
                                Inactive
                            </a>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
