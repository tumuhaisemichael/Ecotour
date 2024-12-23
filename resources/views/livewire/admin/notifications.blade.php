<div class="container mb-4">
    <h2 class="text-center ">Notifications</h2>
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered shadow-sm">
            <thead class="bg-primary text-white">

                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Message</th>
                    <th>Submitted At</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($messages as $message)
                <tr>
                    <td>{{ $message->first_name }}</td>
                    <td>{{ $message->last_name }}</td>
                    <td>{{ $message->email }}</td>
                    <td>{{ $message->phone }}</td>
                    <td>{{ $message->message }}</td>
                    <td>{{ $message->created_at->format('Y-m-d H:i:s') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">No contact messages found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>