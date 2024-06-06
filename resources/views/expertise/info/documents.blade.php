@if( isset($document->id) )
  <table class="is-table">

    <tr>
      <td>Статус документа</td>
      <td></td>
      <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px;">
        @if ($document->doc_status == "project")
          Проект
        @elseif ($document->doc_status == "accepted")
          Утвержденная версия
        @else
          Не указано
        @endif
      </td>
    </tr>

    <tr>
      <td>Язык документа</td>
      <td></td>
      <td style="padding: 12px 20px 12px 20px;  color: #000000; font-size: 16px;">
        @if ($document->doc_lang == "ru")
          Русский
        @elseif ($document->doc_lang == "kz")
          Казахский
        @elseif ($document->doc_lang == "en")
          Английский
        @elseif ($document->doc_lang == "comb")
          Комбинированный
        @else
          Не указано
        @endif
      </td>
    </tr>

    <tr>
      <td style="width: 30%;">Тип документа</td>
      <td></td>
      <td style="width: 70%; padding: 12px 20px 12px 20px;  color: #000000; font-size: 16px;">{{ $document->doc_type }}</td>
    </tr>

    <tr>
      <td style="width: 30%;">Версия документа</td>
      <td></td>
      <td style="width: 70%; padding: 12px 20px 12px 20px;  color: #000000; font-size: 16px;">{{ $document->doc_version }}</td>
    </tr>


    <tr>
      <td>Год документа</td>
      <td></td>
      <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px;">{{ $document->doc_year }}</td>
    </tr>

    <tr>
      <td style="width: 30%;">Название документа</td>
      <td></td>
      <td style="width: 70%; padding: 12px 20px 12px 20px;  color: #000000; font-size: 16px;">{{ $document->doc_name }}</td>
    </tr>

    <tr>
      <td style="width: 30%;">Файл документа</td>
      <td></td>
      <td style="width: 70%; padding: 12px 20px 12px 20px;  color: #000000; font-size: 16px;">
      <p style="color: #000000;">Файл: <a href="/storage/{{ $document->file_name_upload }}" target="_blank">{{ $document->file_name }}</a></p>
      </td>
    </tr>

  </table>


@else
  <div class="notice">В разделе <b>Документы</b> отсутствуют файлы</div>
@endif


