<div>


    <div class="container mx-auto">
        <h2 class="text-2xl font-bold mb-4">Experience Reviews</h2>

        @if ($reviews->isEmpty())
        <p>No reviews found for your experiences.</p>
        @else
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered shadow-sm">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>Experience Title</th>
                        <th>Rating</th>
                        <th>Comment</th>
                        <th>Reviewed By</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reviews as $review)
                    <tr>
                        <td>{{ $review->experience->title }}</td>
                        <td>{{ $review->rating }}</td>
                        <td>{{ $review->comment }}</td>
                        <td>{{ $review->user->name }}</td>
                        <td>{{ $review->created_at->format('Y-m-d') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>


    </div>