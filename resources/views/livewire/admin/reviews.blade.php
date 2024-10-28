<div>
    <div class="container mt-4">
        <h2 class="text-center mb-4">Tourist Reviews</h2>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered shadow-sm">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>Tourist</th>
                        <th>Experience</th>
                        <th>Rating</th>
                        <th>Comment</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reviews as $review)
                    <tr>
                        <td>{{ $review->tourist->name }}</td>
                        <td>{{ $review->experience->title }}</td>
                        <td>
                            <span class="badge badge-success">{{ $review->rating }} / 5</span>
                        </td>
                        <td>{{ Str::limit($review->comment, 50) }}</td>
                        <td>{{ $review->created_at->format('d M, Y') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">No reviews available</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination Links -->
        <div class="d-flex justify-content-center">
            {{ $reviews->links() }}
        </div>
    </div>

</div>