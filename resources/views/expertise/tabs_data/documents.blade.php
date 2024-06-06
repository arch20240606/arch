<table class="is-table">

  <tr>
    <td>Статус документа</td>
    <td></td>
    <td style="padding: 12px 20px 12px 20px;">
      <select id="doc_status" name="doc_status">
        <option value="project" selected>Проект</option>
        <option value="accepted">Утвержденная версия</option>
      </select>
    </td>
  </tr>

  <tr>
    <td>Язык документа</td>
    <td></td>
    <td style="padding: 12px 20px 12px 20px;">
      <select id="doc_lang" name="doc_lang">
        <option value="ru" selected>Русский</option>
        <option value="kz">Казахский</option>
        <option value="en">Английский</option>
        <option value="comb">Комбинированный</option>
      </select>
    </td>
  </tr>

  <tr>
    <td style="width: 30%;">Тип документа</td>
    <td></td>
    <td style="width: 70%; padding: 12px 20px 12px 20px;"><input id="doc_type" name="doc_type" type="text" minlength="3" maxlength="200">
    </td>
  </tr>

  <tr>
    <td style="width: 30%;">Версия документа</td>
    <td></td>
    <td style="width: 70%; padding: 12px 20px 12px 20px;"><input id="doc_version" name="doc_version" type="text" maxlength="30">
    </td>
  </tr>


  <tr>
    <td>Год документа</td>
    <td></td>
    <td style="padding: 12px 20px 12px 20px;">
      <select id="doc_year" name="doc_year">
        <option value="2008" label="2008">2008</option>
        <option value="2009" label="2009">2009</option>
        <option value="2010" label="2010">2010</option>
        <option value="2011" label="2011">2011</option>
        <option value="2012" label="2012">2012</option>
        <option value="2013" label="2013">2013</option>
        <option value="2014" label="2014">2014</option>
        <option value="2015" label="2015">2015</option>
        <option value="2016" label="2016">2016</option>
        <option value="2017" label="2017">2017</option>
        <option value="2018" label="2018">2018</option>
        <option value="2019" label="2019">2019</option>
        <option value="2020" label="2020">2020</option>
        <option value="2021" label="2021">2021</option>
        <option value="2022" label="2022">2022</option>
        <option value="2023" label="2023" selected="selected">2023</option>
        <option value="2024" label="2024">2024</option>
        <option value="2025" label="2025">2025</option>
        <option value="2026" label="2026">2026</option>
        <option value="2027" label="2027">2027</option>
        <option value="2028" label="2028">2028</option>
        <option value="2029" label="2029">2029</option>
        <option value="2030" label="2030">2030</option>
        <option value="2031" label="2031">2031</option>
        <option value="2032" label="2032">2032</option>
        <option value="2033" label="2033">2033</option>
        <option value="2034" label="2034">2034</option>
        <option value="2035" label="2035">2035</option>
        <option value="2036" label="2036">2036</option>
        <option value="2037" label="2037">2037</option>
        <option value="2038" label="2038">2038</option>
      </select>
    </td>
  </tr>

  <tr>
    <td style="width: 30%;">Название документа</td>
    <td></td>
    <td style="width: 70%; padding: 12px 20px 12px 20px;"><input id="doc_name" name="doc_name" type="text" maxlength="399">
    </td>
  </tr>

  <tr>
    <td style="width: 30%;">Файл документа</td>
    <td></td>
    <td style="width: 70%; padding: 12px 20px 12px 20px;">
    <input name="doc_file" id="doc_file" type="file" style="cursor: pointer;">
    </td>
  </tr>

</table>