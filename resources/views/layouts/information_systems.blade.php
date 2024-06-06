<section class="systems">
  <div class="container">
    <h2 class="systems__title section-title">
      <span>{{ trans('app.infosys') }}</span>
    </h2>
    <div class="systems__wrapper">
      <nav class="systems__menu">
        <ul class="systems__list">
          <li class="systems__item">
            <a class="systems__link" href="{{ route('infosys.iscgo') }}">
              <span class="systems__count">223</span>
              {{ trans('app.is_cgo') }}
            </a>
          </li>
          <li class="systems__item">
            <a class="systems__link" href="{{ route('infosys.ircgo') }}">
              <span class="systems__count">56</span>
              {{ trans('app.ir_cgo') }}
            </a>
          </li>
          <li class="systems__item">
            <a class="systems__link" href="{{ route('infosys.ikcgo') }}">
              <span class="systems__count">13</span>
              {{ trans('app.ik_cgo') }}
            </a>
          </li>
          <li class="systems__item">
            <a class="systems__link" href="{{ route('infosys.ismio') }}">
              <span class="systems__count">137</span>
              {{ trans('app.is_mio') }}
            </a>
          </li>
          <li class="systems__item">
            <a class="systems__link" href="{{ route('infosys.irmio') }}">
              <span class="systems__count">78</span>
              {{ trans('app.ir_mio') }}
            </a>
          </li>
          <li class="systems__item">
            <a class="systems__link" href="{{ route('infosys.ikmio') }}">
              <span class="systems__count">16</span>
              {{ trans('app.ik_mio') }}
            </a>
          </li>
          <li class="systems__item">
            <a class="systems__link" href="{{ route('infosys.isfirst') }}">
              <span class="systems__count">52</span>
              {{ trans('app.is_1_class') }}
            </a>
          </li>
          <li class="systems__item">
            <a class="systems__link" href="{{ route('infosys.issecond') }}">
              <span class="systems__count">79</span>
              {{ trans('app.is_2_class') }}
            </a>
          </li>
          <li class="systems__item">
            <a class="systems__link" href="{{ route('infosys.isthird') }}">
              <span class="systems__count">291</span>
              {{ trans('app.is_3_class') }}
            </a>
          </li>

          <li class="systems__item" style="margin-top: 25px;">
            <a class="systems__link" href="/files/IC_services.pdf" target="_blank">
              Перечень ИК-услуг
            </a>
          </li>

        </ul>
      </nav>
      <div class="systems__illustration">
        <img src="/assets/images/systems-illustration.svg" alt="Illustration">
      </div>
      
    </div>
  </div>
</section>