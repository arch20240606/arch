@if ( $expertise->draft == 1 && $expertise->discart_go == 1 )
<div class="info-box-error">Согласующий вернул документ <b>{{ date('d.m.Y в H:i:s', strtotime( $expertise->discart_go_date )) }}</b>. Причина отклонения может быть указана в комментарии</div>
@endif


<h2 class="is-content-title">При необходимости укажите комментарий</h2>
<textarea class="form__field" style="min-height: 300px;" id="comment" name="comment">{{ $expertise->comment_discart }} {{ $expertise->comment_accept }}</textarea>


