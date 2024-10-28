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
                <!-- <label for="rating">Ratings (1-5)</label>
                <input type="number" wire:model="rating" class="form-control" id="rating" min="1" max="5" required> -->
                <label>Rating</label>
                <div class="star-rating">
                    <input type="radio" id="star5" wire:model="rating" value="5" /><label for="star5" title="5 stars">&#9733;</label>
                    <input type="radio" id="star4" wire:model="rating" value="4" /><label for="star4" title="4 stars">&#9733;</label>
                    <input type="radio" id="star3" wire:model="rating" value="3" /><label for="star3" title="3 stars">&#9733;</label>
                    <input type="radio" id="star2" wire:model="rating" value="2" /><label for="star2" title="2 stars">&#9733;</label>
                    <input type="radio" id="star1" wire:model="rating" value="1" /><label for="star1" title="1 star">&#9733;</label>
                </div>

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

<style>
.star-rating {
    direction: rtl; /* Aligns stars right-to-left, common for ratings */
    display: inline-flex;
    font-size: 2rem; /* Adjusts size of the stars */
}

.star-rating input[type="radio"] {
    display: none; /* Hides the radio buttons */
}

.star-rating label {
    color: #ccc; /* Default color for unselected stars */
    cursor: pointer;
}

.star-rating input[type="radio"]:checked ~ label,
.star-rating label:hover,
.star-rating label:hover ~ label {
    color: #ffc107; /* Color for selected and hovered stars */
}
</style>

</div>
