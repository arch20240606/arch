@extends('layouts.app')

@section('title')Реестр бизнес-процессов@endsection

<?php
if (app()->getLocale() == "ru") {
  $names = 'name_ru';
} elseif (app()->getLocale() == "en") {
  $names = 'name_en';
} else {
  $names = 'name_kz';
}
?>

@section('header')
@include ('layouts.header')
@endsection

@section('content')
<main class="content">

  <div class="container">

    <div class="breadcrumbs">
      <a class="breadcrumbs__home" href="/">
        <svg>
          <use xlink:href="/assets/images/sprite.svg#house"></use>
        </svg>
      </a>
      / <a href="{{ route('businessprocess.index') }}">Реестр бизнес-процессов</a>

    </div>

    <h1 class="page-title">Реестр бизнес-процессов</h1>

    @include ('businessprocess.index_menu')

    @if( session()->has('successMsg') )
    <div class="success-info">{!! session()->get('successMsg') !!}</div>
    @endif







    <div class="is-tab-content" data-id="1" style="display: block;">
      <div class="is-menu-navigation">
        <div class="is-menu">
          <div class="is-menu__title">
            Дорожные карты и кейсы
            <span class="is-menu__toggle">
              <svg>
                <use xlink:href="/assets/images/sprite.svg#chevron-right-small"></use>
              </svg>
            </span>
          </div>
          <ul class="is-menu__list">

            @foreach ($b_roadmaps as $b_roadmap)

              @if ( $b_roadmap->getCase($b_roadmap->id)->count() > 0 )

                <li class="is-menu__item is-menu__item_has-submenu" data-id="road_{{ $b_roadmap->id}}">
                  <span class="is-menu__item-progress" style="color: #39C07F;">{{ $b_roadmap->getCase($b_roadmap->id)->count() }}</span>
                  <span class="is-menu__item-title">{{ $b_roadmap->$names }}</span>
                  <ul class="is-menu__item-submenu">
                    @foreach ($b_roadmap->getCase($b_roadmap->id) as $case)
                    <li data-id="case_{{ $case->id }}">{{ $case->name }}</li>
                    @endforeach
                  </ul>
                </li>

              @else 
                <li class="is-menu__item" data-id="road_{{ $b_roadmap->id}}">
                  <span class="is-menu__item-progress" style="color: #39C07F;">{{ $b_roadmap->getCase($b_roadmap->id)->count() }}</span>
                  <span class="is-menu__item-title">{{ $b_roadmap->$names }}</span>
                </li>
              @endif

            @endforeach

          </ul>
        </div>







        @foreach ($b_roadmaps as $b_roadmap)

          @if ( $b_roadmap->getCase($b_roadmap->id)->count() > 0 )

            @foreach ($b_roadmap->getCase($b_roadmap->id) as $case)
              <div class="is-menu-content" data-id="case_{{ $case->id }}">
                <span class="is-menu__item-title">Автор кейса: <span style="color: #0075ff;">{{ $case->user->surname }} {{ $case->user->name }} {{ $case->user->middlename }}</span></span>
                <br>
                <span class="is-menu__item-title">Государственный орган: <span style="color: #0075ff;">{{ $case->government->$names }}</span></span>
                <br>
                <span class="is-menu__item-title">Создан: <span style="color: #0075ff;">{{ date('d.m.Y в H:i:s', strtotime( $case->created_at )) }}</span></span>
                <br><br>
                @php
                $date_case = explode("-", $case->date);
                @endphp
                <span class="is-menu__item-title">Срок контроля: <span style="color: #0075ff;">{{ $date_case[0] }} квартал {{ $date_case[1] }} года</span></span>
    
                <br><br><br><br>
                <h2 class="is-content-title" style="margin-left: 0px; color: #0075ff;">
                  Связанные функции и бизнес-процессы
                </h2>
                
                <table class="table table_expertise">
                  <thead>
                    <tr>
                      <th style="padding: 16px;">Наименование функции</th>
                      <th style="text-align: left; padding: 16px;">Бизнес-процесс</th>
                      <th style="width: 76px;">AS IS</th>
                      <th style="width: 76px;">TO BE</th>
                      <th style="width: 76px;">ПЛАН</th>
                      <th style="width: 76px;">СТАТУС</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $functs = json_decode($case->function_groups);
                    if ( !empty($functs) ) {
                      foreach ($functs as $funct) {

                        echo "<tr>";
                        echo "<td>".$b_roadmap->getFunctions($funct)->name."</td>";
                        echo '<td colspan="5" style="padding: 0px;"><table class="table table_expertise"><tbody>';

                        foreach ( $b_roadmap->getProcess($funct, $case->id) as $b_proccess) {
                        ?>

                          <tr>
                            <td><a href="{{ route('businessprocess.reestr.view_bp', ['id' => $b_proccess->id]) }}">{{ $b_proccess->name }}</a></td>
                            <td class="table__status" style="width: 76px;">
                              @if ($b_proccess->file_as_is)
                                @if ($b_proccess->file_as_is_accept == "on")
                                  <a class="feather-green" target="_blank" href="/storage/{{ $b_proccess->file_as_upload }}"><svg><use href="/assets/images/feather-sprite.svg#check-circle"/></svg></a>
                                @else
                                  <a class="feather-yellow" target="_blank" href="/storage/{{ $b_proccess->file_as_upload }}"><svg><use href="/assets/images/feather-sprite.svg#check-circle"/></svg></a>
                                @endif
                              @else
                                
                              @endif
                            </td>
                            <td class="table__status" style="width: 76px;">
                              @if ($b_proccess->file_to_be)
                                @if ($b_proccess->file_to_be_accept == "on")
                                  <a class="feather-green" target="_blank" href="/storage/{{ $b_proccess->file_to_be_upload }}"><svg><use href="/assets/images/feather-sprite.svg#check-circle"/></svg></a>
                                @else
                                  <a class="feather-yellow" target="_blank" href="/storage/{{ $b_proccess->file_to_be_upload }}"><svg><use href="/assets/images/feather-sprite.svg#check-circle"/></svg></a>
                                @endif
                              @else
                                
                              @endif
                            </td>
                            <td class="table__status" style="width: 76px;">
                              @if ($b_proccess->file_program)
                                @if ($b_proccess->file_program_accept == "on")
                                  <a class="feather-green" target="_blank" href="/storage/{{ $b_proccess->file_program_upload }}"><svg><use href="/assets/images/feather-sprite.svg#check-circle"/></svg></a>
                                @else
                                  <a class="feather-yellow" target="_blank" href="/storage/{{ $b_proccess->file_program_upload }}"><svg><use href="/assets/images/feather-sprite.svg#check-circle"/></svg></a>
                                @endif
                              @else
                                
                              @endif
                            </td>
                            <td class="table__status" style="width: 76px;">
                              @if ($b_proccess->accept == 0 && $b_proccess->discard == 0)
                                <a class="feather-grey" title="На рссмотрении"><svg><use href="/assets/images/feather-sprite.svg#check-circle"/></svg></a>
                              @else
                              
                                @if ($b_proccess->accept == 1)
                                  <a class="feather-green"  title="Принят"><svg><use href="/assets/images/feather-sprite.svg#check-circle"/></svg></a>
                                @endif

                                @if ($b_proccess->discard == 1)
                                  <a class="feather-red"  title="Отклонен"><svg><use href="/assets/images/feather-sprite.svg#check-circle"/></svg></a>
                                @endif

                              @endif
                            </td>
                          </tr>
                          
                  
      
                        <?php
                        }
                        echo "</tboby></table></td>";
                        echo "</tr>";
                      }
                    }
                    ?>
                  </tbody>
                </table>

              </div>
            @endforeach

          @else 

            <div class="is-menu-content" data-id="road_{{ $b_roadmap->id }}">
              <h2 class="is-content-title">{{ $b_roadmap->$names }}</h2>
              <div class="info-box-error" id="error_sign_box" style="padding: 25px 20px 25px 20px;">В выбранной дорожной карте отсутствуют кейсы</div>
            </div>

          @endif

        @endforeach




        


      </div>
    </div>






</main>
@endsection



@section('footer')
@include ('layouts.footer')
@endsection





@section('other_divs')
@endsection


@section('scripts')
<script>
  function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" tabs__link_active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " tabs__link_active";

  }
</script>

<style>
  .tabcontent {
    display: none;
  }
</style>
@endsection