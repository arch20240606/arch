@extends('layouts.app')

@section('title'){{ trans('app.questions') }} - {{ trans('app.site_title') }}@endsection


@section('header')
  @include ('layouts.header')
@endsection

@section('content')
  <main class="content questions">

    <div class="questions__bg">
      <picture>
        <source srcset="/assets/images/questions-bg.avif" type="image/avif">
        <source srcset="/assets/images/questions-bg.webp" type="image/webp">
        <img src="/assets/images/questions-bg.jpg" alt="Background">
      </picture>
    </div>

    <div class="container container_medium">

      <div class="breadcrumbs breadcrumbs_white">
        <a class="breadcrumbs__home" href="/">
          <svg>
            <use xlink:href="/assets/images/sprite.svg#house"></use>
          </svg>
        </a>
        /
        <span>{{ trans('app.questions') }}</span>
      </div>

      <div class="questions__wrapper">

        <div class="questions__list">
          <div class="questions__list-header">
            <h1 class="questions__title page-title">{{ trans('app.questions') }}</h1>
            <a class="questions__list-btn btn btn_icon" href="{{ route('ask') }}">
              <svg>
                <use xlink:href="/assets/images/sprite.svg#plus"></use>
              </svg>
              {{ trans('app.question') }}
            </a>
          </div>
          <div class="questions__list-heading questions__list-row">
            <div>Модуль</div>
            <div>Вопросов</div>
            <div>Ответов</div>
          </div>
          <div class="questions__list-item questions__list-row">
            <div>
              <h3 class="questions__list-item-title">
                <a href="#">Общие вопросы</a>
              </h3>
              <p class="questions__list-item-description">
                Общие вопросы
              </p>
            </div>
            <div>120</div>
            <div>120</div>
          </div>
          <div class="questions__list-item questions__list-row">
            <div>
              <h3 class="questions__list-item-title">
                <a href="#">Учет сведений</a>
              </h3>
              <p class="questions__list-item-description">
                Учёт сведений об объектах информатизации
              </p>
            </div>
            <div>120</div>
            <div>120</div>
          </div>
          <div class="questions__list-item questions__list-row">
            <div>
              <h3 class="questions__list-item-title">
                <a href="#">Бюджетные заявки</a>
              </h3>
              <p class="questions__list-item-description">
                Формирование бюджетных заявок
              </p>
            </div>
            <div>259</div>
            <div>120</div>
          </div>
          <div class="questions__list-item questions__list-row">
            <div>
              <h3 class="questions__list-item-title">
                <a href="#">Экспертиза нормативно-технической документации</a>
              </h3>
              <p class="questions__list-item-description">
                Экспертиза инвестиционных предложений, технико-экономического обоснования и технических заданий
              </p>
            </div>
            <div>120</div>
            <div>120</div>
          </div>
        </div>

        <div class="questions__last">
          <h2 class="questions__last-title">Последние отвеченные вопросы</h2>
          <div class="questions__last-list">
            <a class="questions__last-item" href="#">
              <span class="questions__last-item-img">
                <img src="/assets/images/question-avatar.svg" alt="Асель Едильбаевна Рахметова">
              </span>
              <h3 class="questions__last-item-title">ТЗ завис в статусе "на подписи", не уходит
                дальше</h3>
              <span class="questions__last-item-name">Асель Едильбаевна Рахметова</span>
              <span class="questions__last-item-topic">Экспертиза нормативно-технической документации</span>
              <span class="questions__last-item-date">19 д. назад</span>
            </a>
            <a class="questions__last-item" href="#">
              <span class="questions__last-item-img">
                <img src="/assets/images/question-avatar.svg" alt="Асель Едильбаевна Рахметова">
              </span>
              <h3 class="questions__last-item-title">Как прикрепить ТЗ на ИС для проверки его в УО.</h3>
              <span class="questions__last-item-name">Иван Петрович Максимов</span>
              <span class="questions__last-item-topic">Экспертиза нормативно-технической документации</span>
              <span class="questions__last-item-date">19 д. назад</span>
            </a>
            <a class="questions__last-item" href="#">
              <span class="questions__last-item-img">
                <img src="/assets/images/question-avatar.svg" alt="Асель Едильбаевна Рахметова">
              </span>
              <h3 class="questions__last-item-title">Нет в списке нашей компании АО ИАЦНГ</h3>
              <span class="questions__last-item-name">Еркебұлан Өмірзақ</span>
              <span class="questions__last-item-topic">Экспертиза нормативно-технической документации</span>
              <span class="questions__last-item-date">19 д. назад</span>
            </a>
            <a class="questions__last-item" href="#">
              <span class="questions__last-item-img">
                <img src="/assets/images/question-avatar.svg" alt="Асель Едильбаевна Рахметова">
              </span>
              <h3 class="questions__last-item-title">На оф. письме как указать шапку адресат?</h3>
              <span class="questions__last-item-name">Руслан Масқауұлы Нокрабеков</span>
              <span class="questions__last-item-topic">Экспертиза нормативно-технической документации</span>
              <span class="questions__last-item-date">19 д. назад</span>
            </a>
          </div>
        </div>

      </div>

    </div>

  </main>
@endsection



@section('footer')
  @include ('layouts.footer')
@endsection





@section('other_divs')

  @include ('layouts.ask_question')
  <div id="chat" class="chat"></div>
  @include ('layouts.login_popup')
  @if ( Auth::user() )
    @include ('layouts.search_form')
  @endif

@endsection