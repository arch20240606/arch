<table class="is-table">

  @if(isset($document->id)) @if ($document->doc_status == "project") selected @endif @endif

  <tr>
    <td>Статус документа</td>
    <td></td>
    <td style="padding: 12px 20px 12px 20px;">
      <select id="doc_status" name="doc_status">
        <option value="project" @if(isset($document->id)) @if ($document->doc_status == "project") selected @endif @endif>Проект</option>
        <option value="accepted" @if(isset($document->id)) @if ($document->doc_status == "accepted") selected @endif @endif>Утвержденная версия</option>
      </select>
    </td>
  </tr>

  <tr>
    <td>Язык документа</td>
    <td></td>
    <td style="padding: 12px 20px 12px 20px;">
      <select id="doc_lang" name="doc_lang">
        <option value="ru" @if(isset($document->id)) @if ($document->doc_lang == "ru") selected @endif @endif>Русский</option>
        <option value="kz" @if(isset($document->id)) @if ($document->doc_lang == "kz") selected @endif @endif>Казахский</option>
        <option value="en" @if(isset($document->id)) @if ($document->doc_lang == "en") selected @endif @endif>Английский</option>
        <option value="comb" @if(isset($document->id)) @if ($document->doc_lang == "comb") selected @endif @endif>Комбинированный</option>
      </select>
    </td>
  </tr>

  <tr>
    <td style="width: 30%;">Тип документа</td>
    <td></td>
    <td style="width: 70%; padding: 12px 20px 12px 20px;"><input @if(isset($document->id)) value="{{$document->doc_type}}" @endif id="doc_type" name="doc_type" type="text" minlength="3" maxlength="200">
    </td>
  </tr>

  <tr>
    <td style="width: 30%;">Версия документа</td>
    <td></td>
    <td style="width: 70%; padding: 12px 20px 12px 20px;"><input @if(isset($document->id)) value="{{$document->doc_version}}" @endif id="doc_version" name="doc_version" type="text" maxlength="30">
    </td>
  </tr>


  <tr>
    <td>Год документа</td>
    <td></td>
    <td style="padding: 12px 20px 12px 20px;">
      <select id="doc_year" name="doc_year">
        <option value="2008" label="2008" @if(isset($document->id)) @if($document->doc_year == "2023") selected @endif @endif>2008</option>
        <option value="2009" label="2009" @if(isset($document->id)) @if($document->doc_year == "2023") selected @endif @endif>2009</option>
        <option value="2010" label="2010" @if(isset($document->id)) @if($document->doc_year == "2010") selected @endif @endif>2010</option>
        <option value="2011" label="2011" @if(isset($document->id)) @if($document->doc_year == "2011") selected @endif @endif>2011</option>
        <option value="2012" label="2012" @if(isset($document->id)) @if($document->doc_year == "2012") selected @endif @endif>2012</option>
        <option value="2013" label="2013" @if(isset($document->id)) @if($document->doc_year == "2013") selected @endif @endif>2013</option>
        <option value="2014" label="2014" @if(isset($document->id)) @if($document->doc_year == "2014") selected @endif @endif>2014</option>
        <option value="2015" label="2015" @if(isset($document->id)) @if($document->doc_year == "2015") selected @endif @endif>2015</option>
        <option value="2016" label="2016" @if(isset($document->id)) @if($document->doc_year == "2016") selected @endif @endif>2016</option>
        <option value="2017" label="2017" @if(isset($document->id)) @if($document->doc_year == "2017") selected @endif @endif>2017</option>
        <option value="2018" label="2018" @if(isset($document->id)) @if($document->doc_year == "2018") selected @endif @endif>2018</option>
        <option value="2019" label="2019" @if(isset($document->id)) @if($document->doc_year == "2019") selected @endif @endif>2019</option>
        <option value="2020" label="2020" @if(isset($document->id)) @if($document->doc_year == "2020") selected @endif @endif>2020</option>
        <option value="2021" label="2021" @if(isset($document->id)) @if($document->doc_year == "2021") selected @endif @endif>2021</option>
        <option value="2022" label="2022" @if(isset($document->id)) @if($document->doc_year == "2022") selected @endif @endif>2022</option>
        <option value="2023" label="2023" @if(isset($document->id)) @if($document->doc_year == "2023") selected @endif @endif>2023</option>
        <option value="2024" label="2024" @if(isset($document->id)) @if($document->doc_year == "2024") selected @endif @endif>2024</option>
        <option value="2025" label="2025" @if(isset($document->id)) @if($document->doc_year == "2025") selected @endif @endif>2025</option>
        <option value="2026" label="2026" @if(isset($document->id)) @if($document->doc_year == "2026") selected @endif @endif>2026</option>
        <option value="2027" label="2027" @if(isset($document->id)) @if($document->doc_year == "2027") selected @endif @endif>2027</option>
        <option value="2028" label="2028" @if(isset($document->id)) @if($document->doc_year == "2028") selected @endif @endif>2028</option>
        <option value="2029" label="2029" @if(isset($document->id)) @if($document->doc_year == "2029") selected @endif @endif>2029</option>
        <option value="2030" label="2030" @if(isset($document->id)) @if($document->doc_year == "2030") selected @endif @endif>2030</option>
        <option value="2031" label="2031" @if(isset($document->id)) @if($document->doc_year == "2031") selected @endif @endif>2031</option>
        <option value="2032" label="2032" @if(isset($document->id)) @if($document->doc_year == "2032") selected @endif @endif>2032</option>
        <option value="2033" label="2033" @if(isset($document->id)) @if($document->doc_year == "2033") selected @endif @endif>2033</option>
        <option value="2034" label="2034" @if(isset($document->id)) @if($document->doc_year == "2034") selected @endif @endif>2034</option>
        <option value="2035" label="2035" @if(isset($document->id)) @if($document->doc_year == "2035") selected @endif @endif>2035</option>
        <option value="2036" label="2036" @if(isset($document->id)) @if($document->doc_year == "2036") selected @endif @endif>2036</option>
        <option value="2037" label="2037" @if(isset($document->id)) @if($document->doc_year == "2037") selected @endif @endif>2037</option>
        <option value="2038" label="2038" @if(isset($document->id)) @if($document->doc_year == "2038") selected @endif @endif>2038</option>
      </select>
    </td>
  </tr>

  <tr>
    <td style="width: 30%;">Название документа</td>
    <td></td>
    <td style="width: 70%; padding: 12px 20px 12px 20px;"><input @if(isset($document->id)) value="{{$document->doc_name}}" @endif id="doc_name" name="doc_name" type="text" maxlength="399">
    </td>
  </tr>

  <tr>
    <td style="width: 30%;">Файл документа</td>
    <td></td>
    <td style="width: 70%; padding: 12px 20px 12px 20px;">
    <input name="doc_file" id="doc_file" type="file" style="cursor: pointer;">
    @if(isset($document->id))
    <br><br>
    <p style="color: #000000;">Предыдуший документ: <a href="/storage/{{ $document->file_name_upload }}" target="_blank">{{ $document->file_name }}</a></p>
    <br><br>
    <input type="hidden" value="{{ $document->id }}" name="document_id" id="document_id">
    @endif
    </td>
  </tr>

</table>