@extends('layouts.application')

@section('title'){{ getTitle() }}@endsection
@section('description'){{ getDescription() }}@endsection

@section('content')
    @if(count($articles))
        @foreach($articles as $article)
            <article class="post">
                <header class="post-header">
                    <div class="post-category">
                        <a style="background-color: {{ isset($category) ? $category->color : $article->category->color }}" href="{{ isset($category) ? $category->link : $article->category->link }}">{{ isset($category) ? $category->title : $article->category->title }}</a>
                    </div>
                    <div class="post-title">
                        <h2>
                            <a href="{{ route('article', ['article_slug' => $article->slug])  }}">{{ $article->title }}</a>
                        </h2>
                    </div>
                </header>
                <div class="post-excerpt">
                    {{ limit_to_numwords(strip_tags($article->content), 50)  }}
                </div>
                <footer class="post-footer">
                    <div class="post-meta-date pull-left">
                        <i class="fa fa-clock-o"></i>
                        {{ $article->published_at }}
                    </div>
                    <div class="pull-right">
                        <a class="btn post-btn btn-sm" href="{{ $article->link }}">{{ trans('application.read_more') }}</a>
                    </div>
                </footer>
            </article>
        @endforeach
        {!! $articles->render() !!}
    @endif
@endsection
