@extends('admin.layouts.app')
@section('content')

<div class="page-header d-print-none">
    <div class="row align-items-center">
        <div class="col">
            <h2 class="page-title">
                {{ $page_name }}
            </h2>
            
            <ol class="breadcrumb breadcrumb-alternate" aria-label="breadcrumbs">
                <li class="breadcrumb-item">
                    <a href="{{ url('admin') }}">
                        {{ $site_name }}
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="#">
                        {{ $page_name }}
                    </a>
                </li>
            </ol>
            
        </div>
        
        <div class="col-auto ms-auto d-print-none">
            <a href="{{ route('create_badge') }}" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg> {{ __('New Badge') }}
            </a>   
        </div>
        
    </div>
</div>

<div class="row row-cards row-deck">
    
    <div class="table-responsive">
        <table class="table table-vcenter table-nowrap">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Score</th>
                    <th>Icon</th>
                    <th>Created</th>
                    <th class="w-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($badgeList as $badge)
                <tr>
                    <td>{{ $badge->id }}</td>
                    <td class="text-muted strong">{{ $badge->name }}</td>
                    <td class="text-muted">{{ $badge->score }}</td>
                    <td class="strong">
                        <img src="{{ asset('storage/app/public/images/badges/'.$badge->icon) }}" class="avatar avatar-xs rounded-circle">
                    </td>
                    <td class="text-reset">{{ $badge->created_at }}</td>
                    <td>
                        <a href="{{ route('edit_badge', $badge->id) }}" class="btn btn-sm">
                            {{ __('Edit') }}
                        </a>
                        <a href="{{ route('delete_badge', $badge->id) }}" onclick="return confirm('Do you confirm this operation?');" class="btn btn-sm btn-icon btn-link">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-red" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="4" y1="7" x2="20" y2="7" /><line x1="10" y1="11" x2="10" y2="17" /><line x1="14" y1="11" x2="14" y2="17" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                        </a>
                    </td>
                </tr>
                @empty
                <td>{{ __('There are no badges.') }}</td>
                @endforelse
            </tbody>
        </table>
    </div>
    
    {{ $badgeList->links() }}
    
</div>
@endsection('content')