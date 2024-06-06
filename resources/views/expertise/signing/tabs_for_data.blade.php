<nav class="is-tabs tabs">
  <a style="width: 25%; font-size: 16px;" class="tabs__link tabs__link_active" href="#" data-id="1">Паспорт</a>
  <a style="width: 25%; font-size: 16px;" class="tabs__link" href="#" data-id="2">Функциональная часть</a>
  <a style="width: 25%; font-size: 16px;" class="tabs__link" href="#" data-id="3">Техническое задание</a>
  <a style="width: 25%; font-size: 16px;" class="tabs__link" href="#" data-id="4">Документы</a>
  <a style="width: 25%; font-size: 16px;" class="tabs__link" href="#" data-id="5">Комментарии</a>
</nav>




<div class="is-tab-content" data-id="1" style="display: block;">
  @include('expertise.signing.passport')
</div>

<div class="is-tab-content" data-id="2">
  @include('expertise.signing.function')
</div>

<div class="is-tab-content" data-id="3">
  @include('expertise.signing.tz')
</div>

<div class="is-tab-content" data-id="4">
  @include('expertise.signing.documents')
</div>

<div class="is-tab-content" data-id="5">
  @include('expertise.signing.comments')
</div>
