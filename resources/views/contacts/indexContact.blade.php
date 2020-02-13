@extends('layout')

@section('title', 'Contacts')


@section('content')

<div class="container">

    <div class="row">
        <div class="col-12 col-sm-6 col-lg-10 mx-auto">

            <div class="bg-white p-5 shadow rounded">

                <h1 class="text-primary display-4 mb-0">Contacts Management</h1>
                <hr>

                <ul class="list-group">
                    @forelse($contacts as $contact)
                        @if ($contact->replied<>'yes')                          
                            @if ($contact->created_at->diffInHours() > 24)
                                <li class="bg-danger list-group-item border-0 mb-3 shadow-sm">
                                    <h2 class="text-light d-flex justify-content-between align-items-center">{{ $contact->name }}@if($contact->isUser=='yes'){{' ★'}}@endif</h2>
                                    <h4 class="text-light d-flex justify-content-between align-items-center">{{ $contact->email }}</h4>
                                    <p class="text-light d-flex justify-content-between align-items-center">{{ 'Subject: ' . $contact->subject }}</p>
                                    <div class="text-light d-flex justify-content-between align-items-center">
                                        <p>{{ 'Requested ' . $contact->created_at->diffForHumans() }}</p>
                                        <a class="btn btn-primary" href="{{ route('contacts.showContactRequest', $contact) }}">Reply</a>
                                    </div>
                                </li>          
                            @else
                                <li class="list-group-item border-0 mb-3 shadow-sm">
                                    <h2 class="text-secondary d-flex justify-content-between align-items-center">{{ $contact->name }}@if($contact->isUser=='yes'){{' ★'}}@endif</h2>
                                    <h4>{{ $contact->email }}</h4>
                                    <p>{{ 'Subject: ' . $contact->subject }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p>{{ 'Requested ' . $contact->created_at->diffForHumans() }}</p>
                                        <a class="btn btn-primary" href="{{ route('contacts.showContactRequest', $contact) }}">Reply</a>
                                    </div>
                                </li>          
                            @endif
                        @else
                            <li class="list-group-item border-0 mb-3 shadow-sm">
                                <h2 class="text-secondary d-flex justify-content-between align-items-center">{{ $contact->name }}@if($contact->isUser=='yes'){{' ★'}}@endif</h2>
                                <h4>{{ $contact->email }}</h4>
                                <p>{{ 'Subject: ' . $contact->subject }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>{{ 'Requested on ' . $contact->created_at->subHours(5)->format('d/m/Y') . ' at ' . $contact->created_at->subHours(5)->format('h:i a') }}</span>    
                                    <span>{{ 'Replied on ' . $contact->updated_at->subHours(5)->format('d/m/Y') . ' at ' . $contact->updated_at->subHours(5)->format('h:i a') }}</span>    
                                    <a class="btn btn-primary" href="{{ route('contacts.showContactRequest', $contact) }}">See Details</a>
                                </div>
                            </li>  
                        @endif
                    @empty
                        <li class="list-group-item border-0 mb-3 shadow-sm">There is no recent contacts to show</li>
                    @endforelse





                    {{ $contacts->links() }}
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection