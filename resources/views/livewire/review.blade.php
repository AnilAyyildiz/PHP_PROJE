<div>
    @if(session()->has("message"))
        <div class="alert alert-success">
            {{ session("message") }}
        </div>
@endif
<!-- review form -->
    <form wire:submit.prevent="store" class="aa-review-form" style="margin-bottom: 50px;">

        <div class="form-group">
            <label for="name">Subject</label>
            <input wire:model="subject" type="text" class="form-control" id="name" placeholder="Subject">
            @error('subject')<span class="text-danger">{{$message}}</span>@enderror
        </div>
        <div class="form-group">
            <label for="message">Your Review</label>
            <textarea wire:model="review" class="form-control" rows="3" id="message"></textarea>
            @error('review')<span class="text-danger">{{$message}}</span>@enderror
        </div>

        <button type="submit" class="btn btn-default aa-review-submit">Submit</button>
    </form>
</div>

