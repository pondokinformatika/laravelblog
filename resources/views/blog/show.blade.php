@extends('layouts.main')

@section('post', 'active')

@section('meta')
<meta property="og:title" content="{{ $post->title }}">
<meta property="og:description" content="{{ Str::words($post->body, 10, '...') }}">
<meta property="og:image" content="{{ ($post->image_url) ? $post->image_url : 'https://picsum.photos/1204/700' }}">
<meta property="og:url" content="{{ route('blog.post', $post->slug) }}">
<meta name="twitter:card" content="summary_large_image">
@endsection

@section('content')
 <!-- Main -->
<div id="post" class="container">

  <!-- Content -->
  <div id="content" class="col-sm-8">

    <div class="thumbnail">
      <!-- Image -->
      <img src="{{ ($post->image_url) ? $post->image_url : 'https://picsum.photos/1204/700' }}" alt="{{ ($post->image_url) ? $post->image : $post->title }}" class="img-responsive" style="width: 100%;">
      <!-- Caption -->
      <div class="caption head">
        <a href="{{ route('category', $post->category->slug) }}" class="category">{{ $post->category->title }}</a>
        <h2 class="title">{{ $post->title }}</h2>
        <p class="info text-muted">
          <a>{{ $post->date }}</a> <span class="bull">&bullet;</span>
          <a href="{{ route('author', $post->author->slug) }}">{{ $post->author->name }}</a> <span class="bull">&bullet;</span>
          {!! $post->tags_html !!} <span class="bull">&bullet;</span>
          <a href="#comments">{{ $post->commentsNumber('Comment') }}</a>
        </p>
      </div>
      <div class="caption body clearfix">
        <div class="content">{!! $post->body_html !!}</div>
        <div class="tags pull-left">
          <h4>Tags :</h4>
              {!! $post->tags_html !!}
        </div>
        <div class="extra pull-right">
          <p><i class="fa fa-eye"></i> {{ $post->view_count }} {{ str_plural('View', $post->view_count) }}</p>
          <!-- <a href="" title="Share on facebook"><i class="fa fa-facebook"></i></a>
          <a href="" title="Share on twitter"><i class="fa fa-twitter"></i></a>
          <a href="" title="Share on google"><i class="fa fa-google-plus"></i></a> -->
          {!!
              Share::currentPage()
                ->facebook()
                ->twitter()
                ->googlePlus()
          !!}
        </div>
      </div>
    </div><!-- Thumbnail Closer -->

    <div id="author" class="thumbnail">
      <div class="caption">
        <div class="media">
          <div class="media-left media-top">
            <div class="media-image">
              <img class="media-object" src="{{ $post->author->gravatar() }}" alt="">
            </div>
          </div>
          <div class="media-body media-caption">
            <a href=""><h4 class="media-heading">{{ $post->author->name }}</h4></a>
            <p class="info text-muted">{{ $post->commentsNumber('Comment') }}</p>
            <p class="bio">
              {{ $post->author->bio }}
            </p>
          </div>
        </div>
      </div>
    </div><!-- Thumbnail Closer -->

    @include('blog.comment')

  </div><!-- Content Closer -->

  @include('layouts.sidebar')

</div><!-- Main Closer -->

@endsection

@section('script')
<script>
    $(document).ready(function(){
        $('.fa-facebook-official').addClass('fa-facebook').removeClass('fa-facebook-official')
    });
</script>
@endsection
