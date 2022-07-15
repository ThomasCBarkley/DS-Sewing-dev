<div class="card">
    <div class="card-body">
        <h4 v-pre class="card-title">{{$key+1}}. <strong>{{ link_to_route('posts.show', $post->title, $post->slug) }}</strong></h4>

        <p class="card-text">
            {{$post->short_description}}
        </p>
    </div>
</div>
