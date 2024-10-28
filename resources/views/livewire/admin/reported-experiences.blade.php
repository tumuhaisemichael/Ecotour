<div class="container mb-4">
    <h2 class="text-center">Reported Experiences</h2>
    
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered shadow-sm">
            <thead class="bg-primary text-white">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Experience ID</th>
                    <th scope="col">Reported By</th>
                    <th scope="col">Reason</th>
                    <th scope="col">Status</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reportedExperiences as $reportedExperience)
                    <tr>
                        <td>{{ $reportedExperience->id }}</td>
                        <td>{{ $reportedExperience->experience_id }}</td>
                        <td>{{ $reportedExperience->reportedBy->name ?? 'N/A' }}</td> <!-- Assuming 'name' is a field in the users table -->
                        <td>{{ $reportedExperience->reason }}</td>
                        <td>
                            <span class="badge 
                                {{ $reportedExperience->status === 'resolved' ? 'bg-success' : 'bg-warning' }}">
                                {{ ucfirst($reportedExperience->status) }}
                            </span>
                        </td>
                        <td>{{ $reportedExperience->created_at->format('Y-m-d H:i') }}</td>
                        <td>
                            <a href="{{ route('admin.resolve.report', $reportedExperience->id) }}" class="btn btn-success btn-sm">Resolve</a>
                            <a href="{{ route('admin.delete.report', $reportedExperience->id) }}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No reported experiences found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
