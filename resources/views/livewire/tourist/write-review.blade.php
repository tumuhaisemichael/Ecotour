<div>
    <div class="container mt-5">
        <div style="height: 25vh;">
            <!-- spacer -->
        </div>
        <h2 class="mb-4">Write a Review for {{ $experience->title }}</h2>

        @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <form wire:submit.prevent="submitReview">
            <div class="form-group">
                <label for="rating">Rating (1-5)</label>
                <input type="number" wire:model="rating" class="form-control" id="rating" min="1" max="5" required>
                @error('rating') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="comment">Comment</label>
                <textarea wire:model="comment" class="form-control" id="comment" rows="5" required></textarea>
                @error('comment') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit Review</button>
        </form>
    </div>

</div>