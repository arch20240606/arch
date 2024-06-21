<h2 class="is-content-title" style="padding-left: 15px; font-size: 15px; color: #0075ff;">Информационные системы</h2>

{{-- @if(isset($version) && (intval($expertise->version_expertise) > intval($version->version_number))) --}}
{{-- <div class="is-menu-content" data-id="1" style="display: block;">
  <table class="is-table">

    <tr>
      <td style="width: 35%;">Выбранные системы для изменения</td>
      <td></td>
      <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px; width: 65%">
        @if ($version->selected_is_for_change > 0 )
          {{ $version->getISS($version->selected_is_for_change)->$names }}
        @endif
      </td>
    </tr>

    <tr>
      <td style="width: 35%;">Выбранные системы для вывода из эксплуатации</td>
      <td></td>
      <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px; width: 65%">
        @if ($version->selected_is_for_exit > 0 )
          {{ $version->getISS($version->selected_is_for_exit)->$names }}
        @endif
      </td>
    </tr>


  </table>
</div>


<h2 class="is-content-title" style="padding-left: 15px; font-size: 15px; color: #0075ff;">Интеграции</h2>

<div class="is-menu-content" data-id="1" style="display: block;">
  <table class="is-table">
    <tr>
      <td style="width: 35%;">Планируемые интеграции для создания</td>
      <td></td>
      <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px; width: 65%">{{ $version->paln_integrations }}</td>
    </tr>
  </table>
</div>   --}}
{{-- @else --}}
<div class="is-menu-content" data-id="1" style="display: block;">
  <table class="is-table">

    <tr>
      <td style="width: 35%;">Выбранные системы для изменения</td>
      <td></td>
      <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px; width: 65%">
        @if ($expertise->selected_is_for_change > 0 )
          {{ $expertise->getISS($expertise->selected_is_for_change)->$names }}
        @endif
      </td>
    </tr>

    <tr>
      <td style="width: 35%;">Выбранные системы для вывода из эксплуатации</td>
      <td></td>
      <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px; width: 65%">
        @if ($expertise->selected_is_for_exit > 0 )
          {{ $expertise->getISS($expertise->selected_is_for_exit)->$names }}
        @endif
      </td>
    </tr>


  </table>
</div>


<h2 class="is-content-title" style="padding-left: 15px; font-size: 15px; color: #0075ff;">Интеграции</h2>

<div class="is-menu-content" data-id="1" style="display: block;">
  <table class="is-table">
    <tr>
      <td style="width: 35%;">Планируемые интеграции для создания</td>
      <td></td>
      <td style="padding: 12px 20px 12px 20px; color: #000000; font-size: 16px; width: 65%">{{ $expertise->paln_integrations }}</td>
    </tr>
  </table>
</div>
{{-- @endif  --}}