<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Profiles</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">
    <h1 class="mb-4">Data Pengguna</h1>
    @if ($editingContact)
        <form method="post" action="{{ route('contact-profiles.update', $editingContact->id) }}">
            @method('PUT')
        @else
            <form method="post" action="{{ route('contact-profiles.store') }}">
    @endif
    @csrf
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" name="name"
            value="{{ $editingContact ? $editingContact->name : '' }}" required>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" name="email"
            value="{{ $editingContact ? $editingContact->email : '' }}" required>
    </div>
    <div class="form-group">
        <label for="phone_number">Phone Number:</label>
        <input type="text" class="form-control" name="phone_number"
            value="{{ $editingContact ? $editingContact->phone_number : '' }}" required>
    </div>
    <div class="form-group">
        <label for="address">Address:</label>
        <input type="text" class="form-control" name="address"
            value="{{ $editingContact ? $editingContact->address : '' }}" required>
    </div>
    <button type="submit" class="btn btn-primary">{{ $editingContact ? 'Update Contact' : 'Add Contact' }}</button>
    <a href="{{ route('contact-profiles.index') }}" class="btn btn-secondary">Cancel</a>
    </form>

    <ul class="list-group mt-4">
        @foreach ($contactProfiles as $contact)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $contact->name }}
                <div>
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                        data-target="#contactDetails{{ $contact->id }}">Details</button>
                    <a href="{{ route('contact-profiles.edit', $contact->id) }}"
                        class="btn btn-warning btn-sm mr-2">Edit</a>
                    <form action="{{ route('contact-profiles.destroy', $contact->id) }}" method="post"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
                <div class="modal fade" id="contactDetails{{ $contact->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="contactDetailsLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="contactDetailsLabel">Contact Details - {{ $contact->name }}
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p><strong>Email:</strong> {{ $contact->email }}</p>
                                <p><strong>Phone Number:</strong> {{ $contact->phone_number }}</p>
                                <p><strong>Address:</strong> {{ $contact->address }}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

            </li>
        @endforeach
    </ul>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
