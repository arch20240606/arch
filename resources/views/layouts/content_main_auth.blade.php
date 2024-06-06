<main class="content">

  <section class="intro">

    <div class="intro__bg">
      <picture>
        <source srcset="/assets/images/intro-bg.avif" type="image/avif">
        <source srcset="/assets/images/intro-bg.webp" type="image/webp">
        <img src="/assets/images/intro-bg.jpg" alt="Background">
      </picture>
    </div>

    <div class="container">

      <div class="intro__inner">

        <h1 class="intro__title">{!! trans('app.text_title') !!}</h1>

        <div class="intro__buttons">
          <a class="intro__buttons-item btn btn_icon btn_white" href="{{ route('accounting.information') }}">
            <svg>
              <use xlink:href="/assets/images/sprite.svg#book"></use>
            </svg>
            {{ trans('app.uchet') }}
          </a>
          @if (auth()->check() && (auth()->user()->hasRole('ROLE_UO_EXPERTISE_DANA') || auth()->user()->hasRole('ROLE_UO_EXPERTISE_REVIEWER') || auth()->user()->hasRole('ROLE_SI_EXPERTISE_CONFIRMER') || auth()->user()->hasRole('ROLE_KIB_EXPERTISE_CONFIRMER') || auth()->user()->hasRole('ROLE_SI_EXPERTISE_SIGNER')))
          <a class="intro__buttons-item btn btn_icon btn_white" href="{{ route('expertise.in_work') }}">
            <svg>
              <use xlink:href="/assets/images/sprite.svg#check-fill"></use>
            </svg>
            {{ trans('app.expert') }}
          </a>
          @elseif (auth()->check() && auth()->user()->hasRole('ROLE_SI_EXPERTISE_REVIEWER'))
          <a class="intro__buttons-item btn btn_icon btn_white" href="{{ route('expertise.executor') }}">
            <svg>
              <use xlink:href="/assets/images/sprite.svg#check-fill"></use>
            </svg>
            {{ trans('app.expert') }}
          </a>
          @else
          <a class="intro__buttons-item btn btn_icon btn_white" href="{{ route('expertise.draft') }}">
            <svg>
              <use xlink:href="/assets/images/sprite.svg#check-fill"></use>
            </svg>
            {{ trans('app.expert') }}
          </a>
          @endif
          <a class="intro__buttons-item btn btn_icon btn_white" href="{{ route('budget.index') }}">
            <svg>
              <use xlink:href="/assets/images/sprite.svg#money"></use>
            </svg>
            {{ trans('app.budget') }}
          </a>
          <a class="intro__buttons-item btn btn_icon btn_white" href="https://govtec.kz/" target="_blank">
            <svg>
              <use xlink:href="/assets/images/sprite.svg#icon-globus"></use>
            </svg>
            {{ trans('app.cpcp') }}
          </a>
          <a class="intro__buttons-item btn btn_icon btn_white" href="{{ route('calculator') }}">
            <svg>
              <use xlink:href="/assets/images/sprite.svg#icon-calc"></use>
            </svg>
            {{ trans('app.calculator') }}
          </a>
          <a class="intro__buttons-item btn btn_icon btn_white" href="{{ route('datacatalog.index') }}">
            <svg>
              <use xlink:href="/assets/images/sprite.svg#icon-data"></use>
            </svg>
            {{ trans('app.catalog') }}
          </a>

          

          <a class="intro__buttons-item btn btn_icon btn_white" href="{{ route('grades.index') }}">
            <svg>
              <use xlink:href="/assets/images/sprite.svg#icon-star"></use>
            </svg>
            {{ trans('app.grade') }}
          </a>

          <div></div>

          <a class="intro__buttons-item btn btn_icon btn_white" href="{{ route('businessprocess.index') }}">
            <svg>
              <use xlink:href="/assets/images/sprite.svg#newspaper"></use>
            </svg>
            Цифровая трансформация
          </a>

     

        </div>

      </div>

    </div>
  </section>

  @include ('layouts.information_systems')

  @include ('layouts.technologies')

</main>







