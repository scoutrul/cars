<div data-feedback="{{ $mention->id }}" id="comments" class="comments">
	
<svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
    <path d="M0 0h24v24H0z" fill="none"/>
    <path d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-4 6V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10c.55 0 1-.45 1-1z"/>
</svg>
	
	<h3 class="comments_header">Комментарии</h3>

	<div class="comments_block">
		@foreach($mention->comments as $comment)

			<div class="comment">
				
				<div>
					<div class="comment_ava" 
					style="background-image:url( 
					{{ URL::to('/') }}/{{ $comment->user->ava ? $comment->user->ava : 'img/noavatar.png' }})"
					data-ava="{{ URL::to('/') }}/{{ $comment->user->ava ? $comment->user->ava : 'img/noavatar.png' }}"></div>
				</div>

				<div class="comment_right">
					<div class="comment_header">
						<div class="comment_name">
							{{ $comment->user->name ? $comment->user->name : $comment->user->email }}
						</div>
						<div class="comment_date">
							{{ 
								$comment->created_at->day . '.' . 
								$comment->created_at->month . '.'.
								$comment->created_at->year
							}}
						</div>
					</div>
					<div class="comment_content">
						{{ $comment->text }}
					</div>
				</div>

			</div>

		@endforeach
	</div>

	@if(Auth::check())
		<div id="comments-send" class="comments_send"
			data-name="{{ Auth::user()->name ? Auth::user()->name : Auth::user()->email }}"
			data-ava="{{ Auth::user()->ava ? Auth::user()->ava : 'img/noavatar.png' }}">
			<textarea id="comments-textarea" placeholder="Комментарий..." class="comments_textarea"></textarea>
			<div id="comments-button" class="comments_send-button">Отправить</div>
		</div>
	@endif

	@include('templates.comment-template')

</div>