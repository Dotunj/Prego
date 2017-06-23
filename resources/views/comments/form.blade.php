<h4 class="page-header">
	Comments
</h4>
<div class="row" style="margin-left:5px;padding:5px;">
@if($comments)
@foreach($comments as $comment)
<div>
<div><i class="fa fa-check-square-o"></i><span>{{$comment->comments}}</span></div>
<a href="/projects/{{$project->id}}/comments/{{$comment->id}}/edit">Edit</a>
<button class="btn btn-danger delete pull right" data-action="/projects/{{$project->id}}/comments/{{$comment->id}}" data-token="{{csrf_token()}}"><i class="fa fa-trash-o"></i>Delete</button>
</div>
<hr/>
@endforeach
@endif
	<form class="form-vertical" role="form" method="post" action="#">
		<div class="form-group{{$errors->has('name') ? 'has-error' : ''}}">
			<textarea name="comment" class="form-control" style="width:80%;" id="comment" rows="5" cols="5"></textarea>
			@if($errors->has('comment'))
			<span class="help-block">{{$errors->first('comment')}}</span>
			@endif
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-info"> Add Comment </button>
		</div>include('')
		<input type="hidden" name="_token" value="{{csrf_token()}}">
	</form>
</div>